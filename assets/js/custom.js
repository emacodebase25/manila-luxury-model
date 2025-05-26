jQuery(document).ready(function($) {
    // Initialize multiselect if exists
    if ($('#undo_redo').length) {
        $('#undo_redo').multiselect();
    }
    
    // Handle filter form
    $('.filter-form form').on('submit', function(e) {
        // You can add AJAX functionality here
    });
    
    // Smooth scroll for anchor links
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        }
    });
    
    // Add active class to current menu item
    var url = window.location.pathname;
    $('.navbar-nav a[href="' + url + '"]').parent().addClass('active');
});