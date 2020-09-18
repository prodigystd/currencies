<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\repositories\CurrencyRepository;
use app\services\ParserService;
use yii\console\Controller;
use yii\console\ExitCode;

class CurrencyController extends Controller
{
    /**
     * @var ParserService
     */
    private $parserService;
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    public function __construct($id,
                                $module,
                                ParserService $parserService,
                                CurrencyRepository $currencyRepository,
                                $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->parserService = $parserService;
        $this->currencyRepository = $currencyRepository;
    }


    /**
     * @throws \yii\httpclient\Exception|\yii\db\Exception
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

        $this->currencyRepository->save($forms);

        echo 'Currencies were successfully parsed and saved' . PHP_EOL;
        return ExitCode::OK;
    }
}
