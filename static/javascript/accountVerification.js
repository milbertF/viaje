function openSetPassword2(riderId) {
  console.log("Selected Rider ID:", riderId);
  currentRiderId = riderId;

  fetch(`../../php/fetch_rider_details.php?rider_id=${currentRiderId}`)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      if (!data) {
        alert("No data found for the selected rider.");
        return;
      }

      const lastName = data.last_name ?? "";
      const plateNumber = data.vehicle_plate_no ?? "";
      const modelYear = data.model_year ?? "";

      const generatedPassword = `${lastName}${plateNumber.slice(-4) || "0000"}${
        modelYear || "0000"
      }`;

      const passwordField = document.querySelector(
        "#setPassword input[name='generatedPassword']"
      );
      const confirmPasswordField = document.querySelector(
        "#setPassword input[name='confirmPassword']"
      );
      passwordField.value = generatedPassword;
      confirmPasswordField.value = "";

      const setPassword = document.getElementById("setPassword");
      setPassword.style.display = "flex";
    })
    .catch((error) => {
      console.error(
        "Error fetching rider details for password generation:",
        error
      );
      alert(
        "An error occurred while generating the password. Please try again."
      );
    });
}

function showLoading(message = "Processing, please wait...") {
  const loadingIndicator = document.getElementById("loadingIndicator");
  const loadingMessage = document.getElementById("loadingMessage");
  const loadingSpinner = document.getElementById("loadingSpinner");

  loadingMessage.textContent = message;
  loadingSpinner.style.display = "block";
  loadingIndicator.style.display = "flex";
}

function hideLoading() {
  const loadingIndicator = document.getElementById("loadingIndicator");
  loadingIndicator.style.display = "none";

  const setPassword = document.getElementById("setPassword");
  setPassword.style.display = "none";

  const add = document.getElementById("add-Account-Container");
  add.style.display = "none";
}

function updateLoadingMessage(message, hideSpinner = false) {
  const loadingMessage = document.getElementById("loadingMessage");
  const loadingSpinner = document.getElementById("loadingSpinner");

  loadingMessage.textContent = message;
  if (hideSpinner) {
    loadingSpinner.style.display = "none";
  }
}

function confirmPassword() {
  const passwordField = document.querySelector(
    "#setPassword input[name='generatedPassword']"
  ).value;
  const confirmPasswordField = document.querySelector(
    "#setPassword input[name='confirmPassword']"
  ).value;

  if (passwordField !== confirmPasswordField) {
    alert("Passwords do not match. Please try again.");
    return;
  }

  showLoading();

  fetch("../../php/update_rider_status.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      rider_id: currentRiderId,
      status: "Approved",
      password: passwordField,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        updateLoadingMessage(
          "Success! The rider's password has been sent to their email, and the status has been updated.",
          true
        );
        setTimeout(() => location.reload(), 2000);
      } else {
        updateLoadingMessage(`Error: ${data.message}`, true);
      }
    })
    .catch((error) => {
      updateLoadingMessage("An error occurred. Please try again.", true);
      console.error("Error:", error);
    });
}

function closeSetPassword() {
  const setPassword = document.getElementById("setPassword");
  setPassword.style.display = "none";
}

function updateStatus(riderId, status, password = null) {
  fetch("../../php/update_rider_status.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      rider_id: riderId,
      status: status,
      password: password,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        location.reload();
      } else {
      }
    })
    .catch((error) => {
      console.error("Error updating status:", error);
    });
}

function toggleAllPasswords() {
  const showPassword = document.getElementById("showPasswordCheckbox").checked;
  const passwordFields = document.querySelectorAll(
    "#setPassword input[type='password'], #setPassword input[type='text']"
  );

  passwordFields.forEach((field) => {
    if (
      field.name === "generatedPassword" ||
      field.name === "confirmPassword"
    ) {
      field.type = showPassword ? "text" : "password";
    }
  });
}
