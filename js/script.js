$("#contact-form").submit(function(event) {
    var data = new FormData(this);
    $.ajax({
        url: "php/sendEmail.php",
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function(result, status, xhr) {
            $('#contact-container').html("Thank you for contacting us. We'll get back to you shortly.");
        },
        error: function(xhr, status, error) {
            console.log(status, error);
            $('#contact-container').html("There is some error while sending your message.<br/>Please try contacting via email or phone.");
        }
    });
    event.preventDefault();
});