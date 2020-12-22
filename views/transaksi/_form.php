<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPengajuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idKaryawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tglPengajuan')->textInput() ?>

    <?= $form->field($model, 'noPolisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempatServis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggalServis')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
