<?php

namespace app\controllers\api;

use yii\rest\Controller;

class BaseApiController extends Controller
{
    /**
     * @param string $errorMessage
     * @param int $statusCode
     * @return string[]
     */
    public function errorResponse(string $errorMessage, int $statusCode = 500): array
    {
        \Yii::$app->response->statusCode = $statusCode;
        return [
            'message' => $errorMessage
        ];
    }


}
