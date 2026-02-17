# PHP Cafe Management System

A simple PHP & MySQL cafe management system for learning / assignment purposes.

## About
Manage employees (karyawan), menu, customers (pelanggan), and transactions (transaksi) with basic CRUD operations.

## Database Template
SQL template: `cafe/assets/template.sql`

### Import to phpMyAdmin
1. Open `http://localhost/phpmyadmin`
2. Create a new database, e.g., `cafe`
3. Select the database → **Import**
4. Choose `cafe/assets/template.sql`
5. Click **Go**

## Running the Project
1. Copy the project folder to `htdocs` (XAMPP) or your server folder.
2. Start Apache & MySQL.
3. Configure database in `config.php`:
```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cafe";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>
4. Open browser: http://localhost/cafe
