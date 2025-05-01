// redirect
function redirect(page) {
  window.location.href = page;
}

// prevent "e" in input type number
document.addEventListener("DOMContentLoaded", function () {
  const numberInputs = document.querySelectorAll('input[type="number"]');

  numberInputs.forEach(function (input) {
    input.addEventListener("keydown", function (event) {
      if (event.key === "e" || event.key === "E") {
        event.preventDefault();
      }
    });
  });
});

function showLogout() {
  const logoutDiv = document.querySelector(".logout");
  logoutDiv.style.display =
    logoutDiv.style.display === "none" ? "block" : "none";
}

function logout() {
  // Assuming you have a PHP logout script
  window.location.href = "../../php/logout.php";
}

// upload image in account
function previewImage(event) {
  const input = event.target;
  const reader = new FileReader();
  reader.onload = function () {
    const img = document.getElementById("uploadedImage");
    img.src = reader.result;
  };
  reader.readAsDataURL(input.files[0]);
}

function previewImageAdd(event) {
  const input = event.target;
  const reader = new FileReader();
  reader.onload = function () {
    const img = document.getElementById("uploadedImageAdd");
    img.src = reader.result;
  };
  reader.readAsDataURL(input.files[0]);
}

// adminAccounts.php
// open add accounts
function openAddAccounts() {
  const add = document.getElementById("add-Account-Container");
  add.style.display = "flex";
}
function closeAddAccounts() {
  const add = document.getElementById("add-Account-Container");
  add.style.display = "none";
}
// open edit accounts
function openEditAccounts() {
  const add = document.getElementById("edit-Account-Container");
  add.style.display = "flex";
}
function closeEditAccounts() {
  const add = document.getElementById("edit-Account-Container");
  add.style.display = "none";
}
// adminAccounts.php

// open view accounts accountVerification.html

function openView(button) {
  const riderId = button.getAttribute("data-id");
  // const viewContainer = document.getElementById("add-Account-Container");

  // // Store the riderId in a data attribute for later reference
  // viewContainer.setAttribute("data-rider-id", riderId);

  // // viewContainer.style.display = "flex";

  // const inputs = viewContainer.querySelectorAll("input");
  // inputs.forEach((input) => (input.value = ""));
  // const images = viewContainer.querySelectorAll("img");
  // images.forEach(
  //   (img) => (img.src = "../static/images/logo/landscape-placeholder.svg")
  // );

  // Fetch and populate rider data
  fetch(`../../php/fetch_rider_details.php?rider_id=${riderId}`)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      console.log("Fetched Rider Data:", data);

      // Populate the fields with the fetched data
      document.querySelector("[name='email']").value = data.email_address ?? "";
      document.querySelector("[name='firstName']").value =
        data.first_name ?? "";
      document.querySelector("[name='lastName']").value = data.last_name ?? "";
      document.querySelector("[name='middleName']").value =
        data.middle_initial ?? "";
      document.querySelector("[name='extensionName']").value =
        data.name_extension ?? "";
      document.querySelector("[name='gender']").value = data.gender ?? "";
      document.querySelector("[name='contactNo']").value =
        data.mobile_number ?? "";

      document.querySelector("[name='region']").value = data.region ?? "";
      document.querySelector("[name='province']").value = data.province ?? "";
      document.querySelector("[name='municipality']").value =
        data.municipality ?? "";
      document.querySelector("[name='barangay']").value = data.barangay ?? "";
      document.querySelector("[name='postalCode']").value =
        data.postal_code ?? "";
      document.querySelector("[name='street']").value = data.street ?? "";

      document.querySelector("[name='vehicleType']").value =
        data.vehicle_type ?? "";
      document.querySelector("[name='vehiclePlateNo']").value =
        data.vehicle_plate_no ?? "";
      document.querySelector("[name='vehicleMake']").value =
        data.vehicle_make ?? "";
      document.querySelector("[name='vehicleModel']").value =
        data.vehicle_model ?? "";
      document.querySelector("[name='vehicleModelYear']").value =
        data.model_year ?? "";
      document.querySelector("[name='vehicleColor']").value =
        data.vehicle_color ?? "";
      document.querySelector("[name='vehicleOwnership']").value =
        data.vehicle_ownership ?? "";

      if (data.license_picture && data.license_picture !== "") {
        document.querySelector(
          "#licenceplaceholder"
        ).src = `../${data.license_picture}`;
      }
      if (data.face_picture && data.face_picture !== "") {
        document.querySelector(
          "#faceplaceholder"
        ).src = `../${data.face_picture}`;
      }
    })
    .catch((error) => {
      console.error("Error fetching rider details:", error);
      // alert("Failed to fetch rider details.");
    });

  window.location.href = `riderDetails.php?rider_id=${riderId}`;
}

function closeAddAccounts() {
  const add = document.getElementById("add-Account-Container");
  add.style.display = "none";
}

function openEditRider() {
  const add = document.getElementById("add-Account-Container");
  const wrapManageRider = document.getElementById("wrapManageRider");
  const wrapManageUser = document.getElementById("wrapManageUser");
  add.style.display = "flex";
  wrapManageRider.style.display = "flex";
  wrapManageUser.style.display = "none";
}

function openEditUser() {
  const add = document.getElementById("add-Account-Container");
  const wrapManageRider = document.getElementById("wrapManageRider");
  const wrapManageUser = document.getElementById("wrapManageUser");
  add.style.display = "flex";
  wrapManageRider.style.display = "none";
  wrapManageUser.style.display = "flex";
}

function closeAddAccounts() {
  const add = document.getElementById("add-Account-Container");
  const wrapManageRider = document.getElementById("wrapManageRider");
  const wrapManageUser = document.getElementById("wrapManageUser");
  add.style.display = "none";
  wrapManageRider.style.display = "none";
  wrapManageUser.style.display = "none";
}

// open edit accounts accountManage.html
function openCalculate() {
  const add = document.getElementById("add-Account-Container");
  const wrapCalculate = document.getElementById("wrapCalculate");
  const wrapEditCar = document.getElementById("wrapEditCar");
  const wrapEditMotorcycle = document.getElementById("wrapEditMotorcycle");
  const wrapEditTricycle = document.getElementById("wrapEditTricycle");
  const wrapEditAutoRickshaw = document.getElementById("wrapEditAutoRickshaw");
  add.style.display = "flex";
  wrapCalculate.style.display = "flex";
  wrapEditCar.style.display = "none";
  wrapEditMotorcycle.style.display = "none";
  wrapEditTricycle.style.display = "none";
  wrapEditAutoRickshaw.style.display = "none";
}
function openEditFareCar() {
  const add = document.getElementById("add-Account-Container");
  const wrapCalculate = document.getElementById("wrapCalculate");
  const wrapEditCar = document.getElementById("wrapEditCar");
  const wrapEditMotorcycle = document.getElementById("wrapEditMotorcycle");
  const wrapEditTricycle = document.getElementById("wrapEditTricycle");
  const wrapEditAutoRickshaw = document.getElementById("wrapEditAutoRickshaw");
  add.style.display = "flex";
  wrapCalculate.style.display = "none";
  wrapEditCar.style.display = "flex";
  wrapEditMotorcycle.style.display = "none";
  wrapEditTricycle.style.display = "none";
  wrapEditAutoRickshaw.style.display = "none";
}
function openEditFareMotorcycle() {
  const add = document.getElementById("add-Account-Container");
  const wrapCalculate = document.getElementById("wrapCalculate");
  const wrapEditCar = document.getElementById("wrapEditCar");
  const wrapEditMotorcycle = document.getElementById("wrapEditMotorcycle");
  const wrapEditTricycle = document.getElementById("wrapEditTricycle");
  const wrapEditAutoRickshaw = document.getElementById("wrapEditAutoRickshaw");
  add.style.display = "flex";
  wrapCalculate.style.display = "none";
  wrapEditCar.style.display = "none";
  wrapEditMotorcycle.style.display = "flex";
  wrapEditTricycle.style.display = "none";
  wrapEditAutoRickshaw.style.display = "none";
}
function openEditFareTricycle() {
  const add = document.getElementById("add-Account-Container");
  const wrapCalculate = document.getElementById("wrapCalculate");
  const wrapEditCar = document.getElementById("wrapEditCar");
  const wrapEditMotorcycle = document.getElementById("wrapEditMotorcycle");
  const wrapEditTricycle = document.getElementById("wrapEditTricycle");
  const wrapEditAutoRickshaw = document.getElementById("wrapEditAutoRickshaw");
  add.style.display = "flex";
  wrapCalculate.style.display = "none";
  wrapEditCar.style.display = "none";
  wrapEditMotorcycle.style.display = "none";
  wrapEditTricycle.style.display = "flex";
  wrapEditAutoRickshaw.style.display = "none";
}
function openEditFareAutoRickshaw() {
  const add = document.getElementById("add-Account-Container");
  const wrapCalculate = document.getElementById("wrapCalculate");
  const wrapEditCar = document.getElementById("wrapEditCar");
  const wrapEditMotorcycle = document.getElementById("wrapEditMotorcycle");
  const wrapEditTricycle = document.getElementById("wrapEditTricycle");
  const wrapEditAutoRickshaw = document.getElementById("wrapEditAutoRickshaw");
  add.style.display = "flex";
  wrapCalculate.style.display = "none";
  wrapEditCar.style.display = "none";
  wrapEditMotorcycle.style.display = "none";
  wrapEditTricycle.style.display = "none";
  wrapEditAutoRickshaw.style.display = "flex";
}
function closeAddAccounts() {
  const add = document.getElementById("add-Account-Container");
  add.style.display = "none";
}

// responsive sidebar
function toggleSideMenu() {
  const sidebarCollapse = document.getElementById("sidebarCollapse");

  if (sidebarCollapse.style.display === "none") {
    sidebarCollapse.style.display = "block";
  } else {
    sidebarCollapse.style.display = "none";
  }
}

// Select all label elements inside .inpPart
document.querySelectorAll(".inpPart label").forEach(function (label) {
  label.addEventListener("click", function () {
    const inputSibling = label.nextElementSibling.querySelector("input");
    const selectSibling = label.nextElementSibling.querySelector("select");
    if (inputSibling) {
      inputSibling.focus();
    }
    if (selectSibling) {
      selectSibling.focus();
    }
  });
});
