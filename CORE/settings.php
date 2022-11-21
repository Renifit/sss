<?php
/* Настройка Базы Данных */
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DBNAME', 'local');
define('MYSQL_CHARSET', 'utf8');

/* Режимы записи
'mysql' - запись в mysql.
'file'  - запись в файл.
'all'   - запись везде. */
define('RECORD_MODE', 'file');

/* Название файла сохраненных аккаунтов */
define('TITLE_FILE_ACCOUNTS', 'accounts.txt');

/* Символ разделения
(Для разделения 'email' от 'password' в файле) */
define('SPLIT_SYMBOL', ':');


/* Контакты разработчика: (по всем вопросам ^^)
Telegram: stee_ucky
Jabber: stee.ucky@xmpp.jp

sl */ ?>