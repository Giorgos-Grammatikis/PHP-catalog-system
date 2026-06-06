# PHP Catalog System

A PHP/MySQL web application built as a university assignment for the **Web Application Technologies** course at the National and Kapodistrian University of Athens (DIND).

## Features
- User authentication with lockout system (blocks user after 3 failed attempts for 30 seconds)
- Search authors and books by multiple fields
- Insert new records into the database
- JavaScript form validation

## Technologies Used
- PHP
- MySQL
- JavaScript
- HTML

## How to Run

**Requirements:** XAMPP installed on your machine.

**Project Setup:** Move the project folder into the XAMPP server directory: `xampp/htdocs/`.

**Database Setup:**
- Open XAMPP Control Panel and start **Apache** and **MySQL**
- Go to `http://localhost/phpmyadmin/`
- Create two databases named `web_development` and `web_development_login`
- Import the corresponding `.sql` files provided in this repository

**Execution:** Open your browser and navigate to:
`http://localhost/php-catalog-system/LoginForm.html`

**Configure Credentials:** Open `process_login.php`, `process_action.php`, `select_action.php`, and `search_results.php`. Change the `$user` and `$password` variables to match your local MySQL credentials (default XAMPP: `root` and `""`).

## Notes
SQL injection prevention was not part of the assignment requirements.
In a production environment, prepared statements would be implemented for security.

## About
Developed by George Grammatikis as part of the Web Application Technologies course — EKPA DIND, 6th Semester, 2026.
