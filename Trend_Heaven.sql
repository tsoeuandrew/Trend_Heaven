-- Active: 1788179847122@@127.0.0.1@3306@trend_heaven
use Trend_Heaven;
 CREATE TABLE if NOT exists Admins (
            AdminID VARCHAR(13) NOT NULL UNIQUE PRIMARY KEY,
            Name varchar(50) NOT NULL,
            Surname varchar(50) NOT NULL,
            Gender  VARCHAR(20) NOT NULL,
            Date_of_Birth DATE NOT NULL,
            Address VARCHAR(128) NOT NULL,
            Username VARCHAR(50) NOT NULL,
            Email VARCHAR(50) NOT NULL,
            Mobile_Number VARCHAR (10) NOT NULL,
            Password VARCHAR (64) NOT NULL
 );
 CREATE TABLE if NOT exists Customers (
            CustomerID VARCHAR (13) NOT NULL UNIQUE PRIMARY KEY,
            Name VARCHAR(50) NOT NULL,
            Surname VARCHAR(50) NOT NULL,
            Gender  VARCHAR(20) NOT NULL,
            Date_of_Birth DATE NOT NULL,
            Address VARCHAR(128)NOT NULL,
            Username VARCHAR(50) NOT NULL,
            Email VARCHAR(50) NOT NULL,
            Mobile_Number VARCHAR (10) NOT NULL,
            Password VARCHAR (64) NOT NULL
 );  

 CREATE TABLE if NOT exists Products ( 
            ProductID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(50) NOT NULL,
            Category VARCHAR(50)  NOT NULL, 
            Product_Type VARCHAR(50)  NOT NULL,
            Price DECIMAL NOT NULL,
            Size VARCHAR(20) NOT NULL,
            Colour VARCHAR(30) NOT NULL,
            Stock INT NOT NULL,
            Description TEXT NOT NULL,
            Product_Image VARCHAR(255) NOT NULL
 );  
 
   CREATE TABLE if NOT exists Orders (
            Name VARCHAR(50) NOT NULL,
            CustomerID VARCHAR(13) NOT NULL,
            ProductID int NOT NULL,
            OrderID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Order_Date DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
            FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
 ); 
