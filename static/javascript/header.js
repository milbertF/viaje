class MainHeader extends HTMLElement {
  async connectedCallback() {
    const userRole = this.getAttribute("user-role");
    const profilePicture =
      this.getAttribute("profile-picture") ||
      "static/images/default-profile.png";
    this.innerHTML = `
            <div class="header">
                <div class="logo-header">
                    <div class="collapse">
                        <i class="fa-solid fa-bars" onclick="toggleSideMenu()"></i>
                        <div class="sidebarCollapse" id="sidebarCollapse" style="display: none;">
                            <div class="partSidenav">
                                <div class="rec">
                                    <p>Navigation</p>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </div>
                                <div class="side-nav" onclick="redirect('dashboard.php')">
                                    <div class="side-nav-icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <p>Dashboard</p>
                                </div>
                            </div>

                            <!-- Conditionally render Admin Accounts section if the user is Super Admin -->
                            ${
                              userRole === "Super Admin"
                                ? `
                                    <div class="partSidenav">
                                        <div class="rec">
                                            <p>Admin Accounts</p>
                                            <i class="fa-solid fa-chevron-up"></i>
                                        </div>
                                        <div class="side-nav" onclick="redirect('adminAccounts.php')">
                                            <div class="side-nav-icon">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </div>
                                            <p>Accounts</p>
                                        </div>
                                    </div>
                                `
                                : ""
                            }                            

                            <div class="partSidenav">
                                <div class="rec">
                                    <p>User Accounts</p>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </div>
                                <div class="side-nav" onclick="redirect('accountVerification.php')">
                                    <div class="side-nav-icon">
                                        <i class="fa-solid fa-user-check"></i>
                                    </div>
                                    <p>Rider Verification</p>
                                </div>
                                <div class="side-nav" onclick="redirect('accountManager.php')">
                                    <div class="side-nav-icon">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <p>Account Manager</p>
                                </div>

                                 <div class="side-nav" onclick="redirect('additionalVehicle.php')">
                                    <div class="side-nav-icon">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <p>Additional Vehicle</p>
                                </div>

                            </div>

                            <div class="partSidenav">
                                <div class="rec">
                                    <p>Set Fare Rate</p>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </div>
                                <div class="side-nav" onclick="redirect('fareRate.php')">
                                    <div class="side-nav-icon">
                                        <i class="fa-solid fa-ticket"></i>
                                    </div>
                                    <p>Fare Rate</p>
                                </div>
                            </div>

                            <div class="partSidenav">
                                <div class="rec">
                                    <p>Reportings</p>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </div>
                                <div class="side-nav" onclick="redirect('Report.php')">
                                    <div class="side-nav-icon">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                    <p>Report</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="../../static/images/logo/logoViaje.png" alt="">
                    <p>VIAJE</p>
                </div>

                <div class="nav-header">
                    <a href="aboutus.php">About</a>
                    <a href="#">Contact</a>
                    <div class="profile">
                    <div class="pp" onclick="showLogout()">
                        <!-- Use profile picture dynamically -->
                        <img src="${profilePicture}" alt="Profile Picture">
                    </div>
                    <div class="logout" style="display: none;">
                        <p onclick="logout()">Logout</p>
                    </div>
                    </div>
                </div>
            </div>
        `;
  }
}

customElements.define("main-header", MainHeader);
