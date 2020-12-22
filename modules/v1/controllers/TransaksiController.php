<?php

namespace app\modules\v1\controllers;

use app\helpers\BehaviorsFromParamsHelper;
use yii\rest\ActiveController;
/**
 * KendaraanController implements the CRUD actions for Kendaraan model.
 */
class TransaksiController extends ActiveController
{
    /**
     * {@inheritdoc}
     */
	public $modelClass='app\models\Transaksi'; 
	
    
}