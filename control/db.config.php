<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/05/2019
 * Time: 1:34 AM
 */


if ($_SERVER["HTTP_HOST"] == 'localhost'){
    define("HOST",'localhost');
    define("USERNAME",'root');
    define("PASSWORD",'');
    define("DATABASE",'ghanacuc_school_data');
    define("PORT",'');
}else{

    define("HOST",'178.128.174.56');
    define("USERNAME",'iquipe');
    define("PASSWORD",'@passWD8282');
    define("DATABASE",'ghanacuc_school_data');
    define("PORT",'');
}

