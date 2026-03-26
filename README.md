# 🛒 Shoppy — E-Commerce Website

A full-featured e-commerce web application built with **PHP**, **MySQL**, and **Bootstrap 5**. Browse products by category or brand, manage a shopping cart, and handle user/admin accounts — all in a clean, responsive interface.

---

## ✨ Features

### 🛍️ Customer Features
- **Product Browsing** — View products on the homepage with randomized display
- **Category & Brand Filtering** — Browse products by specific categories or brands
- **Product Search** — Search products by keywords
- **Product Details** — View detailed product info with multiple images
- **Shopping Cart** — Add/remove products, update quantities, and view subtotal
- **User Registration & Login** — Secure authentication with hashed passwords
- **User Profile** — View profile, edit account details, or delete account

### 🔧 Admin Features
- **Admin Dashboard** — Central hub for managing the store
- **Product Management** — Insert new products with 3 images, view & delete products
- **Category Management** — Add, view, and delete product categories
- **Brand Management** — Add, view, and delete product brands
- **User Management** — View all registered users with their details

---

## 🛠️ Tech Stack

| Layer      | Technology                     |
|------------|--------------------------------|
| Frontend   | HTML5, CSS3, Bootstrap 5       |
| Backend    | PHP (Procedural)               |
| Database   | MySQL / MariaDB                |
| Icons      | Font Awesome 6                 |
| Server     | XAMPP (Apache + MySQL)         |

---

## 📁 Project Structure

```
E-commerce/
├── index.php                  # Homepage — products, categories, brands
├── display_all.php            # All products page
├── product_details.php        # Single product detail view
├── search_product.php         # Search results page
├── cart.php                   # Shopping cart page
├── style.css                  # Custom styles
│
├── includes/
│   └── connect.php            # Database connection
│
├── functions/
│   └── common_function.php    # Shared PHP functions (products, cart, search, etc.)
│
├── database/
│   └── mystore.sql            # SQL schema — import this to set up the database
│
├── admin_area/
│   ├── index.php              # Admin dashboard
│   ├── admin_login.php        # Admin login page
│   ├── admin_registration.php # Admin registration page
│   ├── admin_logout.php       # Admin logout
│   ├── insert_product.php     # Add new product form
│   ├── insert_categories.php  # Add new category form
│   ├── insert_brands.php      # Add new brand form
│   ├── view_products.php      # List all products
│   ├── view_categories.php    # List all categories
│   ├── view_brands.php        # List all brands
│   ├── list_users.php         # List all registered users
│   ├── delete_product.php     # Delete a product
│   ├── delete_category.php    # Delete a category
│   ├── delete_brand.php       # Delete a brand
│   └── product_images/        # Uploaded product images
│
├── user_area/
│   ├── user_registration.php  # User registration page
│   ├── user_login.php         # User login page
│   ├── profile.php            # User profile page
│   ├── edit_account.php       # Edit user account
│   ├── delete_account.php     # Delete user account
│   ├── logout.php             # User logout
│   └── user_images/           # Uploaded user profile images
│
└── Images/                    # Static assets (logo, etc.)
```

---

## 🚀 Installation & Setup

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (or any Apache + PHP + MySQL stack)

### Steps

1. **Clone the repository** into your XAMPP `htdocs` folder:
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/yourusername/E-commerce.git
   ```

2. **Start XAMPP** — Launch Apache and MySQL from the XAMPP Control Panel.

3. **Create the database** — Open [phpMyAdmin](http://localhost/phpmyadmin) and import the SQL file:
   - Click **Import** tab
   - Select `E-commerce/database/mystore.sql`
   - Click **Go**

   This will automatically create the `mystore` database with all 6 required tables.

4. **Configure the database connection** (if needed):
   Open `includes/connect.php` and verify:
   ```php
   $con = mysqli_connect('localhost', 'root', '', 'mystore');
   ```

5. **Open the website** in your browser:
   ```
   http://localhost/E-commerce/
   ```

---

## 🗄️ Database Schema

The database `mystore` consists of 6 tables:

```
┌──────────────┐    ┌──────────────┐    ┌──────────────────┐
│  categories  │    │    brands    │    │     products     │
├──────────────┤    ├──────────────┤    ├──────────────────┤
│ category_id  │◄───│ brand_id     │◄───│ product_id       │
│ category_title│   │ brand_title  │    │ product_title    │
└──────────────┘    └──────────────┘    │ product_description│
                                        │ product_keyword  │
┌──────────────┐    ┌──────────────┐    │ category_id (FK) │
│    admin     │    │  user_table  │    │ brand_id (FK)    │
├──────────────┤    ├──────────────┤    │ product_image1   │
│ admin_id     │    │ user_id      │    │ product_image2   │
│ admin_name   │    │ username     │    │ product_image3   │
│ admin_email  │    │ user_email   │    │ product_price    │
│ admin_password│   │ user_password│    └──────────────────┘
└──────────────┘    │ user_image   │
                    │ user_ip      │    ┌──────────────────┐
                    │ user_address │    │   cart_details   │
                    │ user_mobile  │    ├──────────────────┤
                    └──────────────┘    │ cart_id          │
                                        │ product_id (FK)  │
                                        │ ip_address       │
                                        │ quantity         │
                                        └──────────────────┘
```

---


## 👤 Author

**Omkar Patil**

---

## 📄 License

This project is for educational purposes.
