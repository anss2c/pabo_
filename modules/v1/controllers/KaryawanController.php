<?php

namespace app\controllers;
namespace app\modules\v1\controllers;
use Yii;
use app\helpers\BehaviorsFromParamsHelper;
use yii\rest\ActiveController;

/**
 * KaryawanController implements the CRUD actions for Karyawan model.
 */
class KaryawanController extends ActiveController
{
    public $modelClass = 'app\models\Karyawan';
	public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors = BehaviorsFromParamsHelper::behaviors($behaviors);
        return $behaviors;
    }
    
     
}
