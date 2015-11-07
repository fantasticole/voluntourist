jQuery(document).ready(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut

    function changeSlide(direction){
        var currentSlide = $('.current');
        var currentDot = $('.active-dot');
        if (direction === 'right'){
            var nextSlide = $('.current').next('li');
            if (nextSlide.length == 0){
                nextSlide = $('.visuals li').first();
            }
            var nextDot = $('.active-dot').next();
            if (nextDot.length == 0){
                nextDot = $('.slider-dots li').first();
            }
        }
        else {
            var nextSlide = $('.current').prev('li');
            if (nextSlide.length == 0){
                nextSlide = $('.visuals li').last();
            }
            var nextDot = $('.active-dot').prev();
            if (nextDot.length == 0){
                nextDot = $('.slider-dots li').last();
            }
        }
        currentDot.removeClass('active-dot');
        nextDot.addClass('active-dot');
        currentSlide.toggle().removeClass('current');
        nextSlide.toggle().addClass('current');
    }

    $('.right').click(function(event){changeSlide('right')});
    $('.left').click(function(){changeSlide('left')});
    // setInterval(function(event){changeSlide('right')}, 4000);


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




