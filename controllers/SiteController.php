<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Status;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
	public function actionSignup()
    {
        $model = new User();
        $params = Yii::$app->request->post();
        if(!$params) {
            Yii::$app->response->statusCode = Status::STATUS_BAD_REQUEST;
            return [
                'status' => Status::STATUS_BAD_REQUEST,
                'message' => "Need username, password, and email.",
                'data' => ''
            ];
        }

        $model->username = $params['username'];
        $model->email = $params['email'];

        $model->setPassword($params['password']);
        $model->generateAuthKey();
        $model->status = User::STATUS_ACTIVE;

        if ($model->save()) {
            Yii::$app->response->statusCode = Status::STATUS_CREATED;
            $response['isSuccess'] = 201;
            $response['message'] = 'You are now a member!';
            $response['user'] = \app\models\User::findByUsername($model->username);
            return [
                'status' => Status::STATUS_CREATED,
                'message' => 'You are now a member',
                'data' => User::findByUsername($model->username),
            ];
        } else {
            Yii::$app->response->statusCode = Status::STATUS_BAD_REQUEST;
            $model->getErrors();
            $response['hasErrors'] = $model->hasErrors();
            $response['errors'] = $model->getErrors();
            return [
                'status' => Status::STATUS_BAD_REQUEST,
                'message' => 'Error saving data!',
                'data' => [
                    'hasErrors' => $model->hasErrors(),
                    'getErrors' => $model->getErrors(),
                ]
            ];
        }
		return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
		$model = new User;
        $params = Yii::$app->request->post();
        if(empty($params['username']) || empty($params['password'])) {
            $status = ['status' => Status::STATUS_BAD_REQUEST,
            'message' => "Need username and password.",
            'data' => ''];
		}
		else{
			$user = User::findByUsername($params['username']);
			if ($user->validatePassword($params['password'])) {
				if(isset($params['consumer'])) $user->consumer = $params['consumer'];
				if(isset($params['access_given'])) $user->access_given = $params['access_given'];

				Yii::$app->response->statusCode = Status::STATUS_FOUND;
				$user->generateAuthKey();
				$user->save();
				$status =[
					'status' => Status::STATUS_FOUND,
					'message' => 'Login Succeed, save your token',
					'data' => [
						'id' => $user->username,
						'token' => $user->auth_key,
						'email' => $user['email'],
					]
				];
			} else {
				Yii::$app->response->statusCode = Status::STATUS_UNAUTHORIZED;
				$status =[
					'status' => Status::STATUS_UNAUTHORIZED,
					'message' => 'Username and Password not found. Check Again!',
					'data' => ''
				];
			}
		}
		return $status;
    } 
	/* *
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	*/
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    
}
