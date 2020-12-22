<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'noPolisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merkKendaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenisKendaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipeKendaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'noMesin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noRangka')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
