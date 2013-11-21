$(function () {
    // Set starting slide to 1
    var startSlide = 1;
    // Get slide number if it exists
    if (window.location.hash) {
        startSlide = window.location.hash.replace('#', '');
    }
    // Initialize Slides
    $('#slides').slides({
        preload: true,
        generatePagination: true,
        play: 5000,
        pause: 2500,
        hoverPause: true,
        // Get the starting slide
        start: startSlide,
        animationComplete: function (current) {
            // Set the slide number as a hash
            //window.location.hash = '#' + current;
        }
    });
});
