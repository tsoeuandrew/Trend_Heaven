CREATE DATABASE IF NOT EXISTS Trend_Heaven;
USE Trend_Heaven;

CREATE TABLE IF NOT EXISTS Admins (
    AdminID VARCHAR(13) NOT NULL PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Surname VARCHAR(50) NOT NULL,
    Gender VARCHAR(20) NOT NULL,
    Date_of_Birth DATE NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Mobile_Number VARCHAR(15) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Created_At DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Customers (
    CustomerID VARCHAR(13) NOT NULL PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Surname VARCHAR(50) NOT NULL,
    Gender VARCHAR(20) NOT NULL,
    Date_of_Birth DATE NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Mobile_Number VARCHAR(15) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Created_At DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(150) NOT NULL,
    Category VARCHAR(50) NOT NULL,
    Product_Type VARCHAR(50) NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    Description TEXT,
    Status ENUM('Draft', 'Published', 'Archived')
        DEFAULT 'Draft',
    Created_At DATETIME DEFAULT CURRENT_TIMESTAMP,
    Updated_At DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_category (Category),
    INDEX idx_product_type (Product_Type),
    INDEX idx_status (Status)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Product_Variants (
    VariantID INT AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    Colour VARCHAR(50) NOT NULL DEFAULT 'Default',
    Size VARCHAR(30) NOT NULL DEFAULT 'One Size',
    Stock INT UNSIGNED NOT NULL DEFAULT 0,
    SKU VARCHAR(100) NOT NULL UNIQUE,
    Price DECIMAL(10,2) NULL,
    Created_At DATETIME DEFAULT CURRENT_TIMESTAMP,
    Updated_At DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_variant_product
        FOREIGN KEY (ProductID) REFERENCES Products(ProductID) DELETE CASCADE,
    UNIQUE KEY unique_variant (ProductID, Colour, Size),
    INDEX idx_variant_product (ProductID),
    INDEX idx_variant_stock (Stock)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS product_images (
    ImageID INT AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    VariantID INT NULL,
    Image_path VARCHAR(255) NOT NULL,
    is_main TINYINT(1) DEFAULT 0,
    sort_order INT DEFAULT 0,
    Created_At DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_image_product
        FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE,
    CONSTRAINT fk_image_variant
        FOREIGN KEY (VariantID) REFERENCES Product_Variants(VariantID) ON DELETE CASCADE,
    INDEX idx_image_product (ProductID),
    INDEX idx_image_variant (VariantID),
    INDEX idx_main_image (ProductID, is_main)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID VARCHAR(13) NOT NULL,
    Order_Date DATETIME DEFAULT CURRENT_TIMESTAMP,
    Status ENUM(
        'Pending',
        'Processing',
        'Shipped',
        'Delivered',
        'Cancelled'
    ) DEFAULT 'Pending',
    Total_Amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    Shipping_Address VARCHAR(255) NOT NULL,
    CONSTRAINT fk_order_customer
        FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID) ON DELETE RESTRICT,
    INDEX idx_order_customer (CustomerID),
    INDEX idx_order_status (Status),
    INDEX idx_order_date (Order_Date)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Order_Items (
    OrderItemID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT NOT NULL,
    VariantID INT NOT NULL,
    Quantity INT UNSIGNED NOT NULL,
    Unit_Price DECIMAL(10,2) NOT NULL,
    Product_Name VARCHAR(150) NOT NULL,
    Colour VARCHAR(50) NOT NULL,
    Size VARCHAR(30) NOT NULL,
    CONSTRAINT fk_order_item_order
        FOREIGN KEY (OrderID) REFERENCES Orders(OrderID) ON DELETE CASCADE,
    CONSTRAINT fk_order_item_variant
        FOREIGN KEY (VariantID) REFERENCES Product_Variants(VariantID) ON DELETE RESTRICT,
    INDEX idx_order_item_order (OrderID),
    INDEX idx_order_item_variant (VariantID)
) ENGINE=InnoDB;