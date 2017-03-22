<?php

class ListadorController extends Controller {

/**
 * Translate a result array into an HTML table.  This function adds an id to each TD of the TBODY tag.
 * This id is composed of the id, field, and table name of the correspoding cell.
 * This id is used by the editable jquery plugin to indicate which cell was edited. 
 *
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.3.1
 * @link        http://aidanlister.com/repos/v/function.array2table.php
 * @param       array  $array      The result (numericaly keyed, associative inner) array.
 * @param       bool   $recursive  Recursively generate tables for multi-dimensional arrays
 * @param       bool   $return     return or echo the data
 * @param       string $null       String to output for blank cells
 * @param       string $id         id to add to the table declaration
 * @param       string $class      class to add to the table declaration
 * @param       string $db_table   name of the database table where the data came from
 */
function array2table($array, $recursive = false, $return = false, $null = '&nbsp;', $id = '', $class = '', $db_table = '')
{
    // Sanity check
    if (empty($array) || !is_array($array)) {
        return false;
    }
 
    if (!isset($array[0]) || !is_array($array[0])) {
        $array = array($array);
    }
 
    // Start the table
    if ($id != '')
        $table = "<table id='".$id."' class='".$class."'>\n";
    else
        $table = "<table>\n";
 
    // The header
    $table .= "\t<thead>";
    $table .= "\t<tr>";
    // Take the keys from the first row as the headings
    foreach (array_keys($array[0]) as $heading) {
        $table .= '<th>' . $heading . '</th>';
    }
    $table .= "</tr>\n";
    $table .= "</thead>\n";
 
    // The body
    $table .= "<tbody>";

    $row_id = 0;
    
    foreach ($array as $row) {
        $table .= "\t<tr>" ;

        foreach ($row as $key=>$cell) {
            $table .= '<td id="'.$row['id'].'&'.$key.'&'.$db_table.'">';
 
            // Cast objects
            if (is_object($cell)) { $cell = (array) $cell; }
            
            if ($recursive === true && is_array($cell) && !empty($cell)) {
                // Recursive mode
                $table .= "\n" . array2table($cell, true, true) . "\n";
            } else {
                $table .= (strlen($cell) > 0) ?
                    htmlspecialchars((string) $cell) :
                    $null;
            }
 
            $table .= '</td>';
        }
 
        $table .= "</tr>\n";
    }
    $table .= "</tbody>";
    
 
    // End the table
    $table .= '</table>';
 
    // Method of output
    if ($return === false) {
        echo $table;
    } else {
        return $table;
    }
}
 



// Convert array to object
function parseArrayToObject($array) {
	$object = new stdClass();
	if (is_array($array) && count($array) > 0) {
		foreach ($array as $name=>$value) {
			$name = strtolower(trim($name));
			if (!empty($name)) {
				$object->$name = $value;
			}
		}
	}
	return $object;
}



// Convert object to array
function parseObjectToArray($object) {
   $array = array();
   if (is_object($object)) {
	  $array = get_object_vars($object);
   }
   return $array;
}



// Visualize a multidimensional array
function printArray($array)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
	
	

// Visualize a single dimensional array
function visualizeSingleArray($array)
{
	echo (br().$array.br());
	foreach ($array as $k => $v)
	{
		echo ('KEY : '.$k . ' - '. 'VALUE : '.$v.br());
	}
}


function actionIndex(){
       $obj=  Lote::model()->findAll();   
       array2table($obj,true);
}

}
?>