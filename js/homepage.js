jQuery(document).ready(function($) {

    // shop now button click handler
    $('.home .shop-now-btn').click(function() {
        window.open("http://www.secure-booker.com/skinperf/ShopOnline/Products.aspx");
    });

    // appointment bar book appointment click handler
    $('.appointment-bar .book-online-btn').click(openAppointmentLocationWindow);


    // prevent widows for homepage news elements
    $('.home .news-section .news-content .news .news-description').each(function() {
        var newsDescription = $(this).html();
        newsDescription = newsDescription.replace(/ ([^ ]*)$/,'&nbsp;$1');
        $(this).html(newsDescription);
    });

    // set testimonial container height for first testimonial
    var testimonials = ($('.testimonial'));
    $('.testimonial-section .testimonial-content').height($(testimonials[0]).height());
    currentTestimonialIndex = 0;

    // loop through testimonials
    setInterval(swapTestimonials, 7 * 1000);

    /**
     * Fixes the testimonial container's height so it will display the specified testimonial without cutting it off.
     * @param testimonial
     */
    function fixTestimonialContainerHeight(testimonial)
    {
        $('.testimonial-section .testimonial-content').animate({
            height: $(testimonial).height() + 'px'
        }, 500);
    }

    function swapTestimonials()
    {
        var nextTestimonialIndex = (currentTestimonialIndex == testimonials.length - 1) ? 0 : currentTestimonialIndex + 1;
        var outgoingTestimonial = testimonials[currentTestimonialIndex];
        var incomingTestimonial = testimonials[nextTestimonialIndex];
        $(outgoingTestimonial).fadeTo(500, 0);
        $(incomingTestimonial).fadeTo(500, 1);

        fixTestimonialContainerHeight(incomingTestimonial);

        currentTestimonialIndex = nextTestimonialIndex;
    }
});