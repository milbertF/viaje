class MainSidemenu extends HTMLElement {
  async connectedCallback() {
    const userRole = this.getAttribute("user-role"); // Get the user role passed as an attribute

    // Conditionally display the Admin Accounts section based on the role
    this.innerHTML = `
            <div class="sidemenu">
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
        `;
  }
}

customElements.define("main-sidemenu", MainSidemenu);
