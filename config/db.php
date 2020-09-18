<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=currencies_db;dbname=currencies_db',
    'username' => 'currencies_user',
    'password' => 'currencies_password',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
