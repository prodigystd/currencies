# currencies

В базе данных PosgreSql должна быть таблица currency c колонками:
id — первичный ключ
name — название валюты
rate — курс валюты к рублю
insert_dt – время обновления валюты

Должна быть консольная команда для обновления данных в таблице currency. 
Данные по курсам валют можно взять отсюда: http://www.cbr.ru/scripts/XML_daily.asp
Таблица в БД должна создаваться через миграции yii.

Реализовать 2 REST API метода:
GET /currencies — должен возвращать список курсов валют с возможность пагинации
GET /currency/ — должен возвращать курс валюты для переданного id

# Установка
В корневой папке проекта запустить:
docker-compose up

Контейнер nginx будет прослушивать 80 порт(он должен быть свободен) на localhost

# Описание api:

Параметры у запроса:
Получить список курсов валют отсортированых по дате обновления, алфавиту

Параметры: page, per-page

GET localhost/currencies?page=1&per-page=34 

Получить курс валюты для переданного id

GET localhost/currency/:id
