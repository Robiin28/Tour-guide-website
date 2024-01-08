// Login and Signup Pop Ups

document.querySelector("#show-login").addEventListener("click", function () {
  document.querySelector(".signup-form").classList.remove("active");
  document.querySelector(".login-form").classList.add("active");
});

document.querySelector(".login-form .close-btn").addEventListener("click", function () {
  document.querySelector(".login-form").classList.remove("active");
});

document.querySelector("#show-signup").addEventListener("click", function () {
  document.querySelector(".login-form").classList.remove("active");
  document.querySelector(".signup-form").classList.add("active");
});

document.querySelector(".signup-form .close-btn").addEventListener("click", function () {
  document.querySelector(".signup-form").classList.remove("active");
});

document.querySelector(".login-form .signup-link").addEventListener("click", function () {
  document.querySelector(".login-form").classList.remove("active");
  document.querySelector(".signup-form").classList.add("active");
});

document.querySelector(".signup-form .login-link").addEventListener("click", function () {
  document.querySelector(".signup-form").classList.remove("active");
  document.querySelector(".login-form").classList.add("active");
});

// Auto scroll to contact us section

document.querySelector(".contactus").addEventListener("click", function () {
  document.getElementById("contact-us").scrollIntoView(true)
});

// Toggle googel translate when translate button is clicked

document.querySelector(".language-toggle").addEventListener("click", function () {
  var bool = document.getElementById("google_element").style.display == "none";
  if (bool) {
    document.getElementById("google_element").style.display = "block";
  } else {
    document.getElementById("google_element").style.display = "none";
  }
});