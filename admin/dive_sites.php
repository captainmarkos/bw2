<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Scuba diving schedule for daily dive charters in Fort Lauderdale, Florida." />
<meta name="keywords" content="Scuba Diving, PADI, Open Water, Free Diving, Fort Lauderdale" />
<meta name="author" content="Captain Mark" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400" />
<link type="text/css" rel="stylesheet" href="/vendor/font-awesome-4.1.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="/styles/foundation.css" />
<link type="text/css" rel="stylesheet" href="/styles/normalize.css" />
<link type="text/css" rel="stylesheet" href="/styles/bluewild.css" />
<link type="image/x-icon" rel="SHORTCUT ICON" href="favicon.ico" />
<title>Blue Wild Scuba: dive schedule</title>
<script type="text/javascript" src="/vendor/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bluewildscuba.js"></script>
<script type="text/javascript" src="vendor/moment.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

    console.log('--> DOM is loaded');

});

</script>
</head>
<body>

    <header>
        <div class="row offset-top">
            <div class="small-12 medium-6 large-6 columns no-padding small-only-text-center">
                <div class="logo-style">Blue Wild</br>Scuba</div>
            </div>
            <div class="small-12 medium-6 large-6 columns contact-info small-only-text-center">
                <a href="tel:19542135067">
                    <i class="fa fa-phone"></i> : (954) 213-5067
                </a>&nbsp;&nbsp;

                <br class="show-for-small-only" />
                <br class="show-for-small-only" />

                <a href="mailto:bluewildscuba@gmail.com" target="_blank">
                    <i class="fa fa-envelope"></i> : bluewildscuba@gmail.com
                </a>&nbsp;&nbsp;
            </div>
        </div>
    </header>

    <!-- navbar -->
    <div class="row">
        <div class="large-12 column nav">
            <ul class="inline-list">
              <li class="no-margin-left"><a href="/"><i class="fa fa-home icon-font-size"></i></a></li>
              <li><a href="/courses.html">Scuba Courses</a></li>
              <li><a href="/aboutus.html">About Us</a></li>
              <li><a href="/divelog/index.php" target="_self" class="hide-for-small-only">Dive Log</a></li>
              <li><a href="/reefcreatures/index.php" target="_self">Reef Creature Quiz</a></li>
              <!-- <li style="float: right;"><span id="facebook-like-button2"></span></li> -->
            </ul>
        </div>
    </div>

<!-- BEGIN: home.html -->
</br>
<div class="row">
  <div class="">
      The dive schedule is updated regularly.  Additionally the captain may change
      dive site locations due to conditions and / or circumstances.
  </div>
</div>
</br>

<div class="row">
    <div class="small-12 large-12 columns no-padding antialised">
        <div class="panel">
            <p>
              <script type="text/javascript">
                  var dive_date = moment('2016-05-30').format('dddd MMMM DD YYYY');
                  var dive_time = '8:00 AM';
                  document.write(dive_date + ' | ' + dive_time);
              </script>
              </br>
              </br>
              <a href="">Hog Heaven</a> | depth 70ft
              </br>
              <a href="">Reef</a> | depth 30ft
            </p>
        </div>
    </div>
</div>
<!-- END: home.html -->

</body>
</html>
