document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".contact-form");
  const nameInput = document.getElementById("name");
  const emailInput = document.getElementById("email");
  const passwordInput = doucument.getElementbyId("password")
  const messageInput = document.getElementById("message");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); // prevent actual form submission

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const message = messageInput.value.trim();
    const password = passwordInput.value.trim();


    if (!name || !email || !password || !message) {
      alert("Please fill in all fields.");
      return;
    }

    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    if (!validatePassword(password)) {
      alert("Please enter a valid password.");
      return;
    }


    // Simulate form submission
    alert("Thank you, " + name + "! Your message has been sent.");
    
    // Optionally clear the form
    form.reset();
  });

  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email.toLowerCase());
  }

  function checkPassword() {
  var password = document.getElementById("password").value;
  if (password.trim() === "") {
    alert("You have not entered a password!");
    return false; // prevent form submission
  }
  return true;
}

});
