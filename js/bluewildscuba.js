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

var scrollTo = function(id) {
    id.replace('#','');

     $('html, body').animate({
        scrollTop: $('#' + id).offset().top
    }, 700);
};

 /*var anchor_to = function(id){
     var a = location.search;
     console.log(a);

 };*/

 var click_scroll = function(){
     $(document).ready(function(){
         scrollTo(id);
     });
};

//========Begin Accordion========>

$(document).ready(function(){
  $('#accordion').accordion({
    heightStyle: "content"
  });
});

var heightStyle = $('#accordion').accordion();
$('#accordion').accordion();
