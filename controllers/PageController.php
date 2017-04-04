<?php
/**
 * Created by PhpStorm.
 * User: fgorsky
 * Date: 04.04.17
 * Time: 9:21
 */

namespace fgh151\vpages\controllers;


use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{

    public function actionVew($page)
    {

        if (file_exists(\Yii::getAlias('@webroot').'/'.$page)) {
            var_dump(\Yii::getAlias('@webroot').'/'.$page); die;
        } else {
            throw new NotFoundHttpException();
        }
    }

}