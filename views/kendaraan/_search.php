<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KendaraanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'noPolisi') ?>

    <?= $form->field($model, 'merkKendaraan') ?>

    <?= $form->field($model, 'jenisKendaraan') ?>

    <?= $form->field($model, 'tipeKendaraan') ?>

    <?= $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'noMesin') ?>

    <?php // echo $form->field($model, 'noRangka') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
