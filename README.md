# Web Technology Lab - Assignment 04

## AJAX & PHP

This repository contains the implementation of **Assignment 04: AJAX &
PHP**.

The assignment demonstrates client-server communication using:

-   HTML
-   CSS
-   JavaScript
-   AJAX / Fetch API
-   PHP
-   MySQL
-   JSON

------------------------------------------------------------------------

## 1. Assignment Overview

The assignment contains the following problems:

1.  Hello PHP
2.  Generate grade from marks
3.  Display odd numbers from 1 to N
4.  Arrays
    -   Sort N numbers
    -   Display N animal names
5.  HTML form with server-side feedback
6.  Display animal images using a PHP array and AJAX
7.  Connect a database to the application using AJAX
8.  Extend the grade problem with total, average, grade and subject-wise
    marks

For **Q7 and Q8**, a single **Student Result Management System** has
been developed.

------------------------------------------------------------------------

## 2. Technologies Used

  Technology   Purpose
  ------------ ------------------------------
  HTML         Page structure
  CSS          Styling
  JavaScript   Client-side logic and AJAX
  PHP          Server-side processing
  MySQL        Database
  Fetch API    AJAX communication
  JSON         Client-server data exchange
  XAMPP        Apache/PHP local environment

------------------------------------------------------------------------

## 3. Project Structure

The `Assignment04` folder contains files similar to:

``` text
Assignment04/
│
├── prob1.php
├── prob2.php
├── prob3.php
├── prob4_1.php
├── prob4_2.php
│
├── prob5.html
├── prob5.php
│
├── prob6.html
├── prob6.php
│
├── student_result.html
├── student_result.css
├── student_result.js
├── student_result.php
├── student_result.sql
│
└── images/
    ├── bear.jpg
    ├── crocodile.jpg
    ├── deer.jpg
    ├── dolphin.jpg
    ├── eagle.jpg
    ├── elephant.jpg
    ├── fox.jpg
    ├── giraffe.jpg
    ├── horse.jpg
    ├── kangaroo.jpg
    ├── lion.jpg
    ├── panda.jpg
    ├── parrot.jpg
    ├── penguin.jpg
    ├── rabbit.jpg
    ├── shark.jpg
    ├── tiger.jpg
    ├── turtle.jpg
    ├── wolf.jpg
    └── zebra.jpg
```

------------------------------------------------------------------------

# 4. Running the Assignment Locally

## Step 1: Install the Required Software

The following are required:

-   XAMPP
-   PHP
-   MySQL Server
-   A web browser
-   VS Code (optional, for editing)

XAMPP is used to run the Apache web server.

The database can be run using either a standalone MySQL Server
installation or another MySQL-compatible server.

------------------------------------------------------------------------

## Step 2: Copy the Project to XAMPP

Copy the complete `Assignment04` folder into the XAMPP `htdocs`
directory.

Example:

``` text
C:\xampp\htdocs\Btech_5thSem_WebTech_LabAssignments\Assignment04
```

The PHP files must be inside the `htdocs` directory because Apache
serves files from there.

------------------------------------------------------------------------

## Step 3: Start Apache

Open **XAMPP Control Panel**.

Start:

``` text
Apache
```

Apache should show a running status.

### Important

The MySQL database server does **not necessarily need to be started from
XAMPP**.

If a standalone MySQL Server is already running on port `3306`, XAMPP
may display:

``` text
Port 3306 in use
```

This means another MySQL server is already using that port.

In that case, do not start the XAMPP MySQL module if the required MySQL
Server is already running.

------------------------------------------------------------------------

# 5. Database Setup

## Step 1: Make Sure MySQL Server Is Running

Open Command Prompt or PowerShell.

Check the MySQL installation:

``` powershell
mysql --version
```

Example:

``` text
mysql  Ver 8.0.46 ...
```

Login:

``` powershell
mysql -u root -p
```

Enter the password configured for the local MySQL server.

------------------------------------------------------------------------

## Step 2: Create the Database

The repository contains:

``` text
student_result.sql
```

This file creates the required database and table.

You can execute it using MySQL, MySQL Workbench, or another MySQL
client.

From the MySQL command line:

``` sql
SOURCE path/to/student_result.sql;
```

Or open `student_result.sql` in MySQL Workbench and execute it.

The script creates:

``` text
Database:
5thSemWebTechLab

Table:
students_res
```

------------------------------------------------------------------------

## Step 3: Database Structure

The table contains:

  Field         Type           Description
  ------------- -------------- --------------
  roll_no       VARCHAR(20)    Primary key
  name          VARCHAR(100)   Student name
  mathematics   INT            Marks
  physics       INT            Marks
  programming   INT            Marks
  electronics   INT            Marks

The database does not store total, average or grade.

These values are calculated by PHP when required.

------------------------------------------------------------------------

## Step 4: Check the Database

After executing the SQL file:

``` sql
USE 5thSemWebTechLab;

SELECT * FROM students_res;
```

The sample records should be displayed.

------------------------------------------------------------------------

# 6. Configure the PHP Database Connection

Open:

``` text
student_result.php
```

At the beginning of the file, configure the database connection:

``` php
$host = "localhost";
$username = "root";
$password = "YOUR_MYSQL_PASSWORD";
$database = "5thSemWebTechLab";
```

Replace:

``` text
YOUR_MYSQL_PASSWORD
```

with the password of the local MySQL user.

### Important

Do **not** upload your actual database password to GitHub.

The password is specific to the local MySQL installation.

For another computer, the person running the project should use their
own MySQL credentials.

------------------------------------------------------------------------

# 7. Run the Student Result Management System

After Apache and MySQL are running, open:

``` text
http://localhost/Btech_5thSem_WebTech_LabAssignments/Assignment04/student_result.html
```

The application provides three operations:

### 1. Add Student

Enter:

-   Roll number
-   Student name
-   Mathematics marks
-   Physics marks
-   Programming marks
-   Electronics marks

Click:

``` text
Add Student
```

The JavaScript sends the data to PHP using AJAX.

PHP validates the data and inserts the student into MySQL.

------------------------------------------------------------------------

### 2. Search Student

Enter a roll number, for example:

``` text
CST001
```

Click:

``` text
Search Student
```

The application displays:

-   Student name
-   Roll number
-   Subject-wise marks
-   Total
-   Average
-   Grade

------------------------------------------------------------------------

### 3. View All Students

Click:

``` text
View All Students
```

The application retrieves all students from the database and displays:

-   Roll number
-   Name
-   Mathematics
-   Physics
-   Programming
-   Electronics
-   Total
-   Average
-   Grade

The table supports horizontal scrolling when the available screen width
is smaller than the table width.

------------------------------------------------------------------------

# 8. Q8 Calculation

For every student, PHP creates a subject-wise associative array:

``` php
$marks = [
    "Mathematics" => $student["mathematics"],
    "Physics" => $student["physics"],
    "Programming" => $student["programming"],
    "Electronics" => $student["electronics"]
];
```

The total is calculated using:

``` php
$total = array_sum($marks);
```

The average is calculated using:

``` php
$average = $total / count($marks);
```

The grade is calculated from the average.

The grading scheme used is:

         Average Grade
  -------------- -------
    90 and above A+
      80 - 89.99 A
      70 - 79.99 B
      60 - 69.99 C
      40 - 59.99 D
        Below 40 F

------------------------------------------------------------------------

# 9. AJAX Communication Flow

The Student Result Management System uses the following flow:

``` text
HTML
  ↓
JavaScript
  ↓
Fetch API / AJAX
  ↓
student_result.php
  ↓
MySQL
  ↓
PHP processing
  ↓
JSON response
  ↓
JavaScript
  ↓
HTML DOM
```

The JavaScript sends an `action` value to the PHP backend:

``` text
add
search
view_all
```

PHP uses this value to determine which operation should be performed.

------------------------------------------------------------------------

# 10. Important Notes for Running on Another Computer

The GitHub repository contains the source code and the SQL file, but the
MySQL server itself is local to each computer.

Therefore, another user should:

1.  Clone/download the repository.
2.  Install XAMPP and MySQL.
3.  Copy the project into `htdocs`.
4.  Start Apache.
5.  Start or connect to their MySQL Server.
6.  Execute `student_result.sql`.
7.  Configure their own MySQL password in `student_result.php`.
8.  Open the application through the localhost URL.

The database password should never be taken from the repository.

------------------------------------------------------------------------

# 11. Troubleshooting

## `mysql is not recognized`

Add the MySQL `bin` directory to the Windows PATH.

For a standard MySQL Server 8.0 installation, the path is commonly:

``` text
C:\Program Files\MySQL\MySQL Server 8.0\bin
```

After changing PATH, open a new terminal and run:

``` powershell
mysql --version
```

------------------------------------------------------------------------

## XAMPP MySQL shows "Port 3306 in use"

This usually means another MySQL server is already running on port
`3306`.

Check which MySQL server is being used before changing any ports.

If the required standalone MySQL Server is already running, XAMPP's
MySQL module does not need to be started.

------------------------------------------------------------------------

## Database connection failed

Check:

``` text
Host
Username
Password
Database name
MySQL server status
```

The database name should be:

``` text
5thSemWebTechLab
```

------------------------------------------------------------------------

## Page does not open

Make sure:

-   Apache is running.
-   The project is inside `xampp\htdocs`.
-   The URL is correct.

Use:

``` text
http://localhost/Btech_5thSem_WebTech_LabAssignments/Assignment04/student_result.html
```

------------------------------------------------------------------------

# 12. Author

**Arpan Senapati**

Web Technology Lab - Assignment 04
