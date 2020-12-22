<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idKaryawan',
            'namaKaryawan',
            'departemen',
            'noTelepon',
            'email:email',
            //'alamat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
