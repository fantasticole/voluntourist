jQuery(document).ready(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut

    if ($(window).width() < 601 & $('.current_page_parent').length > 0){
        var childLIs = $('.current_page_parent .children')[0].children;
        var margin = 28*childLIs.length;
        $(".current_page_parent").css("margin-bottom", margin);
    }

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
});




