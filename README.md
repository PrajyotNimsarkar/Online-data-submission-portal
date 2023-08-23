# Online-data-submission-portal
The webpage consists of a submission form wherein required details are to be submitted by the user, then the details are stored in MYSQL database which is configured in the backend. The resources are hosted on cloud platform. This can be internally used by any organization to maintain records of there employees, students, etc.

Execute commands step by step as followed:

Launch a EC2 instance (Ubuntu 20.04)
Launch a RDS MySQL databases with customized configurations and connect above EC2 instance to it

Connect to instance with putty 


------------------------------- Commands ---------------------------------------------------------------------------------

sudo apt update

sudo apt install apache2

sudo apt install mysql-client

sudo apt install php

sudo apt-get install php-mysqli

cd /var/www/html

sudo chmod 777 index.html

sudo nano index.html         ------------(Clear the existing HTML code and replace it with our code)


------------------------------- MySQL connection -------------------------------------------------------------------------

mysql -h 'endpoint' -P 3306 -u 'username' -p 'password'

show databases;

use 'DB name';

create table 'table name' (Emp_ID int(20), Name varchar(50), Age int(20), Gender varchar(50), City varchar(50), Project varchar(50));



---------------------------- Create all PHP connection files -------------------------------------------------------------

sudo nano submit.php        ------------(paste our PHP code with current RDS endpoint, Username, Password, DB name )

sudo nano getdetails.php

sudo nano update.php

sudo nano delete.php

sudo service apache2 restart

Visit webpage it should be up and running





