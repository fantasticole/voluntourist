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
        // console.log(classes);
        for (var category in classes){
                // If the class is a parent page...
            if (parents[classes[category]]){
                // Show parent's sub-menu.
                $('.' + parents[classes[category]]).addClass('current_page_parent');
                break;
            }
        }
    };

    function findCategories(){
        // Get possible child catrgories.
        var kids = $('.nav-menu .current_page_parent .children')[0].children;
        // Grab parent link.
        var sibLink = $('.nav-menu .current_page_parent .children').prev()[0].href;
        var kiddies = [];
        // Aggregate potential categories with their selectors.
        for (var x = 0; x < kids.length; x++){
            var current = kids[x];
            var currentClass = current.className.split(' ')[1]
            var cat = current.childNodes[0].href;
            cat = cat.slice(cat.indexOf(sibLink) + sibLink.length, cat.length - 1)
            kiddies.push([cat, currentClass]);
        };
        var classes = $('article')[0].className.split(' ');
        // For each category associated with the post...
        for (var category in classes){
            // Check it against the current child pages,
            for (var x = 0; x < kiddies.length; x++){
                if (kiddies[x][0].indexOf(classes[category]) === 0){
                    // And mark the category in the menu.
                    $('.' + kiddies[x][1]).addClass('current_page_parent');
                }
            }
        }
    };

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

    $(document).click(function() {
        $('.country-dropdown').removeClass('active');
    });

    $('.country-dropdown').click(function(event){
        $(this).toggleClass('active');
        return false;
    });

    $('.country-dropdown li a').click(function(){
        var url = $(this)[0].href;
        window.location.href = url;
    });

    if ($('.location').length > 0){
        var currentCountry = $('.dropdown .current_page_item a')[0].innerHTML;
        $('.location').text(currentCountry);
        $('.location').append('  <i class="fa fa-angle-double-left"></i>');
    }

    if ($('.single').length){
        findCategories();
    }
    expandParent();
});




