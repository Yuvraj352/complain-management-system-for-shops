As this portal  contains all PHP files  so this portal can be opened in  PHP localhost or server 
I have used PHP and MySQL so tables created in mysql r are as follows you have to create them as it is
Queries to create them
* Create database cmp;
* Use cmp;
* Create table admin( fullName varchar(40) ,adminEmail varchar(40) , password  varchar(40) ,contactNo bigint(11));
* CREATE TABLE USERS( fullName varchar(40) NOT NULL,| userEmail  varchar(40) , password  varchar(40) , contactNo bigint(11)  , rollno varchar(10));
* CREATE TABLE COMPLAIN( name varchar(26)  NOT NULL,rollno varchar(8) NOT NULL, email varchar(40) NOT NULL, selection  int(11) NOT NULL, complains varchar(250), time datetime ,id int(3) PRIMARY KEY NOT NULL auto_increment , opt int(1),comment varchar(100) DEFAULT “add comment” ,status varchar(40)  DEFAULT “pending”);
* CREATE TABLE OTP_EXPIRY( otT int(10),| is_expired int(1),created_at  datetime,| userEmail varchar(40) NOT NULL);
* CREATE TABLE SHOPS(id int(2) PRIMARY KEY NOT NULL auto_increment, ShopName varchar(40),ownerName  varchar(40) , email varchar(50)  UNIQUE);
* CREATE TABLE shopowner(ownerName varchar(40), ownerEmail  varchar(40), password varchar(40), contactNo bigint(11), ShopName varchar(40));