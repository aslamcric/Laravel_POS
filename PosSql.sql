CREATE DATABASE laravel_pos;
USE laravel_pos;

-- -------------------------------
-- All Tables Name is here
-- -------------------------------
-- users
-- roles
-- categories
-- manufacturers
-- products
-- adjustment_type
-- customers
-- orders
-- order_details
-- purchases
-- purchases_details
-- status
-- stock
-- stock_adjustment
-- stock_adjustment_details
-- suppliers
-- transaction_type
-- uom
-- warehouse

-- -------------------------------
-- Master Tables
-- -------------------------------

-- Users Table (For login and authorization)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) UNIQUE,
    role_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Roles Table
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Manufacturers Table
CREATE TABLE manufacturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(20) UNIQUE,
    email VARCHAR(50) UNIQUE,
    address VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- UOM (Unit of Measurement) Table
CREATE TABLE uoms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Status Table (For orders, purchases, etc.)
CREATE TABLE status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `payment_statuses` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Warehouse Table
CREATE TABLE warehouse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(20) UNIQUE,
    location VARCHAR(200),
    address VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Suppliers Table
CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    photo VARCHAR(100),
    phone VARCHAR(20) UNIQUE,
    email VARCHAR(30) UNIQUE,
    address VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Customers Table
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    photo VARCHAR(100),
    phone VARCHAR(20) UNIQUE,
    email VARCHAR(30) UNIQUE,
    address VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- -------------------------------
-- Transactional Tables
-- -------------------------------

-- Products Table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    photo VARCHAR(100),
    price DOUBLE NOT NULL,
    offer_price DOUBLE DEFAULT NULL,
    category_id INT DEFAULT NULL,
    uom_id INT DEFAULT NULL,
    barcode BIGINT(20) UNIQUE DEFAULT NULL,
    sku VARCHAR(50) UNIQUE DEFAULT NULL,
    manufacturer_id INT DEFAULT NULL,
    description VARCHAR(200),
    weight DOUBLE DEFAULT NULL,
    size VARCHAR(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Orders Table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT DEFAULT NULL,
    order_total DOUBLE NOT NULL,
    discount DOUBLE DEFAULT NULL,
    shipping_address VARCHAR(200),
    paid_amount DOUBLE DEFAULT NULL,
    status_id INT DEFAULT NULL,
    order_date DATE DEFAULT NULL,
    delivery_date DATE DEFAULT NULL,
    vat DOUBLE DEFAULT NULL,
    remark VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Order Details Table
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    qty DOUBLE NOT NULL,
    price DOUBLE NOT NULL,
    vat DOUBLE DEFAULT NULL,
    uom_id INT DEFAULT NULL,
    discount DOUBLE DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Purchases Table
CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT DEFAULT NULL,
    status_id INT DEFAULT NULL,
    order_total DOUBLE NOT NULL,
    paid_amount DOUBLE DEFAULT NULL,
    discount DOUBLE DEFAULT NULL,
    vat DOUBLE DEFAULT NULL,
    photo VARCHAR(100),
    date DATE DEFAULT NULL,
    shipping_address VARCHAR(150),
    description VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Purchases Details Table
CREATE TABLE purchases_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchases_id INT NOT NULL,
    product_id INT NOT NULL,
    qty DOUBLE NOT NULL,
    price DOUBLE NOT NULL,
    discount DOUBLE DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Stock Table
CREATE TABLE stocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    transaction_type_id INT DEFAULT NULL,
    warehouse_id INT DEFAULT NULL,
    qty DOUBLE NOT NULL,
    uom_id INT DEFAULT NULL,
    remark VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Transaction Type Table
CREATE TABLE transaction_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    factor FLOAT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Stock Adjustment Table
CREATE TABLE stock_adjustment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    adjustment_type_id INT DEFAULT NULL,
    warehouse_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Stock Adjustment Details Table
CREATE TABLE stock_adjustment_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stock_adjustment_id INT NOT NULL,
    product_id INT NOT NULL,
    qty DOUBLE NOT NULL,
    price DOUBLE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- probot create-laravel-mvc -t payment_statuses -d laravel_pos
