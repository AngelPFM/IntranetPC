<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="<?php echo Yii::app()->language ?>">
       <link href='http://fonts.googleapis.com/css?family=Marcellus|Raleway:200' rel='stylesheet' type='text/css'>
        <style type="text/css">
            * {margin: 0;padding: 0;font-family: 'Raleway', sans-serif;color: #888;font-size: 14px;}
            body {background-color: #FFF;}
            a {color: #33CCCC; text-decoration: none;}
        </style>
    </head>
    <body>
        <table style="font-family: 'PT Sans', Helvetica, sans-serif;font-size: 15px;background:#FFF;margin:0 auto;width:640px">
            <tbody>
                <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl.'/images/log_mail.png'; ?>"></td>
                </tr>
                <tr>
                    <td style="padding: 10px 20px 20px; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                    	<?php echo $this->renderPartial('/intranet/mail/_contenidoNewsletter', array('model'=>$model, 'items'=>$items)); ?>
                    </td>
                </tr>
                <tr>
                	<td style="padding: 15px 20px 20px;">
                		<p style="line-height: 25px;"><?php echo Yii::t('newsletter', 'Si tienes alguna duda ponte en contacto con', array(), 'messages', Yii::app()->language)?>&nbsp;<a href="http://www.danielhavillio.com">danielhavillio.com</a></p>
                		<?php echo Yii::t('mail', 'Consulta la', array(), 'messages', Yii::app()->language)?>
                		<a href=""><?php echo Yii::t('mail', 'Política de reembolsos', array(), 'messages', Yii::app()->language)?></a> y las
                		<a href=""><?php echo Yii::t('mail', 'Condiciones de servicio', array(), 'messages', Yii::app()->language)?></a> de <?php echo Yii::app()->name; ?>
                	</td>
                </tr>
                <tr>
                	<td><?php echo Yii::t('mail', 'No respondas a este mensaje', array(), 'messages', Yii::app()->language)?><BR>
                		<span style="border-right: 1px solid #888">&copy; 2013 <?php Yii::app()->name ?>&nbsp;</span>&nbsp;<?php echo Yii::t('mail', 'Todos los derechos reservados', array(), 'messages', Yii::app()->language)?>
                	</td>
                </tr>
			</tbody>
		</table>
	</body>
</html>