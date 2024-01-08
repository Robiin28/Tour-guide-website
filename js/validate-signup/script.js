const form = document.getElementById('form');
const passwordOne = document.getElementById('password-one');
const passwordTwo = document.getElementById('password-two');

let isValid = false;
let passwordsMatch = false;

function validateForm() {
  //  to check form validity
  isValid = form.checkValidity();
  // If the form isn't valid
  if (!isValid) {
    
    alert ('Please fill out all fields.');
    
    return;
  }
  // Check to see if both password fields match
  if (passwordOne.value === passwordTwo.value) {
    // If they match, set value to true and borders to green
    passwordsMatch = true;
    passwordOne.style.borderColor = 'green';
    passwordTwo.style.borderColor = 'green';
  } else {
    // If they don't match, border color of input to red, change message
    passwordsMatch = false;
    alert( 'Make sure passwords match.');
    passwordOne.style.borderColor = 'red';
    passwordTwo.style.borderColor = 'red';
    return;
  }
  // If form is valid and passwords match
  if (isValid && passwordsMatch) {
    // Style main message for success
    // alert('sucessfully signed up');
    
  }
}

function storeFormData() {
  const user = {
    name: form.full-name.value,
    phone: form.phone.value,
    email: form.email.value,
    address: form.address.value,
    password: form.password.value,
  };
  // Do something with user data
  //console.log(user); we can use these data values if there is an application to be done online
}

function processFormData(e) {
  // Validate Form
   validateForm();
  // Submit Form if Valid
  if (isValid && passwordsMatch) {
    storeFormData();
  }
}

// Event Listener
form.addEventListener('submit', processFormData);

