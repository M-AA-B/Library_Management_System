// Submit form function
$("#submit-btn").click(function(e) {
    e.preventDefault();

    // Get form values
    var date = $("#reservation-date").val();
    var time = $("#reservation-time").val();
    var roomType = $("#room-type").val();
    var fullName = $("#full-name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();

    // Check availability
    checkAvailability(date, time).then(function(available) {
        if (available) {
            // Here you can submit the form data to your server
            // ...
            alert("Your reservation is confirmed.");
            // Clear form fields
            $("#reservation-form")[0].reset();
        } else {
            alert("Sorry, the selected date and time are not available. Please choose a different date or time.");
        }
    }).catch(function(error) {
        console.error('Error checking availability:', error);
    });
});
