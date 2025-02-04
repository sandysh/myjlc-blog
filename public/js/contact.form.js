/**
*
* -----------------------------------------------------------------------------
*
* Template : Educavo - Education HTML Template
* Author : rs-theme
* Author URI : http://www.rstheme.com/
*
* -----------------------------------------------------------------------------
*
**/

(function($) {
    'use strict';
    // Get the form.
    var form = $('#contact-form');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();
        console.log(formData);

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
             beforeSend: function() {
                   $(formMessages).empty();
       var loadingImage = $('<img>', {
            src: 'https://cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif', 
            alt: 'Loading...',
            class: 'loading-icon',
            style: 'display: block; margin: 0 auto; width: 30px; height: 30px;position:relative;bottom:10px;'
        });

        // Append the loading icon image to the formMessages div
        $(formMessages).append(loadingImage);
    }
        })
        .done(function(response) {
            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('error');
            $(formMessages).addClass('success');

            // Set the message text.
            $(formMessages).text(response);

            // Clear the form.
            $('#name, #email, #phone, #subject, #message').val('');
        })
        .fail(function(data) {
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');

            // Set the message text.
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occured and your message could not be sent.');
            }
        });
    });

})(jQuery);