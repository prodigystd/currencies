<?php

namespace app\controllers\api;

use app\models\Currency;
use app\repositories\CurrencyRepository;
use app\services\ParserService;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\rest\Controller;


class CurrencyController extends Controller
{
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    public function __construct($id, $module, CurrencyRepository $currencyRepository, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->currencyRepository = $currencyRepository;
    }


    //page & per-page params
    public function actionIndex()
    {
        return $this->currencyRepository->getAll();
    }


    public function actionGetById()
    {

    }


}