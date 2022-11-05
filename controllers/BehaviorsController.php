<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;


class BehaviorsController extends Controller
{
    public function behaviors()
    {
        return[
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }
}