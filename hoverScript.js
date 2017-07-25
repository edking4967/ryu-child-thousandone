var notification = jQuery(\"mainNotification\");
notification.mouseover(function () {
    console.log(\"yes!\");
    notification.css(\"border\", \"3px solid red\");
});
