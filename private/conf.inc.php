<?php




    define("BDD_DRIVER", "mysql");
    define("BDD_HOST", "eu-cdbr-west-01.cleardb.com");
    define("BDD_DBNAME", "heroku_ed738c1d37eed3e");
    define("BDD_USER", "bc47686cf08767");
    define("BDD_PWD", "ca8b4fd0");
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


