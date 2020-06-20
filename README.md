Используя возможности фреймворка Phalcon 3 реализовать взаимодействие с
сервисом погоды https://openweathermap.org/api.
Возможности:
1. Поиск погоды по городу и координатам с https://www.google.by/maps.
2. Хранение истории вводимых городов в БД и дублирование их в Redis.
Реализация:
1. Метод, получающий на вход название города или координаты. Результатом
должен быть массив метеоданных.
2. Метод для получения списка вводимых ранее городов.

## развернуть проект

```
git clone https://github.com/pavel-lukashevich/phalcon3-weather.git
cd phalcon3-weather

composer install
```
- создать базу данных, заполнить app\config\config.php файл
- запустить создание таблиц
```
vendor\bin\phalcon migration run
```


## примеры запросов

```
погода по городу
    curl --location --request POST 'http://phalcon.loc/locations' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'locations=брест'
или
    curl --location --request POST 'http://phalcon.loc/locations' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'locations=брест,fr'
или
    curl --location --request POST 'http://phalcon.loc/locations' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'locations=Denver,Колорадо,США'

погода по координатам
    curl --location --request POST 'http://phalcon.loc/locations' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'locations=52.878708, 28.160542'

список городов из mysql
    curl --location --request GET 'http://phalcon.loc/locations'

список городов из redis
    curl --location --request GET 'http://phalcon.loc/locations/redis'
```


# ( ͡° ͜ʖ ͡°)

