<?php

namespace app\repositories;

use app\forms\CurrencyForm;
use app\models\Currency;
use DateTime;
use Yii;
use yii\data\Pagination;

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

    /**
     * @return array
     */
    public function getAll(): array
    {
        $query = Currency::find();
        $pagination = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => 34]);

        $currencies = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy([
                'insert_dt' => SORT_DESC,
                'name' => SORT_ASC
            ])
            ->asArray()
            ->all();

        return $currencies;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return Currency::find()
            ->where(['id' => $id])
            ->asArray()
            ->all();
    }


}