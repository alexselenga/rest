Необходимо выполнить:
___

composer update

Создать БД и настроить подключение (файл config/db.php)

Запустить миграции (php yii migrate)

Пользователь по умолчанию уже есть

    username: default
    password: 123123123

Для тестирования с различными пользователями:

    Настроить конфигурацию почты (файл config/web.php: 'components' => 'mailer')

    Настроить параметры (файл config/params.php)

    Зарегистрировать пользователей


Консольное приложение: commands/TestController.php

Запуск (число, массив в виде строки, user_id):

    yii test 3 "1 3 3 4 6 3 5" 1

user_id не обязателен.


Использовал Trait для вычисления индекса числа. Другой вариант - использовать статический класс-хелпер.

