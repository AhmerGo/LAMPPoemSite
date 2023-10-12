document.addEventListener("DOMContentLoaded", function () {
  function getCurrentTimeStamp() {
    var date = new Date();
    return new Date(
      Date.UTC(
        date.getFullYear(),
        date.getMonth(),
        date.getDate(),
        date.getHours(),
        date.getMinutes(),
        date.getSeconds()
      )
    );
  }

  function displayTime() {
    var now = getCurrentTimeStamp();
    var cs = document.getElementById("clock");
    const matches = now.toUTCString().match(/\d{2}:\d{2}:\d{2}/);
    if (matches && matches[0]) {
      cs.innerHTML = matches[0];
    }
  }

  displayTime();
  setInterval(displayTime, 1000);

  function slideUp() {
    let loremDiv = document.getElementById("loremDiv");
    loremDiv.style.backgroundColor = "yellow";
    let height = loremDiv.offsetHeight;
    loremDiv.style.height = height + "px";
    loremDiv.style.overflow = "hidden";

    let interval = setInterval(() => {
      height -= 5;
      if (height <= 0) {
        clearInterval(interval);
        loremDiv.style.display = "none";
      } else {
        loremDiv.style.height = height + "px";
      }
    }, 100);
  }

  // Set the click event handler
  document.getElementById("loremDiv").addEventListener("click", slideUp);

  function isValidPhoneNumber(phone) {
    return (
      phone.search(
        /^(\(\d{3}\)\s?\d{3}-\d{4}|\d{3}-\d{4}|\d{3}-\d{3}-\d{4})$/
      ) !== -1
    );
  }

  document.getElementById("poemForm").onsubmit = validateForm;

  function validateForm(evt) {
    evt.preventDefault(); // Prevent form submission

    // Elements
    var nameInput = document.getElementById("name");
    var phoneInput = document.getElementById("phoneNumber");
    var poemTypeSelect = document.getElementById("poemType");
    var titleInput = document.getElementById("title");
    var poemTextInput = document.getElementById("poemText");

    // Error spans
    var nameErrorSpan = document.getElementById("name-error");
    var phoneErrorSpan = document.getElementById("phone-error");

    // Trim values
    nameInput.value = nameInput.value.trim();
    phoneInput.value = phoneInput.value.trim();

    // Validation regex pattern for name
    var namePattern = /^[A-Za-z\s\-]{2,}$/;

    // Flags for validation
    let isValidName = true;
    let isValidPhone = true;

    // Validate name
    if (!namePattern.test(nameInput.value)) {
      nameErrorSpan.style.display = "inline"; // Show error
      isValidName = false;
    } else {
      nameErrorSpan.style.display = "none"; // Hide error
    }

    // Validate phone number using existing function
    if (!isValidPhoneNumber(phoneInput.value)) {
      phoneErrorSpan.style.display = "inline"; // Show error
      isValidPhone = false;
    } else {
      phoneErrorSpan.style.display = "none"; // Hide error
    }

    // If all inputs are valid, submit the form via AJAX
    if (isValidName && isValidPhone) {
      // Construct form data
      var formData = new FormData();
      formData.append("name", nameInput.value);
      formData.append("phoneNumber", phoneInput.value);
      formData.append("poemType", poemTypeSelect.value);
      formData.append("title", titleInput.value);
      formData.append("poemText", poemTextInput.value);

      fetch("submit_poem.php", {
        // assuming the PHP file is in the same directory as your HTML file
        method: "POST",
        body: formData,
      })
        .then((response) => response.text()) // adjusted this line to expect text response
        .then((data) => {
          console.log("Success:", data);
          // Here, 'data' will be the string message returned by your PHP script: "Email sent successfully!" or "Email sending failed."
          alert(data); // will alert the message from the server
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("There was a network error."); // This will catch network errors, if any
        });
    }
  }
});
