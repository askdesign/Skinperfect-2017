jQuery(document).ready(function($) {

    // navbar logo click handler
    $('#navbar .logo').click(function() {
        window.location = "/";
    });

    // navbar book appointment click handler
    $('#navbar .book-appointment').click(openAppointmentLocationWindow);

    // click handler for Book Now buttons in services
    $('.book-now').click(openAppointmentLocationWindow);

    // menu list item click handler - treats click as if it was a click on the anchor tag inside the <li>
    $('#navbar ul > li > ul li').click(function() {
        var $anchor = $(this).find("a");
        var url = $anchor.attr("href");
        if (url != undefined && url != "#")
        {
            window.location = url;
        }
    });

    // add labels to newsletter opt-in forms
    $('.ns_widget_mailchimp_first_name').val('First Name');
    $('#ns_widget_mailchimp-email-2').val('Email');

    // opt-in form first name change handlers (focus in and out)
    $('.ns_widget_mailchimp_first_name').focusin(function() {
        if ($(this).val() == "First Name")
        {
            $(this).val("");
        }
    });
    $('.ns_widget_mailchimp_first_name').focusout(function() {
        if ($(this).val() == "")
        {
            $(this).val("First Name");
        }
    });

    // opt-in form email change handlers (focus in and out)
    $('#ns_widget_mailchimp-email-2').focusin(function() {
        if ($(this).val() == "Email")
        {
            $(this).val("");
        }
    });
    $('#ns_widget_mailchimp-email-2').focusout(function() {
        if ($(this).val() == "")
        {
            $(this).val("Email");
        }
    });

    // remove height and width from all images
    $('img').removeAttr('width').removeAttr('height');

    // overlay click to close
    $('#overlay').click(function() {
        $('#overlay').removeClass('show');
    });

    // hamburger click handler
    $('#hamburger').click(function() {
        $('#navbar .menu').show();
        $('#navbar .appointment').show();
        $('#navbar .cmp-button').show();
        $('#secondary-navbar').show();
        $('#hamburger').hide();
        $('#menu-close').show();
    })

    // menu-close click handler
    $('#menu-close').click(function() {
        $('#navbar .menu').hide();
        $('#navbar .appointment').hide();
        $('#navbar .cmp-button').hide();
        $('#secondary-navbar').hide();
        $('#hamburger').show();
        $('#menu-close').hide();
    })

});

/**
 * Open the location selection window to book an appointment.
 */
function openAppointmentLocationWindow()
{
    document.getElementById("overlay").className = "show";
}
