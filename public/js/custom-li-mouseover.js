$("li").mouseover(function(e) {

    e = e || window.event; var cursor = { y: 0 }; cursor.y = e.pageY; //Cursor YPos
    var papaWindow = parent.window;
    var $pxFromTop = $(papaWindow).scrollTop();
    var $userScreenHeight = $(papaWindow).height();

    if (cursor.y > (($userScreenHeight + $pxFromTop) / 1.25)) {

        if ($pxFromTop < ($userScreenHeight * 3.2)) {

                    papaWindow.scrollBy(0, ($userScreenHeight / 30));
            }
        }
    else if (cursor.y < (($userScreenHeight + $pxFromTop) * .75)) {

        papaWindow.scrollBy(0, -($userScreenHeight / 30));

        }

}); //End mouseover()