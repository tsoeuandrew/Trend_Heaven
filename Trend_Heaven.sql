-- Active: 1788179847122@@127.0.0.1@3306@trend_heaven
CREATE DATABASE if NOT exists Trend_Heaven;
use Trend_Heaven;
 CREATE TABLE if NOT exists Customers (
            CustomerID int NOT NULL auto_increment PRIMARY KEY,
            Name varchar(50) NOT NULL,
            Surname varchar(50) NOT NULL
 ); 
  CREATE TABLE if NOT exists Orders (
            ProductID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(50) NOT NULL 
 );  

 CREATE TABLE if NOT exists Products ( 
            ProductID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(50) NOT NULL, 
            Type VARCHAR(50)  NOT NULL,
            Category VARCHAR(50)  NOT NULL,
            Price DECIMAL NOT NULL,
            Size VARCHAR(20) NOT NULL,
            Colour VARCHAR(30) NOT NULL,
            Stock INT NOT NULL,
            Description TEXT NOT NULL,
            Image VARCHAR(255) NOT NULL
 );  
