<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPengajuan') ?>

    <?= $form->field($model, 'idKaryawan') ?>

    <?= $form->field($model, 'tglPengajuan') ?>

    <?= $form->field($model, 'noPolisi') ?>

    <?= $form->field($model, 'tempatServis') ?>

    <?php // echo $form->field($model, 'tanggalServis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
