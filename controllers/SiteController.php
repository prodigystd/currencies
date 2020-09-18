<?php

namespace app\controllers;

use app\controllers\api\BaseApiController;

class SiteController extends BaseApiController
{

    /**
     * @return array
     */
    public function actionError()
    {
        return $this->errorResponse('Not found', 404);
    }

    /**
     * @return array
     */
    public function actionIndex()
    {
        return ['Currency Api version' => '1.0.0'];
    }

}
