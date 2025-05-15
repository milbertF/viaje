# Viaje  
## An Automated Notification Mobile Application for Commuters of Zamboanga City

Viaje is an automated notification web app designed to improve commuting in Zamboanga City by offering reliable bookings, real-time updates and enhanced safety. After gathering requirements through stakeholder interviews and market research, we’ll build key modules—user registration, booking, notifications, safety alerts and payments—using Agile sprints for rapid iteration. Beta testing and pilot feedback will guide refinements until launch. By tackling unpredictable wait times, driver transparency and emergency communication gaps, Viaje will make daily travel predictable, transparent and secure.

---

### People Behind Viaje

- [Falcasantos, Milbert](https://github.com/milbertF)  
- [Gabotero, Rogie]()  
- [Valdez, Franz Nathaniel]()

---

### How to Get Started

#### Steps to Run the Viaje Web Admin Locally

1. **Start XAMPP**  
   - Open the **XAMPP Control Panel**.  
   - Ensure **Apache** and **MySQL** are both **Running**.

2. **Import the Database**  
   - Open **phpMyAdmin** (usually at `http://localhost/phpmyadmin`).  
   - Click **Import**, choose your `.sql` dump file, and import it into a new or existing database.

3. **Configure the Database Connection**  
   - Open:
     ```bash
     capstone2.7/php/dbConnection.php
     ```
   - Locate the line:
     ```php
     $dbname = 'YOUR_DATABASE_NAME';
     ```
   - Replace `'YOUR_DATABASE_NAME'` with the name of the database you just imported.  
   - Save the file.

4. **Deploy the Project Files**  
   - Copy the entire `capstone2.7` folder into XAMPP’s `htdocs` directory:
     ```text
     C:\xampp\htdocs\capstone2.7
     ```

5. **Access the Admin Login Page**  
   - In your browser, go to:
     ```url
     http://localhost/capstone2.7/template/loginPage/index.php
     ```

6. **Log In as Admin**  
   - **Email:** `milbert@gmail.com`  
   - **Password:** `123`  
   - Click **Login**. You will be redirected to the admin dashboard, showing monthly vehicle reports.

7. **Register a Rider**  
   - Open the rider registration form in your browser:
     ```url
     http://localhost/capstone2.7/template/fillupForm/userfillupcopy.php
     ```
   - Fill out the form and submit to add a new rider to Viaje.

> **Tip:** If you encounter any “database connection” errors, double-check your `$dbname`, host (`localhost`), username (`root`), and password (often blank by default) in `dbConnection.php`.  
