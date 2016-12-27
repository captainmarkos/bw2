<?php

    function instagram_posts($post_count=3) {
       // use this instagram access token generator http://instagram.pixelunion.net/
        $access_token = "4176933139.1677ed0.cc5f93bcf7f34a4b83b5461855425221";

        $json_link  = "https://api.instagram.com/v1/users/self/media/recent/?";
        $json_link .= "access_token={$access_token}&count={$post_count}";

        $json = file_get_contents($json_link);
        $json_obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
        return($json_obj['data']);
    }

    function instagram_image($post) {
        // Attempt to download the image and save it locally.  If the file
        // is not saved then the url is returned otherwise the full path
        // to the locally saved file is returned.
        $pic_src = $post['images']['standard_resolution']['url']; 
        $image_raw = file_get_contents($pic_src);

        $image_path = $_SERVER["DOCUMENT_ROOT"] . '/images/instagram/';
        $image_name = 'instagram_created_' . $post['created_time'] . '.jpg';
        $full_name = $image_path . $image_name;

        if(!file_exists($full_name)) {
            $fp = fopen($full_name, 'w');
            $result = fwrite($fp, $image_raw);
            fclose($fp);
        } elseif(file_exists($full_name)) { $result = TRUE; }

        //echo '<pre style="text-align: left;">'; print_r($bytes); echo '</pre>';
        return(!$result ? $pic_src : '/images/instagram/' . $image_name);
    }
?>
