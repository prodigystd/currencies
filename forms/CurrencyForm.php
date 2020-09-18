<?php

namespace app\forms;

use yii\base\Model;

/**
 * CurrencyForm is the form data validation.
 */
class CurrencyForm extends Model
{
    public $name;
    public $rate;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'rate'], 'required'],
            ['name', 'string'],
            ['rate', 'double'],
        ];
    }

}
