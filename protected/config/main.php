<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('local',dirname(__FILE__).DIRECTORY_SEPARATOR);

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Мебель арт',

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
        'ext.giix-components.*', // giix components

    ),

    'modules'=>array(

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1111',
           // 'ipFilters'=>array("127.0.0.1","192.168.0.89"),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
            ),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
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
        'db'=>array(
            'connectionString' => 'mysql:host=192.168.0.89;dbname=yustk.com',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1111',
            'charset' => 'cp1251',
        ),


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
        'smtp' => array(
            "host" => "smtp.spaceweb.ru", //smtp ??????
            "debug" => 1, //??????????? ?????????? ????????? (0 - ??? ??????)
            "auth" => true, //?????? ??????? ???????????
            "port" => 25, //???? (??-????????? - 25)
            "username" => "no-reply@yustk.com", //??? ???????????? ?? ???????
            "password" => "q34fsd243df", //??????
            "addreply" => "no-reply@yustk.com", //??? ?-mail
            "replyto" => "", //e-mail ??????
            "fromname" => "Форма обратной связи", //???
            "from" => "no-reply@yustk.com", //?? ????
            "charset" => "utf-8", //?? ????
        ),
        'settings'=>array(
            "mailDirector" => "bablgum@mail.ru",
            "mailMain"     => "bablgum@mail.ru"
        )
    ),



);