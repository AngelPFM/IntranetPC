<?php
	
?>
<div class="view">
<?php
	$i=0;
	foreach($data as $key=>$value){ ?>
		<b><?php echo CHtml::encode($key); ?>:</b>
		<?php 
		if($i==0){
			echo CHtml::link(CHtml::encode($value), array('view', 'id'=>$value));
		}else{	
			echo CHtml::encode($value); 
		}
		$i++; ?>
		<br />	<?
	}?>
</div>