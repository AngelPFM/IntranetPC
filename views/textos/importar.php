<?php $form = $this->beginWidget('CActiveForm', array('id' => 'upload-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'),)); ?>
<div class="row" style="margin-bottom:20px;">
    <?php echo $form->errorSummary($model); ?>
</div>
<div class="row" style="margin-bottom:20px;">
    <div class="field-row">
        <a href='<?= Yii::app()->getBaseUrl(false)."/textos/exportar";?>' target='_blank'><input type='button' value='Exportar' /></a>
       
    </div>
</div>
<div class="row" style="margin-bottom:20px;">
    <div class="field-row">
        <?php echo $form->labelEx($model, 'file'); ?>
    </div>
    <div class="field-row">
        <?php echo $form->fileField($model, 'file'); ?>
    </div>
    <div class="field-row">
        <?php echo $form->error($model, 'file'); ?>
    </div>
</div>
<div class="row" style="margin-bottom:20px;">
    <div class="field-row">
        <?php echo $form->labelEx($model, 'idioma'); ?>
    </div>
    <div class="field-row">
        <?php echo $form->dropDownList($model, 'idioma', CHtml::listData(Idioma::model()->findAllByAttributes(array('Quitar' => 0)), 'idUNI_Idioma', 'Nombre')); ?>
    </div>
    <div class="field-row">
        <?php echo $form->error($model, 'idioma'); ?>
    </div>
</div>
<div class="row" style="margin-bottom:20px;">
    <div class="field-row">
        <?php echo $form->labelEx($model, 'modelo'); ?>
    </div>
    <div class="field-row">
        <?php echo $form->textField($model, 'modelo'); ?>
    </div>
    <div class="field-row">
        <?php echo $form->error($model, 'modelo'); ?>
    </div>
</div>
<div class="row-buttons" style="margin-bottom:20px;">
    <?php echo CHtml::submitButton('Submit'); ?>
</div>
<?php if ($log != null && count($log) > 0) { ?>
    <div class="row" style="margin-bottom:20px;">
        <ul>
            <?php foreach ($log as $l) { ?>
                <li><?php echo $l; ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
<?php $this->endWidget(); ?>