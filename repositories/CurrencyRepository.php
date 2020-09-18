<?php

namespace app\repositories;

use app\forms\CurrencyForm;
use app\models\Currency;
use DateTime;
use Exception;
use Yii;
use yii\helpers\VarDumper;

class CurrencyRepository
{
    /**
     * @param CurrencyForm[] $forms
     * @return bool
     * @throws \yii\db\Exception
     */
    public function save(array $forms): bool
    {
        $dateTime = (new DateTime())->format('Y-m-d H:i:s');
        $rows = [];
        foreach ($forms as $form) {
            $row = $form->attributes;
            $row['insert_dt'] = $dateTime;
            $rows[] = $row;
        }

        $affectedRowsCount = Yii::$app->db->createCommand()
            ->batchInsert(Currency::tableName(), ['name', 'rate', 'insert_dt'], $rows)
            ->execute();

        return $affectedRowsCount > 0;
    }

}