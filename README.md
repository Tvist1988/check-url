1. Скачиваем репозиторий:

   `git clone git@github.com:Tvist1988/check-url.git`
2. Приложение лежит в ветке **url-checker**
3. В папке проекта запускаем:

`docker compose run --rm frontend composer install`

`docker compose run --rm frontend php init`



4. В common/config/main-local редактируем данные для БД

   
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=yii2advanced',
            'username' => 'root',
            'password' => 'verysecret',
            'charset' => 'utf8',
        ]

5. Затем:

`docker compose up -d`

`docker compose run --rm frontend php yii migrate`


6. Приложение доступно по ссылке http://127.0.0.1:20080

**Т.к. используются очереди с драйвером файл, при пересборке приложения желательно удалить содержимое папки console/runtime/queue**

