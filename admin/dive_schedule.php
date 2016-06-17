<?php

require_once('config.php');
require_once('db_helper.php');

$db_helper = new DBHelper($dbconn);

// Get all the dive sites so we can construct a select list.
$sql = "SELECT * FROM dive_sites ORDER BY name";
$sql = $db_helper->construct_secure_query($sql, array());
$res = $dbconn->query($sql);
if(!$res) {
    echo "ERROR: Query Failed: errno: " . $dbconn->errno . " error: " . $dbconn->error;
    exit();
}

$dive_sites = array();
while($row = $res->fetch_assoc()) {
    $a = array('id' => $row['id'], 'name' => $row['name']);
    array_push($dive_sites, $a);
}

//echo 'dive_site: ' . $_REQUEST['dive_site']; echo '<br/>';
//echo 'charter_time: ' . $_REQUEST['charter_time']; echo '<br/>';
//echo 'charter_date: ' . $_REQUEST['charter_date']; echo '<br/>';
//echo 'charter_save: ' . $_REQUEST['charter_save']; echo '<br/>';

if(isset($_REQUEST['charter_save']) && $_REQUEST['charter_save'] == 'Save') {
    // Save to the database
    $sql  = "INSERT INTO charter_schedules (dive_site1, dive_site2, charter_time, ";
    $sql .= "charter_date) VALUES (?, ?, ?, ?)";
    $params = array($_REQUEST['dive_site1'],
                    $_REQUEST['dive_site2'],
                    $_REQUEST['charter_time'],
                    $_REQUEST['charter_date']);
    $sql = $db_helper->construct_secure_query($sql, $params);
    $res = $dbconn->query($sql);
    if(!$res) {
        echo "ERROR: Query Failed: errno: " . $dbconn->errno . " error: " . $dbconn->error;
    }
}

?>
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
<link type="text/css" rel="stylesheet" href="/vendor/jquery-ui-1.11.4.custom/jquery-ui.theme.css" />
<link type="text/css" rel="stylesheet" href="/vendor/jquery-ui-1.11.4.custom/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/styles/foundation.css" />
<link type="text/css" rel="stylesheet" href="/styles/normalize.css" />
<link type="text/css" rel="stylesheet" href="/styles/bluewild.css" />
<link type="image/x-icon" rel="SHORTCUT ICON" href="/favicon.ico" />
<title>Blue Wild Scuba: dive schedule</title>
<script type="text/javascript" src="/vendor/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/vendor/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/bluewildscuba.js"></script>
<script type="text/javascript">

    function validate() {
        console.log('--> charter-date: ' + $('#charter-date').val());
        console.log('--> dive-site1: ' + $('#dive-site1').val());
        console.log('--> dive-site2: ' + $('#dive-site2').val());
        console.log('--> charter-time: ' + $('#charter-time').val());

        if(!$('#charter-date').val() || !$('#dive-site1').val() ||
           !$('#dive-site2').val() || !$('#charter-time').val()) {
            alert('All fields need to be filled out.');
            $('#charter-form').submit(function(e) {
                e.preventDefault();
            });
        }
    }


$(function() {

    var d = new Date();
    var month = d.getMonth() +1;
        month = (month < 10) ? '0' + month : month;
    var today = d.getFullYear() + '-' + month + '-' + d.getDate();
    //$('#charter-date').val(today);

    $('#charter-date').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
    });
});

</script>
<style>

#dive-site1, #dive-site2 {
    color: #000000;
    width: 300px;
}

#charter-date {
    width: 100px;
    display: inline-block;
    color: #000000;
}

#charter-time {
    width: 100px;
    display: inline-block;
    color: #000000;
}

#charter-save {
    color: #000000;
    margin-left: 25px;
}

</style>

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
              <li><a href="/aboutus.html">About Us</a></li>
              <li><a href="/charters.html">Charters</a></li>
              <li><a href="/dive_schedule.html">Dive Schedule</a></li>
              <!-- <li><a href="/divelog/index.php" target="_self" class="hide-for-small-only">Dive Log</a></li> -->
              <li><a href="/reefcreatures/index.php" target="_self">Reef Creature Quiz</a></li>
              <!-- <li style="float: right;"><span id="facebook-like-button2"></span></li> -->
            </ul>
        </div>
    </div>

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

            <form action="dive_schedule.php" method="post" id="charter-form">
                Date: <input type="text" name="charter_date" id="charter-date">

                Time: <select id="charter-time" name="charter_time">
                          <option value=""></option>
                          <option value="AM">AM</option>
                          <option value="PM">PM</option>
                      </select>
                <br />
                Dive Site 1: <select id="dive-site1" name="dive_site1">
                                 <option value=""></option>
                             <?php
                                 foreach($dive_sites as $site) {
                                     echo '<option value="' . $site['name'] . '">' .
                                     $site['name'] . '</option>';
                                 }
                             ?>
                             </select>
                <br />
                <br />
                Dive Site 2: <select id="dive-site2" name="dive_site2">
                                 <option value=""></option>
                             <?php
                                 foreach($dive_sites as $site) {
                                     echo '<option value="' . $site['name'] . '">' .
                                     $site['name'] . '</option>';
                                 }
                             ?>
                             </select>
                <br />
                <br />
                <input type="submit" onclick="validate();" id="charter-save" name="charter_save" value="Save" />
            </form>

        </div>
    </div>
</div>
<!-- END: home.html -->

</body>
</html>
