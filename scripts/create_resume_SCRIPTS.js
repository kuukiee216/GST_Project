     

// Function to open the edit modal
function opensesame() {
  var content = document.getElementById('Pname').innerText;
  document.getElementById('editInput1').value = content.trim();
  var content = document.getElementById('tel').innerText;
  document.getElementById('editInput2').value = content.trim();
  var content = document.getElementById('email').innerText;
  document.getElementById('editInput3').value = content.trim();
  var content = document.getElementById('loc').innerText;
  document.getElementById('editInput4').value = content.trim();
  $('#edit_detail').modal('show');
}

// Clear the input field


  // Function to save changes made in the modal
  function saveChanges() {
	var editedContent = document.getElementById('editInput1').value;
	document.getElementById('Pname').innerText = editedContent;
	var editedContent = document.getElementById('editInput2').value;
	document.getElementById('tel').innerText = editedContent;
	var editedContent = document.getElementById('editInput3').value;
	document.getElementById('email').innerText = editedContent;
	var editedContent = document.getElementById('editInput4').value;
	document.getElementById('loc').innerText = editedContent;
	$('#edit_detail').modal('hide');
  }

 //hehe ang galing
  function saveInput() {
	// Get input value
	var inputValue = document.getElementById('summary').value;
	var inputValue2 = document.getElementById('role').value;
	var inputValue3 = document.getElementById('about').value;
  
	// Get the output div
	var outputDiv = document.getElementById('outputDiv');
	var outputDiv2 = document.getElementById('outputDiv2');
	var outputDiv3 = document.getElementById('outputDiv3');
  
	// Clear the input field
	document.getElementById('summary').value = '';
	document.getElementById('role').value = '';
	document.getElementById('about').value = '';

  
	// Set input value as text content of the output div
	outputDiv.textContent = inputValue;
	outputDiv2.textContent = inputValue2;
	outputDiv3.textContent = inputValue3;
  }


  function addCard() {
	// Clone the card template
	var cardTemplate = document.getElementById('cardTemplate');
	//var newCard = cardTemplate.cloneNode(true);

	// Create a new div element for the card
	var newCard = document.createElement("div");
	
	// Set the inner HTML content for the card
	newCard.innerHTML = `
			  <div class="container card">
				<div class="card-body">
				  <div class="row">
	
					<div class="col" id="content2">
					  <h5 id="course" class="card-title mb-3">College Course</h5>
					  <p id="school" class="card-text mb-2">Name of College/University</p>
					  <p id="address" class="card-text mb-2">Address</p>
					  <p id="year" class="card-text">Year Graduated</p>
					</div>
	
					<div class="col d-flex justify-content-end">
					  <a class="btn" onclick="opensesame2()" data-toggle="modal"><i class="fa fa-edit"></i></a>
					  <a class="btn" onclick="deleteCard(this)"><i class="fa fa-trash"></i></a>
	
					  <!-- Modal -->
					  <div class="modal fade" id="edit_detail_educ" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Edit Details</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
	
								<div class="modal-body">
									<label>Course</label>
									<input type="text" class="form-control" id="editInput5" placeholder="Course">
									<label>School</label>
									<input type="tel" class="form-control" id="editInput6" placeholder="school">
									<label>School Address</label>
									<input type="email" class="form-control" id="editInput7" placeholder="address">
									<label>Year Graduated</label>
									<input type="text" class="form-control" id="editInput8" placeholder="year">
								  </div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									<button type="button" onclick="saveChanges2()" class="btn btn-danger">Save changes</button>
								</div>
							</div>
						  </div>
						</div>
					</div>
				  </div>
				</div>
			  </div>
		  `;

	// Show the new card by removing the 'display: none' style
	newCard.style.display = '';

	// Append the new card to the body of the document
	document.body.appendChild(newCard);

	// Append the new card to the card container
	var cardContainer = document.getElementById('cardContainer');
		cardContainer.appendChild(newCard);
	
	/*Get the button to add the element
	var addButton = document.getElementById('addButton')

	// Set the maximum number of elements allowed
	var maxElements = 3;
			
	// Counter to keep track of the number of elements added
	var numElements = 1;
			
	// Add event listener to the add button
	addButton.addEventListener('click', function() {
	  if (numElements < maxElements) {
	  addCard();
	  numElements++;
	  } else {
	  alert('Maximum number of elements reached!');
	  }
	});*/
  }

  function deleteCard(button) {
	// Get the parent card element and remove it
	var card = button.closest('.card');
	card.remove();
  }

	// Function to open the edit modal
	function opensesame2() {
	  var content2 = document.getElementById('course').innerText;
	  document.getElementById('editInput5').value = content2.trim();
	  var content2 = document.getElementById('school').innerText;
	  document.getElementById('editInput6').value = content2.trim();
	  var content2 = document.getElementById('address').innerText;
	  document.getElementById('editInput7').value = content2.trim();
	  var content2 = document.getElementById('year').innerText;
	  document.getElementById('editInput8').value = content2.trim();
	  $('#edit_detail_educ').modal('show');
	}
	
	// Function to save changes made in the modal
	function saveChanges2() {
	  var editedContent2 = document.getElementById('editInput5').value;
	  document.getElementById('course').innerText = editedContent2;
	  var editedContent2 = document.getElementById('editInput6').value;
	  document.getElementById('school').innerText = editedContent2;
	  var editedContent2 = document.getElementById('editInput7').value;
	  document.getElementById('address').innerText = editedContent2;
	  var editedContent2 = document.getElementById('editInput8').value;
	  document.getElementById('year').innerText = editedContent2;
	  $('#edit_detail_educ').modal('hide');
	}

	// Function to add an element to the card
	function addSkill() {
	  // Get the input value
	  var inputValue = document.getElementById('skills').value;
	
	  // Create a new card element
	  var newCard = document.createElement('div');
	  newCard.innerHTML = `
		<div id="addNewSkill" class="card mb-3">
		  <div class="card-body">
			<div class="row">
			  <div class="col">
				<h5>${inputValue}</h5>
			  </div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col d-flex align-items-end">
				<a onclick="deleteSkill(this)" class="btn"><i class="fa fa-trash"></i></a>
			  </div>
			</div>
		  </div>
		</div>
	  `;
	
	  // Append the new card to the card container
	  var cardContainer2 = document.getElementById('cardContainer2');
	  cardContainer2.appendChild(newCard);
	
	  // Clear the input field
	  document.getElementById('skills').value = '';
	}

	function deleteSkill(button) {
	  // Get the parent card element and remove it
	  var card = button.closest('.card');
	  card.remove();
	}

	// Function to add an element to the card
	function addLang() {
	  // Get the input value
	  var inputValue = document.getElementById('languages').value;
	
	  // Create a new card element
	  var newCard = document.createElement('div');
	  newCard.innerHTML = `
		<div id="addNewSkill" class="card mb-3">
		  <div class="card-body">
			<div class="row">
			  <div class="col">
				<h5>${inputValue}</h5>
			  </div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col"></div>
			  <div class="col d-flex align-items-end">
				<a onclick="deleteSkill(this)" class="btn"><i class="fa fa-trash"></i></a>
			  </div>
			</div>
		  </div>
		</div>
	  `;
	
	  // Append the new card to the card container
	  var cardContainer3 = document.getElementById('cardContainer3');
	  cardContainer3.appendChild(newCard);
	
	  // Clear the input field
	  document.getElementById('languages').value = '';
	}

	function deleteLang(button) {
	  // Get the parent card element and remove it
	  var card = button.closest('.card');
	  card.remove();
	}

	document.addEventListener("DOMContentLoaded", function () {
		document.getElementById("validateForm").addEventListener("submit", function (event) {
		  var editInput1 = document.getElementById("editInput1").value.trim();
		  var editInput2 = document.getElementById("editInput2").value.trim();
		  var editInput3 = document.getElementById("editInput3").value.trim();
		  var editInput4 = document.getElementById("editInput4").value.trim();
		  var nameError = document.getElementById("nameError");
		  var phoneError = document.getElementById("phoneError");
		  var emailError = document.getElementById("emailError");
		  var locationError = document.getElementById("locationError");
		  var isValid = true;
	  
		  // Reset error messages
		  nameError.textContent = "";
		  emailError.textContent = "";
	  
		  // Validate name field
		  if (editInput1 === "") {
			nameError.textContent = "Name is required";
			isValid = false;
		  }

		  // Validate phone number
		  if (editInput2 == "") {
			phoneError.textContent = "Phone is required";
			isValid = false;
		  }
	  
		  // Validate email field
		  if (editInput3 === "") {
			emailError.textContent = "Email is required";
			isValid = false;
		  } else if (!isValidEmail(email)) {
			emailError.textContent = "Invalid email format";
			isValid = false;
		  }

		  // Validate Location
		  if (editInput4 == "") {
			locationError.textContent = "Lcation is required";
			isValid = false;
		  }
	  
		  // Prevent form submission if not valid
		  if (!isValid) {
			event.preventDefault();
		  }
		});
	  
		function isValidEmail(email) {
		  // Regular expression for validating email format
		  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		  return emailRegex.test(email);
		}
	  });
	  


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
