<?php

    define("BDD_DRIVER", "mysql");
    define("BDD_HOST", "localhost");
    define("BDD_DBNAME", "wedo");
    define("BDD_USER", "root");
    define("BDD_PWD", "");
    define("LINK", "http://localhost/wedo/");
    define("IMG", "http://localhost/wedo/img/");
    define("ARTICLES", "http://localhost/wedo/article/");
    define("ARTICLE", "http://localhost/wedo/article/musculation/");
    define("PAGE", "http://localhost/wedo/index/p?id=");
    define("SALT", "GFDSgfdsgf34543");

    /* SMTP */
    define("SMTP_HOST", "smtp.gmail.com");
    define("SMTP_PORT", 465); 

    $explode = explode('/', $_SERVER['SCRIPT_NAME']);
    $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
    $lienbase = $protocol . $_SERVER['HTTP_HOST'] . str_replace(end($explode), '', $_SERVER['SCRIPT_NAME']);
    define('WEBROOT', $lienbase);
    date_default_timezone_set('Europe/Paris');


