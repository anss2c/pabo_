<?php

namespace app\modules\v1\controllers;

use app\helpers\BehaviorsFromParamsHelper;
use yii\rest\ActiveController;


/*
 *
 * @author Heru Arief Wijaya
 * 2020 @  belajararief.com
 */

class PostController extends ActiveController
{
    public $modelClass = 'app\models\Post';
	
    protected function verbs() {
	   
	    $verbs =  [
			'index' => ['GET', 'HEAD'],
			'view' => ['GET', 'HEAD'],
			'create' => ['GET','POST'],
			'update' => ['PUT', 'PATCH','GET'],
			'delete' => ['GET','DELETE'],
		];
	   return $verbs;
	}
    
    public function actionView($id)
    {
        $post = app\models\Post::findOne($id);
		if($post){
			return [
				'status' => Status::STATUS_FOUND,
				'message' => 'Data Ketemu',
				'data' => $post
			];
		}else {
			throw new NotFoundHttpException("Object not found: $id");
		}
			
    }
	public function actionDelete($id)
    {
        $model = $this->actionView($id);

        if ($model->delete() === false) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }

        $response = \Yii::$app->getResponse();
        $response->setStatusCode(204);
        return 'ok';
    }
	
}