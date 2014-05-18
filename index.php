<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="vendor/angular-1.2.16/angular.js"></script>
<script type="text/javascript" src="vendor/angular-1.2.16/angular-route.js"></script>
<script type="text/javascript" src="js/controllers.js"></script>
<link rel="stylesheet" href="vendor/font-awesome-4.1.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="styles/bluewild.css">
<link rel="stylesheet" href="styles/normalize.css">
<link rel="SHORTCUT ICON" href="favicon.ico" />
<title>Blue Wild - Scuba Diving</title>
</head>
<body ng-app="bw2">
<header>
    <div class="header-wrapper">
      <h1 id="logo">blue wild us</h1>
      <div class="contact-info">
         <a href="mailto:bluewildscuba@gmail.com" target="_blank">
            <i class="fa fa-envelope"></i> : bluewildscuba@gmail.com&nbsp;&nbsp;
         </a>
         <a href="tel:19542135067">
            <i class="fa fa-phone"></i> : (954) 213-5067
         </a>
      </div>
    </div>
</header>

<div ng-view></div>

</body>
</html>
