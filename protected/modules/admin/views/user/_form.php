<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <?php if ($model->isNewRecord) { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->textField($model, 'password', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <?php } else { ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'newPassword'); ?>
        <?php echo $form->textField($model, 'newPassword', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'newPassword'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'confirmPassword'); ?>
        <?php echo $form->textField($model, 'confirmPassword', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'confirmPassword'); ?>
    </div>
    <?php } ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php echo $form->dropDownList($model, 'role', User::getRoles()); ?>
        <?php echo $form->error($model, 'role'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#User_password, #User_newPassword').generatePasswordLink('Сгенерировать');
    });
</script>