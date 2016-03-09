<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('local',dirname(__FILE__).DIRECTORY_SEPARATOR);

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Ìובוכü אנע',

    // preloading 'log' component
    'preload'=>array('log'),

    'charset'=>'windows-1251',
    'sourceLanguage'=>'ru',
    'language'=>'ru',

    'defaultController' => 'static',

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',

    ),

    'modules'=>array(

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1111',

        ),
    ),

    'behaviors'=>array(
        'runEnd'=>array(
            'class'=>'application.components.WebApplicationEndBehavior',
        ),
    ),

    'components'=>array(




        'errorHandler'=>array(
            // use 'front/error' action to display errors
            'errorAction'=>'/static/error',
        ),
        /*'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=karum',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1111',
            'charset' => 'cp1251',
        ),
*/

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CProfileLogRoute', //CFileLogRoute
                    'levels'=>'error, warning,profile',
                    'enabled'=>false,
                ),

            ),
        ),
    ),


    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
      /*  'smtp' => array(
            "host" => "smtp.timeweb.ru", //smtp ??????
            "debug" => 1, //??????????? ?????????? ????????? (0 - ??? ??????)
            "auth" => true, //?????? ??????? ???????????
            "port" => 25, //???? (??-????????? - 25)
            "username" => "mail@karum.ru", //??? ???????????? ?? ???????
            "password" => "S55R0101", //??????
            "addreply" => "mail@karum.ru", //??? ?-mail
            "replyto" => "", //e-mail ??????
            "fromname" => "?????.??", //???
            "from" => "mail@karum.ru", //?? ????
            "charset" => "utf-8", //?? ????
        )*/
        'settings'=>array(
            "mailDirector" => "bablgum@mail.ru",
            "mailMain"     => "bablgum@mail.ru"
        )
    ),



);