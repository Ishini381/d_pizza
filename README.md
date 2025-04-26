# d_pizza
online order system

# diamond_pizza
dynamic web page for diamond pizza shop

Project SetUp

👉 Download the zip file

👉 Extract the file and copy foodsite folder

Paste inside root directory

    * For xampp xampp/htdocs 
    * For wamp wamp/www
    * For lamp var/www/html

![Screenshot (1634)](https://github.com/user-attachments/assets/756e01b9-e7e0-4cfe-ad2b-14d9387bd4e1)


✅ 1. How to Import the Database in phpMyAdmin

👉1.Open phpMyAdmin 

* Start XAMPP or WAMP
* Open PHPMyAdmin (http://localhost/phpmyadmin)

👉 2. Create a database with name pizza

•	Click "New" in the left sidebar.
•	Enter the database name as pizza (or the name used in your constants.php).
•	Click Create.


![Screenshot (1632)](https://github.com/user-attachments/assets/53b66ed4-3890-42ec-aff0-d34427dd945f)

👉 3. Import .sql File

•	With the new pizza database selected, click the "Import" tab at the top.
•	Click Choose File, and select your .sql file (e.g., pizza.sql).
•	Click Go.

![Screenshot (1633)](https://github.com/user-attachments/assets/1947a79b-07d7-4724-912f-f7b7e060543c)


✅ 2. How to Run the Project Using XAMPP/WAMP on Another Laptop

🔁 Pre-requisites:
•	You need:
    o	The entire project folder (with HTML, PHP, CSS, JS, images, and the .sql file).
    o	XAMPP or WAMP installed on the other laptop.

✅ Step-by-Step Instructions:

Step 1: Install XAMPP/WAMP
•	Download from:

      o	XAMPP: https://www.apachefriends.org
      o	WAMP: https://www.wampserver.com

      
Step 2: Place Your Project in the Right Directory


•	For XAMPP, copy your entire project folder (e.g., foodsite) to:
C:\xampp\htdocs\

•	For WAMP, copy it to:
C:\wamp64\www\


Step 3: Start Server

•	Open XAMPP Control Panel → Start Apache and MySQL
•	(WAMP: Start WAMP and make sure the tray icon turns green)


Step 4: Set Up the Database

•	Go to: http://localhost/phpmyadmin
•	Follow the import steps 


Step 5: Check Database Credentials

Open your constants.php and ensure these match the current setup:

define('SITEURL', 'http://localhost/foodsite/');

define('LOCALHOST', 'localhost');

define('DB_PORT', 3306); // Default for XAMPP/WAMP is 3306 (change from 3307 if needed)

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');

define('DB_NAME', 'pizza');

🔁 If you used port 3307 before (like in Laragon), change to 3306 if you're now using XAMPP/WAMP.



👉 Run the script

* For User Panel: http://localhost/foodsite/

* For admin panel: http://localhost/foodsite/admin/



About ---
An online pizza ordering system can be defined as software that allows restaurant businesses to accept and manage orders placed over the internet.







