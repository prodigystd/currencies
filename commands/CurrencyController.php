<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\services\ParserService;
use yii\console\Controller;
use yii\console\ExitCode;

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


    /**
     * @throws \yii\httpclient\Exception
     */
    public function actionUpdate()
    {
        $forms = $this->parserService->getCurrencies();

        foreach ($forms as $form) {
            if (!$form->validate()) {
                print_r($form->getErrorSummary(true));
                return ExitCode::DATAERR;
            }
        }

        return ExitCode::OK;
    }
}
