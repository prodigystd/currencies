<?php

namespace app\controllers\api;

use app\services\ParserService;
use Yii;
use yii\web\Response;
use yii\rest\Controller;


class CurrencyController extends Controller
{
    /**
     * @var ParserService
     */
    private $parserService;

    public function __construct($id, $module, ParserService $parserService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->parserService = $parserService;
    }


    public function actionIndex()
    {
        return $this->parserService->getData();
    }



}