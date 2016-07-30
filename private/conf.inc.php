<?php

    define("BDD_DRIVER", "mysql");
    define("BDD_HOST", "localhost");
    define("BDD_DBNAME", "mydb");
    define("BDD_USER", "root");
    define("BDD_PWD", "");
    define("LINK", "http://localhost/wedOld/");
    define("IMG", "http://localhost/wedOld/img/");
    define("ARTICLES", "http://localhost/wedOld/article/");
    define("ARTICLE", "http://localhost/wedOld/index/a?id=");
    define("PAGE", "http://localhost/wedOld/index/p?id=");
    define("SALT", "GFDSgfdsgf34543");

    /* SMTP */
    define("SMTP_HOST", "smtp.gmail.com");
    define("SMTP_PORT", 465); 

    $explode = explode('/', $_SERVER['SCRIPT_NAME']);
    $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
    $lienbase = $protocol . $_SERVER['HTTP_HOST'] . str_replace(end($explode), '', $_SERVER['SCRIPT_NAME']);
    define('WEBROOT', $lienbase);
    date_default_timezone_set('Europe/Paris');
