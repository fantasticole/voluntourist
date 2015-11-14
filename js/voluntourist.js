jQuery(document).ready(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut

    var parents = {};
    var menuItems = document.getElementsByClassName('page_item_has_children');
    for (var x = 0; x < menuItems.length; x++){
        var current = menuItems[x];
        var page = current.childNodes[0].innerHTML.toLowerCase();
        var classes = current.className.split(' ');
        parents[page] = classes[1];
        // console.log(parents);
    };

    if ($('.single-post').length > 0){
        // Get posts classes.
        var classes = $('article')[0].className.split(' ');
        for (var category in classes){
                // If the class is a parent page...
            if (parents[classes[category]]){
                // Show parent's sub-menu.
                $('.' + parents[classes[category]]).addClass('current_page_parent');
                // expandParent();
            }
        }
    }8

    function expandParent(){
        if ($(window).width() < 601 && $('.current_page_parent').length > 0){
            var childLIs = $('.current_page_parent .children')[0].children;
            var margin = 28*childLIs.length;
            $(".current_page_parent").css("margin-bottom", margin);
        }
        else if ($(window).width() < 601 && $('.current_page_item .children').length > 0){
            var childLIs = $('.current_page_item .children')[0].children;
            var margin = 28*childLIs.length;
            $(".current_page_item").css("margin-bottom", margin);
        }
    };

    $( window ).resize(function(){expandParent()});

    // $('.single-post .itemBody figure:odd').css({
    //     'float': 'right',
    //     'margin-left' : '30px'
    // });
    // $('.single-post .itemBody figure:even').css({
    //     'float': 'left',
    //     'margin-right' : '30px'
    // });

    // $('.single-post .itemBody p img:odd').css({
    //     'float': 'right',
    //     'margin-left' : '30px'
    // });
    // $('.single-post .itemBody p img:even').css({
    //     'float': 'left',
    //     'margin-right' : '30px',
    //     'margin-left' : '0'
    // });

	// //Set font-size based on container size.
	// $.fn.textfill = function() {
	// 	var num = 50;
	// 	var current = $(this)[0];
 //        var height = $(this).height();
 //        var width = $(this).width();
 //        console.log(current.style.fontSize);
 //        console.log(height);
 //        console.log(width);
 //        var textHeight;
 //        var textWidth;
 //        do {
 //            $(current).css('font-size', num);
 //            textHeight = $(this).height();
 //            textWidth = $(this).width();
 //            num = num - 1;
 //        } while ((textHeight > height || textWidth > width) && num > 3);
 //        console.log(current.style.fontSize);
 //        return this;
 //    }

 //    $('.adjust').textfill();

    expandParent();
});




