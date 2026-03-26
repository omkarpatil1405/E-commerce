-- ============================================
-- Database: mystore
-- E-Commerce Project by Omkar Patil
-- ============================================

CREATE DATABASE IF NOT EXISTS `mystore`;
USE `mystore`;

-- ============================================
-- Table: categories
-- ============================================
CREATE TABLE IF NOT EXISTS `categories` (
    `category_id` INT(11) NOT NULL AUTO_INCREMENT,
    `category_title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: brands
-- ============================================
CREATE TABLE IF NOT EXISTS `brands` (
    `brand_id` INT(11) NOT NULL AUTO_INCREMENT,
    `brand_title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: products
-- ============================================
CREATE TABLE IF NOT EXISTS `products` (
    `product_id` INT(11) NOT NULL AUTO_INCREMENT,
    `product_title` VARCHAR(255) NOT NULL,
    `product_description` TEXT NOT NULL,
    `product_keyword` VARCHAR(255) NOT NULL,
    `category_id` INT(11) NOT NULL,
    `brand_id` INT(11) NOT NULL,
    `product_image1` VARCHAR(255) NOT NULL,
    `product_image2` VARCHAR(255) NOT NULL,
    `product_image3` VARCHAR(255) NOT NULL,
    `product_price` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`product_id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`) ON DELETE CASCADE,
    FOREIGN KEY (`brand_id`) REFERENCES `brands`(`brand_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: admin
-- ============================================
CREATE TABLE IF NOT EXISTS `admin` (
    `admin_id` INT(11) NOT NULL AUTO_INCREMENT,
    `admin_name` VARCHAR(255) NOT NULL,
    `admin_email` VARCHAR(255) NOT NULL,
    `admin_password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`admin_id`),
    UNIQUE KEY `admin_name` (`admin_name`),
    UNIQUE KEY `admin_email` (`admin_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: user_table
-- ============================================
CREATE TABLE IF NOT EXISTS `user_table` (
    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `user_email` VARCHAR(255) NOT NULL,
    `user_password` VARCHAR(255) NOT NULL,
    `user_image` VARCHAR(255) NOT NULL,
    `user_ip` VARCHAR(100) NOT NULL,
    `user_address` TEXT NOT NULL,
    `user_mobile` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `username` (`username`),
    UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: cart_details
-- ============================================
CREATE TABLE IF NOT EXISTS `cart_details` (
    `cart_id` INT(11) NOT NULL AUTO_INCREMENT,
    `product_id` INT(11) NOT NULL,
    `ip_address` VARCHAR(100) NOT NULL,
    `quantity` INT(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (`cart_id`),
    FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
