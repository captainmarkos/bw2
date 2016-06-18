<?php

date_default_timezone_set('UTC');

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
    if($row['depth']) {
        $name = $row['name'] . ' | ' . $row['depth'] . 'ft';
    } else {
        $name = $row['name'];
    }

    $a = array('id' => $row['id'], 'name' => $name);
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

if(isset($_REQUEST['create_schedule']) && $_REQUEST['create_schedule'] == 'Create Schedule') {
    generate_dive_schedule();
}

function generate_dive_schedule() {
    // Make a backup of the current schedule.
    $today = date('Y-m-d_His');
    $src  = '../dive_schedule.html';
    $dest = '../backup/dive_schedule.html-' . $today;
    if(!copy($src, $dest)) {
        debug_js('backup of ' . $src . ' failed');
        return false;
    }
    debug_js($src . ' copied to ' . $dest);

    // Open the template file and do string replacement.
    $tmpl = 'dive_schedule.html.tmpl';
    $content = file_get_contents($tmpl);
    if(!$content) {
        debug_js('failed to get contents of ' . $tmpl);
        return false;
    }

    return true;
}


function debug_js($str) {
    echo '<script type="text/javascript">' .
         '    console.log("--> ' . $str . '");' .
         '</script>';
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
        return false;
    }
    return true;
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

#charter-form {
    font-size: .9em;
    text-align: center;
}

#dive-site1, #dive-site2 {
    color: #000000;
    width: 250px;
    font-size: .9em;
}

#charter-date {
    width: 100px;
    display: inline-block;
    color: #000000;
    font-size: .9em;
    margin-right: 10px;
}

#charter-time {
    width: 60px;
    display: inline-block;
    color: #000000;
    font-size: .9em;
    margin-right: 10px;
}

#charter-save {
    color: #000000;
    margin-left: 25px;
    font-size: .9em;
}

#create-schedule {
    color: #000000;
    font-size: .9em;
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
              <li><a href="../aboutus.html">About Us</a></li>
              <li><a href="../charters.html">Charters</a></li>
              <li><a href="../dive_schedule.html">Dive Schedule</a></li>
              <!-- <li><a href="../divelog/index.php" target="_self" class="hide-for-small-only">Dive Log</a></li> -->
              <li><a href="../reefcreatures/index.php" target="_self">Reef Creature Quiz</a></li>
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

                Site 1: <select id="dive-site1" name="dive_site1" style="margin-right: 10px;">
                             <option value="Open">Open</option>
                             <?php
                                 foreach($dive_sites as $site) {
                                     echo '<option value="' . $site['name'] . '">' .
                                     $site['name'] . '</option>';
                                 }
                             ?>
                         </select>

                Site 2: <select id="dive-site2" name="dive_site2">
                             <option value="Open">Open</option>
                             <?php
                                 foreach($dive_sites as $site) {
                                     echo '<option value="' . $site['name'] . '">' .
                                     $site['name'] . '</option>';
                                 }
                             ?>
                         </select>

                <div style="text-align: center; margin-top: 30px;">
                    <span>
                        <input type="submit"
                               id="charter-save"
                               name="charter_save"
                               onclick="return validate();"
                               value="Save" />
                    </span>
                    <span>
                        <input type="submit"
                               id="create-schedule"
                               name="create_schedule"
                               onclick="create_schedule();"
                               value="Create Schedule" />
                    </span>
                </div>
            </form>

            <?php print_charter_table($dbconn); ?>

        </div>
    </div>
</div>
<!-- END: home.html -->

</body>
</html>
<?php

function print_charter_table($dbconn) {
    $db_helper = new DBHelper($dbconn);

    $week_ago = date('Y-m-d', strtotime('-1 week'));
    $sql  = "SELECT * FROM charter_schedules WHERE charter_date >= ? ";
    $sql .= "ORDER BY charter_date LIMIT 28";

    $sql = $db_helper->construct_secure_query($sql, array($week_ago));
    $res = $dbconn->query($sql);
    if(!$res) {
        echo "ERROR: Query Failed: errno: " . $dbconn->errno . " error: " . $dbconn->error;
        exit();
    }

    echo '<div id="charter-table">';
    echo '<table style="width: 100%;">';
    echo '    <tr>';
    echo '        <td>Date</td>';
    echo '        <td>Time</td>';
    echo '        <td>Site 1</td>';
    echo '        <td>Site 2</td>';
    echo '    </tr>';

    while($row = $res->fetch_assoc()) {
        echo '    <tr>';
        echo '        <td>' . $row['charter_date'] . '</td>';
        echo '        <td>' . $row['charter_time'] . '</td>';
        echo '        <td>' . $row['dive_site1'] . '</td>';
        echo '        <td>' . $row['dive_site2'] . '</td>';
        echo '    </tr>';
    }

    echo '</table>';
    echo '</div>';
}

?>