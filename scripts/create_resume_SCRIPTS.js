// jQuery document ready function
$(document).ready(function() {
    // Event listener for button click
    $('#resumeSaved').click(function() {
        // Trigger SweetAlert
		swal({
			title: "Good job!",
			text: "Your Resume has been Completed!",
			icon: "success",
			buttons: {
				confirm: {
					text: "Confirm",
					value: true,
					visible: true,
					className: "btn btn-success",
					closeModal: true
				}
			}
		});
    });
});

// jQuery document ready function
$(document).ready(function() {
    // Event listener for button click
    $('#applyComplete').click(function() {
        // Trigger SweetAlert
		swal({
			title: "Good job!",
			text: "Your Application has been Completed!",
			icon: "success",
			buttons: {
				confirm: {
					text: "Confirm",
					value: true,
					visible: true,
					className: "btn btn-success",
					closeModal: true
				}
			}
		});
    });
});
