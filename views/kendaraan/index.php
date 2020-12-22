<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kendaraans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kendaraan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'noPolisi',
            'merkKendaraan',
            'jenisKendaraan',
            'tipeKendaraan',
            'tahun',
            //'noMesin',
            //'noRangka',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
