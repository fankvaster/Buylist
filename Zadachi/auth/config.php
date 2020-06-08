<?php
 /**
 * Конфигурационный файл
 */

 //Адрес базы данных
 $DBSERVER = '127.0.0.1';

 //Логин БД
 $DBUSER = 'root';

 //Пароль БД
$DBPASSWORD = '';

 //БД
$DATABASE = 'buylist';

 //Errors
$ERROR_CONNECT = 'Не могу соединиться с БД';

 //Errors
$NO_DB_SELECT = 'Данная БД отсутствует на сервере';

 //Адрес хоста сайта
$HOST = 'http://'. $_SERVER['HTTP_HOST'] .'/';
 
 //Адрес почты от кого отправляем
$MAIL_AUTOR = 'Регистрация на http://buylist.ru <no-reply@buylist.ru>';
