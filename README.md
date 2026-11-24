# Employee Information System

A simple PHP and MySQL web application for managing employee records. Users can add, view, search, update, and delete employees.

## Group Information

- **Section:** 3H-A CITCS

## Members and Responsibilities

| Member | Name | Responsibility |
|---|---|---|
| Member 1 | Janelle Yoanna S. Villanueva  | CREATE: add new employees |
| Member 2 | Katelynne Anne G. Salapong | READ: display and search employees (index.php), database connection (db.php), database setup (setup.sql) |
| Member 3 | Mary Nicole Tibayan | UPDATE: edit employee records (edit.php) |
| Member 4 | Xandra Gwen T. Ranchez| DELETE and integration: delete employees (delete.php), testing, and combining the application |

## Technologies Used

- PHP (with PDO for database access)
- MySQL
- XAMPP (Apache and MySQL)
- phpMyAdmin
- HTML, CSS, and Bootstrap
- Git and GitHub

## Database Installation

1. Open the **XAMPP Control Panel** and start **Apache** and **MySQL**.
2. Go to `http://localhost/phpmyadmin` in your browser.
3. Click the **SQL** tab.
4. Open `setup.sql` from this repository, copy all of its contents, paste them into the SQL box, and click **Go**.
5. This creates the `employee_db` database with an `employees` table and sample records.

## How to Run the Application

1. Download or clone this repository into the XAMPP `htdocs` folder and name the folder `php-crud`.
   - Windows: `C:\xampp\htdocs\php-crud`
   - Mac: `/Applications/XAMPP/htdocs/php-crud`
2. Make sure Apache and MySQL are running in XAMPP.
3. Open `http://localhost/php-crud/index.php` in your browser.
4. Use the page to add, view, search, edit, and delete employees.

## GitHub Repository

https://github.com/Hughnyel/PHP-CRUD-Application-Development
