<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251">
	<meta charset="utf-8">
	<title>Error 404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/404/cloud-admin.css" >
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/404/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/404/daterangepicker-bs3.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>

<body id="not-found-bg">
	<div class="overlay"></div>
	<section id="page">
			<div class="row">
				<div class="col-md-12">
					<div class="divide-100"></div>
				</div>
			</div>
			<div class="row">
				<div class="container">
				<div class="col-md-12 not-found">
				   <div class="error">
					  404
				   </div>
				</div>
				<div class="col-md-5 not-found">
				   <div class="content">
					  <h3>Что-то пошло не так!</h3>
					  <p>
						  При отображении страницы возникли проблемы<br /><br />
                          <a href="<?=$this->createUrl("../.");?>" class="btn btn-danger">вернуться на стартовую страницу</a>
					  </p>

				   </div>
				</div>
				</div>
			</div>
	</section>
</body>

</html>