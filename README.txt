md "folder_name"      -  create folder
notepad "file_name"   -  create file
cd "name"             -  change directory
cd ..                 -  back directory
del "file_name"       -  delete file
C:\xampp\htdocs\      -  place your folder here


// browser:
http://localhost/phpmyadmin/ - access to database

http://localhost/your_folder_name/your_file_name - open your file in browser 


// MySQL Shell Commands:
mysql -u root               -  Login to MySQL first before hitting any commands
mysql -u root -p            -  with '-p' if your MySQL has password

SHOW DATABASES;             -  Show databases
USE your_database_name;     -  Use a database
SHOW TABLES;                -  Show tables
DESCRIBE your_table_name;   -  Describe a table
CREATE DATABASE db_name;     -  Create a new database
EXIT;                       -  Exit the shell

---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE                 -  edit/update/delete table
ex: 
- ALTER TABLE users ADD full_name VARCHAR(255) AFTER id;  (Add Column)
- ALTER TABLE users DROP COLUMN username;                 (Delete Coulmn)
---------------------------------------------------------------------------------------------------------------------------------------------
DELETE table_name          - delete records 
ex:
- DELETE FROM table_name;                                 (Deletes all record)
- DELETE FROM Customers;                                  (Deletes all rows in the "Customers" table)
- DELETE FROM Customers WHERE CustomerName='ari grande';  (Deletes specific customer)
