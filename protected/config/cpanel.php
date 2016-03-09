<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'user'=>array(
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
            ),
            // uncomment the following to enable URLs in path-format
            'user'=>array(
                // ��� �������� ��������������� �� ���������
                'loginUrl'=>array('login'),
            ),

            'errorHandler'=>array(
                'errorAction'=>'error',
            ),

            'authManager'=>array(
                'class'=>'CDbAuthManager',
                'connectionID'=>'db',
                'itemTable'          => 'AuthItem',
                'itemChildTable'    => 'AuthItemChild',
                'assignmentTable' => 'AuthAssignment',
                'defaultRoles'       =>  array('Guest')
            ),

            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'caseSensitive'=>false,
                'rules'=>array(
                    'cpanel'=>'site/index',
                    'cpanel/<_c>'=>'<_c>',
                    'cpanel/<_c>/<_a>'=>'<_c>/<_a>',
                ),
            ))
    )
);