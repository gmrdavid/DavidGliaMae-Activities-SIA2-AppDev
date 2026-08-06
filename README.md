Student Name: GLIA MAE RIO DAVID

Course & Section: BSIT 3A

Subject Name: SIA 2 & APPLICATION DEVELOPMENT


Description of the Repository:

This repository contains all activities, projects, and source codes developed for the subject. It serves as a centralized collection of outputs that demonstrate the student’s understanding and application of the lessons discussed throughout the course. Each folder represents a specific activity or requirement, organized for easy navigation and review.

LIST AND SHORT DESCRIPTION OF SIA 2 ACTIVITIES

Activity 1: UML Final Project – Title & Design Proposal

This activity focuses on presenting the project title, problem statement, objectives, target users, and system scope. It defines the overall concept of the Hulyanas Hill Information and Ordering System and serves as the foundation of the project, guiding the system design and development process.

Activity 2: Laravel Mini System – Filipino Street Foods (url: http://127.0.0.1:8000/filstreetfoods)

This activity requires the development of an individual Laravel mini-system, and I used the theme Filipino Street Foods. The system demonstrates core Laravel concepts such as routing, controller logic, Blade templating, and data passing. It includes an item listing page and a detailed view page, where users can browse different Filipino street food items and view their full information. The activity emphasizes proper MVC structure, dynamic data handling, and reusable Blade layouts to create a simple but functional web application.

Activity 3: Laravel CRUD System – “My Custom CRUD System (Music Playlist)” (url: http://127.0.0.1:8000/songs)

This activity involves creating an individual Laravel-based CRUD system focused on a Music Playlist. Students will configure a database connection, create and run migrations, and implement full CRUD operations (create, read, update, delete) using controllers and Blade templates. The system allows users to manage playlist records while demonstrating proper database handling and dynamic web application development using Laravel.

Activity 4: Laravel Form Handling & Validation – “Candidacy Form” (url: http://127.0.0.1:8000/candidacy)

This activity involves creating a unique Candidacy Form using Laravel that demonstrates form handling, input validation, and error display using Blade. It includes building a functional form with multiple input fields, setting up routes and a controller, applying validation rules to ensure correct input, and properly displaying validation errors. The activity aims to strengthen skills in backend form processing and user input validation in a Laravel-based system.

Activity 5: Building and Integrating a Laravel Application with APIs (Mini Weather App) (url: http://127.0.0.1:8000/weather)

This activity involves developing a Laravel-based Mini Weather App with user authentication, a simple REST API, and integration of a public API. Students will implement login and registration using Laravel Breeze, create their own API endpoint, and fetch external data (such as weather information) to display in a dashboard. The activity focuses on system integration, API usage, and building a functional web application with both internal and external data sources.



LIST AND SHORT DESCRIPTION OF APPLICATION DEVELOPMENT ACTIVITIES

Activity 2: UML Diagram Design Project

This activity involves designing the use case diagram for the Hulyanas Hill Information and Ordering System. It defines the system description, identifies the main actors (User and Admin), and outlines their key functions such as account management, ordering, cart handling, and system administration. The diagram visually represents how users interact with the system and how the admin manages products, orders, and user data using Draw.io.


App Dev Final Project:

Hulyanas Hill Information and Ordering System
A beginner-friendly Laravel-based web application designed to modernize the ordering and information management processes of Hulyanas Hill. The system provides a convenient online ordering platform for customers and a centralized management system for administrators.
________________________________________
1. Project Overview
The Hulyanas Hill Information and Ordering System is a centralized web-based platform developed to improve customer ordering and administrative operations. The system allows customers to browse menu items, place online orders, monitor order status, view order history, and download invoices. Administrators are provided with tools to manage menu items, customer accounts, orders, sales reports, and business analytics through an integrated dashboard.
The project replaces manual ordering and record-keeping processes with an organized digital platform that improves transaction accuracy, operational efficiency, and customer satisfaction.
________________________________________
2. Objectives
•	Provide secure user authentication and role-based access. 
•	Allow customers to browse menu items and place orders online. 
•	Enable customers to manage their shopping cart and track their orders. 
•	Generate downloadable invoices for completed transactions. 
•	Allow administrators to manage menu items, users, and customer orders. 
•	Display business reports and sales analytics. 
•	Store all customer, product, order, and transaction data securely in a MySQL database. 
________________________________________
3. System Scope
Included
•	User registration and authentication 
•	Role-based access control 
•	Customer dashboard 
•	Administrator dashboard 
•	Product/Menu management 
•	Shopping cart management 
•	Checkout and order processing 
•	Order tracking 
•	Order history 
•	Invoice generation 
•	User profile management 
•	Sales reports 
•	Business analytics 
•	Database management using MySQL

Excluded / Future Enhancements
•	Mobile application 
•	Online payment gateway integration 
•	Real-time delivery tracking 
•	Inventory management 
•	Multi-branch management 
•	AI-based food recommendations 
•	Third-party delivery integration 
________________________________________
4. User Roles and Permissions
Role	Main Permissions
Administrator	Manage menu items, users, customer orders, reports, dashboard analytics, and system settings.
Customer	Register, login, browse menu items, manage cart, place orders, track orders, download invoices, and update profile information.
________________________________________
5. Database Design
Main Tables
users
Stores all registered user accounts.
•	id 
•	name 
•	email 
•	email_verified_at 
•	password 
•	remember_token 
•	role 
•	is_active 
•	address 
•	phone 
•	created_at 
•	updated_at 
________________________________________
products
Stores all available menu items.
•	id 
•	name 
•	description 
•	price 
•	category 
•	image 
•	is_active 
•	created_at 
•	updated_at 
________________________________________
carts
Stores temporary customer shopping cart data.
•	id 
•	user_id 
•	product_id 
•	quantity 
•	created_at 
•	updated_at 
________________________________________
orders
Stores completed customer transactions.
•	id 
•	user_id 
•	order_number 
•	total_amount 
•	status 
•	payment_method 
•	shipping_address 
•	phone 
•	created_at 
•	updated_at 
________________________________________
order_items
Stores the detailed breakdown of each order.
•	id 
•	order_id 
•	product_id 
•	product_name 
•	price 
•	quantity 
•	subtotal 
•	created_at 
•	updated_at 
________________________________________
6. Table Relationships
•	User hasMany Cart 
•	User hasMany Order 
•	Product hasMany Cart 
•	Product hasMany OrderItem 
•	Cart belongsTo User 
•	Cart belongsTo Product 
•	Order belongsTo User 
•	Order hasMany OrderItem 
•	OrderItem belongsTo Order 
•	OrderItem belongsTo Product 
________________________________________
7. Technologies Used
Programming Languages
•	PHP 
•	HTML5 
•	CSS3 
•	JavaScript 
Framework
•	Laravel 12 
Frontend
•	Blade Template Engine 
•	Bootstrap / Tailwind CSS 
Database
•	MySQL 
Development Tools
•	Visual Studio Code 
•	XAMPP 
•	Composer 
•	Git & GitHub 
________________________________________
8. Installation Guide
Requirements
•	PHP 8.2 or higher 
•	Composer 
•	MySQL or MariaDB 
•	XAMPP (or equivalent local server) 
•	Laravel 12 compatible environment 
________________________________________
Step 1: Clone the Repository
git clone https://github.com/yourusername/hulyanas-hill-ordering-system.git
Or extract the ZIP file into:
C:\xampp\htdocs\hulyanas-hill-ordering-system
________________________________________
Step 2: Install Dependencies
composer install
________________________________________
Step 3: Create Environment File
cp .env.example .env
For Windows:
copy .env.example .env
________________________________________
Step 4: Configure Database
Create a database:
hulyanas_hill
Update your .env file:
DB_DATABASE=hulyanas_hill
DB_USERNAME=root
DB_PASSWORD=
________________________________________
Step 5: Generate Application Key
php artisan key:generate
________________________________________
Step 6: Run Database Migration
php artisan migrate
If seeders are available:
php artisan migrate:fresh --seed
________________________________________
Step 7: Create Storage Link
php artisan storage:link
________________________________________
Step 8: Start the Development Server
php artisan serve
Visit:
http://127.0.0.1:8000
________________________________________
9. Main System Flow
Customer Flow
1.	Register or login. 
2.	Browse available menu items. 
3.	Add products to the shopping cart. 
4.	Review cart contents. 
5.	Proceed to checkout. 
6.	Submit order. 
7.	System records the order. 
8.	Customer tracks order status. 
9.	Customer downloads invoice after completion. 
________________________________________
Administrator Flow
1.	Login. 
2.	Access the admin dashboard. 
3.	Manage menu items. 
4.	Manage customer accounts. 
5.	Monitor incoming orders. 
6.	Update order status. 
7.	View reports and analytics. 
________________________________________
10. Order Processing Logic
The ordering process follows these steps:
1.	Customer selects products. 
2.	Products are stored in the cart. 
3.	Customer proceeds to checkout. 
4.	The system calculates: 
Subtotal = Price × Quantity

Total Amount = Sum of all Subtotals
5.	Order is saved in the orders table. 
6.	Individual purchased products are saved in the order_items table. 
7.	Customer can monitor the order status. 
________________________________________
11. Report Generation
The administrator dashboard provides reports including:
•	Total Revenue 
•	Total Orders 
•	Total Customers 
•	Average Order Value 
•	Best Selling Products 
•	Sales by Category 
•	Daily Revenue Graph 
These reports help monitor business performance and support decision-making.
________________________________________
12. Testing Instructions
After installation:
1.	Register a customer account. 
2.	Login as customer. 
3.	Browse products. 
4.	Add items to cart. 
5.	Checkout. 
6.	Verify the order is created. 
7.	Login as administrator. 
8.	Manage products. 
9.	View customer orders. 
10.	Update order status. 
11.	Verify reports and analytics. 
________________________________________
13. Project Structure
app/
│── Http/
│   ├── Controllers/
│   ├── Middleware/
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
________________________________________
14. Future Enhancements
Planned improvements include:
•	GCash integration 
•	PayMaya integration 
•	PayPal support 
•	Credit/Debit Card payments 
•	Mobile application 
•	REST API development 
•	Inventory management 
•	Delivery tracking 
•	AI product recommendations 
•	Cloud deployment 
•	Multi-branch management 
________________________________________
15. Notes
•	This project is developed using the Laravel Framework. 
•	The vendor directory is not included in the repository. Run composer install after cloning or extracting the project. 
•	Configure the .env file before running the application. 
•	Ensure that Apache, MySQL, and PHP services are running properly before starting the Laravel development server. 
•	The project is intended for educational purposes and serves as a web-based ordering and management system for Hulyanas Hill.
