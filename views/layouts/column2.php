<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-24">
	<div id="content" style="padding:0px 20px;">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		//Yii::log(print_r($this->menu,1) . "\n\n" . print_r($this->sublistados,1));
		
		if( isset($this->sublistados) ){
			$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'SubListados',
			));
			$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->sublistados,
					'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		}
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>