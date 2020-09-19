<?php

namespace app\controllers;

use app\repositories\CurrencyRepository;

/**
 * Class CurrencyController
 * @package app\controllers\api
 */
class CurrencyController extends BaseApiController
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
        try {
            return $this->currencyRepository->getAll();
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }


    public function actionGetById(int $id)
    {
        try {
            return $this->currencyRepository->getById($id);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }


}