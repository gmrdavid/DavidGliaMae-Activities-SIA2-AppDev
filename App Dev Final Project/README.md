App Dev Final Project:

Hulyanas Hill Information and Ordering System

A beginner-friendly Laravel-based web application designed to modernize the ordering and information management processes of Hulyanas Hill. The system provides a convenient online ordering platform for customers and a centralized management system for administrators.

Project Overview
The Hulyanas Hill Information and Ordering System is a centralized web-based platform developed to improve customer ordering and administrative operations. The system allows customers to browse menu items, place online orders, monitor order status, view order history, and download invoices. Administrators are provided with tools to manage menu items, customer accounts, orders, sales reports, and business analytics through an integrated dashboard. The project replaces manual ordering and record-keeping processes with an organized digital platform that improves transaction accuracy, operational efficiency, and customer satisfaction.

Objectives • Provide secure user authentication and role-based access.
• Allow customers to browse menu items and place orders online.

• Enable customers to manage their shopping cart and track their orders.

• Generate downloadable invoices for completed transactions.

• Allow administrators to manage menu items, users, and customer orders.

• Display business reports and sales analytics.

• Store all customer, product, order, and transaction data securely in a MySQL database.

System Scope
Included

• User registration and authentication

• Role-based access control

• Customer dashboard

• Administrator dashboard

• Product/Menu management

• Shopping cart management

• Checkout and order processing

• Order tracking

• Order history

• Invoice generation

• User profile management

• Sales reports

• Business analytics

• Database management using MySQL

Excluded / Future Enhancements

• Mobile application

• Online payment gateway integration

• Real-time delivery tracking

• Inventory management

• Multi-branch management

• AI-based food recommendations

• Third-party delivery integration

User Roles and Permissions
Role Main Permissions

Administrator Manage menu items, users, customer orders, reports, dashboard analytics, and system settings.

Customer Register, login, browse menu items, manage cart, place orders, track orders, download invoices, and update profile information.

Database Design
Main Tables

users

Stores all registered user accounts.

• id

• name

• email

• email_verified_at

• password

• remember_token

• role

• is_active

• address

• phone

• created_at

• updated_at

products

Stores all available menu items.

• id

• name

• description

• price

• category

• image

• is_active

• created_at

• updated_at

carts

Stores temporary customer shopping cart data.

• id

• user_id

• product_id

• quantity

• created_at

• updated_at

orders

Stores completed customer transactions.

• id

• user_id

• order_number

• total_amount

• status

• payment_method

• shipping_address

• phone

• created_at

• updated_at

order_items

Stores the detailed breakdown of each order.

• id

• order_id

• product_id

• product_name

• price

• quantity

• subtotal

• created_at

• updated_at

Table Relationships
• User hasMany Cart

• User hasMany Order • Product hasMany Cart

• Product hasMany OrderItem

• Cart belongsTo User

• Cart belongsTo Product

• Order belongsTo User

• Order hasMany OrderItem

• OrderItem belongsTo Order

• OrderItem belongsTo Product

Technologies Used
Programming Languages

• PHP

• HTML5 • CSS3

• JavaScript

Framework

• Laravel 12

Frontend

• Blade Template Engine

• Bootstrap / Tailwind CSS

Database

• MySQL Development Tools

• Visual Studio Code

• XAMPP

• Composer

• Git & GitHub

Installation Guide
Requirements

• PHP 8.2 or higher

• Composer

• MySQL or MariaDB

• XAMPP (or equivalent local server)

• Laravel 12 compatible environment

Step 1: Clone the Repository

git clone https://github.com/gmrdavid/DavidGliaMae-Activities-SIA2-AppDev.git

Or extract the ZIP file into:

C:\Users\gliam\DavidGliaMae-Activities-SIA2-AppDev

Step 2: Install Dependencies

composer install

Step 3: Create Environment File

cp .env.example .env

For Windows:

copy .env.example .env

Step 4: Configure Database

Create a database:

hulyanas_hill

Update your .env file:

DB_DATABASE=hulyanas_hill

DB_USERNAME=root

DB_PASSWORD=

Step 5: Generate Application Key

php artisan key:generate

Step 6: Run Database Migration

php artisan migrate

If seeders are available:

php artisan migrate:fresh --seed

Step 7: Create Storage Link

php artisan storage:link

Step 8: Start the Development Server

php artisan serve

Visit:

http://127.0.0.1:8000

Main System Flow
Customer Flow

Register or login.

Browse available menu items.

Add products to the shopping cart.

Review cart contents.

Proceed to checkout.

Submit order.

System records the order.

Customer tracks order status.

Customer downloads invoice after completion.

Administrator Flow

Login.

Access the admin dashboard.

Manage menu items.

Manage customer accounts.

Monitor incoming orders.

Update order status.

View reports and analytics.

Order Processing Logic
The ordering process follows these steps:

Customer selects products.

Products are stored in the cart.

Customer proceeds to checkout.

The system calculates:

Subtotal = Price × Quantity

Total Amount = Sum of all Subtotals

Order is saved in the orders table.

Individual purchased products are saved in the order_items table.

Customer can monitor the order status.

Report Generation
The administrator dashboard provides reports including:

• Total Revenue

• Total Orders

• Total Customers

• Average Order Value

• Best Selling Products

• Sales by Category

• Daily Revenue Graph

These reports help monitor business performance and support decision-making.

Testing Instructions
After installation:

Register a customer account.

Login as customer.

Browse products.

Add items to cart.

Checkout.

Verify the order is created.

Login as administrator.

Manage products.

View customer orders.

Update order status.

Verify reports and analytics.

Project Structure
app/

│── Http/

│ ├── Controllers/

│ ├── Middleware/

│── Models/

bootstrap/

config/

database/

│── migrations/

│── seeders/

public/

resources/

│── views/

routes/

│── web.php

storage/

tests/

vendor/

Future Enhancements
Planned improvements include:

• GCash integration

• PayMaya integration

• PayPal support

• Credit/Debit Card payments

• Mobile application

• REST API development

• Inventory management

• Delivery tracking

• AI product recommendations

• Cloud deployment

• Multi-branch management

Notes
• This project is developed using the Laravel Framework.

• The vendor directory is not included in the repository. Run composer install after cloning or extracting the project.

• Configure the .env file before running the application.

• Ensure that Apache, MySQL, and PHP services are running properly before starting the Laravel development server. • The project is intended for educational purposes and serves as a web-based ordering and management system for Hulyanas Hill.