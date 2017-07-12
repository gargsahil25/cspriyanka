$("#contact-form").submit(function(event) {
    $.ajax({
        dataType: "json",
        url: "php/sendEmail.php",
        method: "POST",
        async: true,
        data: {
        	name: $('#contact-name').val(),
        	contact: $('#contact-detail').val(),
        	message: $('#contact-message').val()
        },
        success: function(data) {
            $('#contact-container').html("Thank you for contacting us. We'll get back to you shortly.");
        },
        error: function(err) {
        	$('#contact-container').html("There is some error while sending your message. Please try contacting via email or phone.");
            console.log(err);
        }
    });
    event.preventDefault();
});