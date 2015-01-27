'use strict';

var facebook_like_button = function(_href) {
    var like_button_url = '//www.facebook.com/plugins/like.php' +
                          '?href=' + _href +
                          '&width&layout=button_count&action=like' +
                          '&show_faces=false&share=false&height=21';

    var snip = '<iframe src="' + like_button_url + '" ' +
               'scrolling="no" frameborder="0" ' +
               'style="border: none; overflow: hidden; height: 21px; width: 100px;"' +
               'allowTransparency="true"></iframe>';

    return snip;
};

console.log('--> facebook_like_button: ' + facebook_like_button('http://www.bluewildscuba.com'));
