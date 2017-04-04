<?php
/**
 * Created by PhpStorm.
 * User: fgorsky
 * Date: 04.04.17
 * Time: 9:21
 */

namespace fgh151\vpages\controllers;

use yii\base\InvalidParamException;
use yii\base\ViewNotFoundException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{

    /**
     * @param string $page
     * @return string
     * @throws NotFoundHttpException
     * @throws ViewNotFoundException
     * @throws InvalidParamException
     */
    public function actionView($page)
    {
        $page = \Yii::getAlias('@webroot').'/'.$page;

        /** if folder look for index.php */
        if (is_dir($page)) {
            $page .= substr($page, -1) === '/' ? 'index.php' : '/index.php';
        }

        $pageDir = dirname($page);

        $style = $pageDir.'/style.css';
        $script = $pageDir.'/script.js';
        $this->getView()->registerCss($style);
        $this->getView()->registerJsFile($script);

        if (file_exists($page)) {
            return $this->render($page);
        }
        throw new NotFoundHttpException();
    }

    /**
     * @param string $view
     * @param array $params
     * @return string
     * @throws ViewNotFoundException
     * @throws InvalidParamException
     */
    public function render($view, $params = [])
    {
        $layoutFile = $this->findLayoutFile($this->getView());
        if ($layoutFile !== false) {
            return $this->getView()->renderFile(
                $layoutFile,
                ['content' => $this->renderFile($view, $params)],
                $this
            );
        }
        return $this->renderFile($view, $params);
    }

}