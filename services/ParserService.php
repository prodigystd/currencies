<?php

namespace app\services;


use app\forms\CurrencyForm;
use yii\httpclient\Client;

class ParserService
{
    const URL = 'http://www.cbr.ru/scripts/XML_daily.asp';

    /**
     * @return CurrencyForm[]
     * @throws \yii\httpclient\Exception
     */
    public function getCurrencies(): array
    {
        $client = new Client();
        $response = $client->get(self::URL)->send();

        if (!$response->isOk) {
            return [];
        }

        $currenciesData = $response->getData()['Valute'];

        $forms = [];
        foreach ($currenciesData as $currencyData) {
            $form = new CurrencyForm();
            $form->name = $currencyData['Name'];
            $form->rate = str_replace(',', '.', $currencyData['Value']);
            $forms[] = $form;

        }

        return $forms;
    }

}