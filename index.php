<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Scuba dive, snorkeling and freediving the blue wild in North Miami. Daily dive trips to wrecks and reefs." />
<meta name="keywords" content="Scuba Diving, PADI, Open Water, Snorkel, Freediving, Miami" />
<meta name="author" content="Captain Mark" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400" />
<link type="text/css" rel="stylesheet" href="/vendor/font-awesome-4.1.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="/styles/foundation.css" />
<link type="text/css" rel="stylesheet" href="/styles/normalize.css" />
<link type="text/css" rel="stylesheet" href="/styles/bluewild.css" />
<link type="image/x-icon" rel="SHORTCUT ICON" href="favicon.ico" />
<title>Blue Wild Scuba: home</title>

<script type="text/javascript" src="/vendor/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bluewildscuba.js"></script>
<script type="text/javascript">

$(document).ready(function() {

    console.log('--> DOM is loaded');

});

</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1418859138704425",
    enable_page_level_ads: true
  });
</script>
</head>
<body>

<header>
    <div class="row offset-top">
        <div class="small-12 medium-6 large-6 columns no-padding small-only-text-center">
            <!-- For the below logo image, height ~100px -->
            <!-- <img id="logo-image" src="images/blue_wild_scuba_logo_new_2.png" alt="Blue Wild Scuba" /> -->
            <img id="logo-image" src="images/bluewildscuba_logo_transparent.png" alt="Blue Wild Scuba" />
            <!-- <div class="logo-style">Blue Wild</br>Scuba</div> -->
        </div>
        <div class="small-12 medium-6 large-6 columns contact-info small-only-text-center">
            <a href="tel:9543726163">
                <i class="fa fa-phone"></i> : (954) 372-6163</a>&nbsp;&nbsp;

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
          <li class="no-margin-left"><a class="active" href="/index.html"><i class="fa fa-home icon-font-size"></i></a></li>
          <li><a href="/aboutus.html">About Us</a></li>
          <li><a href="/charters.html">Charters</a></li>
          <li><a href="/dive_schedule.html">Dive Schedule</a></li>
          <!-- <li><a href="/divelog/index.php" target="_self" class="hide-for-small-only">Dive Log</a></li> -->
          <li><a href="/reefcreatures/index.php" target="_self">Reef Creature Quiz</a></li>
          <!-- <li style="float: right;"><span id="facebook-like-button2"></span></li> -->
        </ul>
    </div>
</div>

<?php

  require_once('instagram_lib.php');
  $images = array();
  foreach(instagram_posts() as $post) {
        $pic_link = $post['link'];
        $pic_text = $post['caption']['text'];

        $image = array(
            'src' => instagram_image($post),
            'alt' => $post['caption']['text'],
            'href' => $post['link']
        );
        array_push($images, $image);
    }

?>

<!-- BEGIN: home.html -->
<div class="row">
    <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-3 more-bottom-space">
      <li class="last-image">
        <a href="https://www.instagram.com/bluewildscuba/" target="_blank"><img src="/images/valerie_j_1.jpg" alt="Scuba Diving Charters" />
          <div class="instagram-caption">
            <img src="images/instagram-Logo-PNG-Transparent-Background.png" style="width: 20px;" />
            #bluewildscuba
          </div>
        </a>
      </li>

      <li class="show-for-medium-up last-image">
        <a href="<?php echo $images[0]['href']; ?>" target="_blank"><img src="<?php echo $images[0]['src']; ?>" alt="Scuba Diving" />
          <div class="instagram-caption">
            <img src="images/instagram-Logo-PNG-Transparent-Background.png" style="width: 20px;" />
            <?php echo short_caption($images[0]['alt'], 68); ?>
          </div>
        </a>
      </li>

      <li class="show-for-medium-up last-image">
        <a href="<?php echo $images[1]['href']; ?>" target="_blank"><img src="<?php echo $images[1]['src']; ?>" alt="Dive Boat" />
          <div class="instagram-caption">
            <img src="images/instagram-Logo-PNG-Transparent-Background.png" style="width: 20px;" />
            <?php echo short_caption($images[1]['alt'], 68); ?>
          </div>
        </a>
      </li>
    </ul>
</div>

<div class="row">
    <div class="small-12 large-12 columns no-padding antialised">
        <div class="panel">
            <p>SCUBA diving the North Miami area.  Here we are your guides to diving the BLUE WILD.
               We operate <a class="bwlink" href="dive_schedule.html">daily dive trips</a> out of
               North Miami, FL visiting the wrecks and reefs in the area.  There are many
               wreck and reef diving locations we have to choose from.  See our
               <a class="bwlink" href="dive_schedule.html">dive schedule</a>
               for what we have planned..
            </p>

            </br>
            <p>Our dive boat, the &quot;Valerie J&quot; is located in North Miami, Haulover Inlet.
               <a target="_blank" class="bwlink" href="https://www.google.com/maps/@25.9048232,-80.1205176,7946m/data=!3m1!1e3!4m2!6m1!1s1ILf42h7xpZBHzAa6z-WKC5aZHuQ">Google Map of the area</a> 
            </p>

            </br>
            <?php
                $hrefs = array(
                    'http://www.seadreamsscuba.com/courses/',
                    'https://www.northmiamidivers.com/collections/classes'
                  );
                $random_href = $hrefs[(rand() % count($hrefs))];
            ?>
            <p>Thinking about becoming Open Water
               certified? Need to take a scuba refresher
               course ?  Interested in becoming a PADI Divemaster?

               Please contact us with any questions.
            </p>
        </div>
    </div>
</div>
<!-- END: home.html -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91308839-1', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>
