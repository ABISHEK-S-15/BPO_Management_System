BPO Services - Manual Data Entry Platform
Overview
This repository contains the code and documentation for a BPO (Business Process Outsourcing) services platform that provides manual data entry services. The platform is designed to facilitate interaction between clients and employees, allowing seamless management of data entry tasks. Built with XAMPP for the server environment and SQL for database management, this website serves as an interactive tool for managing and processing data entry tasks efficiently.

Features
Client Interface: Clients can upload documents, assign data entry tasks, and download completed documents. The platform also supports payment processing and invoice generation.
Employee Interface: Employees can view assigned tasks, download documents for data entry, and upload completed work. The interface is designed to streamline task management and reporting.
Document Exchange: Both clients and employees can exchange documents through the platform, ensuring a smooth workflow.
Interactive Tools: The website includes essential tools for managing tasks, processing payments, and generating invoices.

Here is the Hosted Website Link: https://abishek15.infinityfreeapp.com/index.php

Technologies Used
XAMPP: Provides the server environment for running PHP and MySQL.
MySQL: Used for managing and querying the database.
PHP: Server-side scripting language used for backend development.
HTML/CSS/JavaScript: For frontend development and interactive elements.
Installation
Prerequisites
XAMPP: Ensure XAMPP is installed on your local machine. Download XAMPP
Git: Make sure Git is installed for version control.
Steps
Clone the Repository:

sh
Copy code
git clone https://github.com/ABISHEK-S-15/BPO_Management_System.git
Navigate to the Project Directory:

sh
Copy code
cd BPO_Management_System
Start XAMPP:

Launch XAMPP Control Panel.
Start Apache and MySQL services.
Create the Database:

Open phpMyAdmin (http://localhost/phpmyadmin).
Create a new database named bpo_management_system.
Import the SQL file located in the database directory into the newly created database.
Configure the Database Connection:

Open the connection.php file in the includes directory.
Update the database connection details as needed.
Access the Application:

Open your web browser and navigate to http://localhost/BPO_Management_System.
Use Cases
Client Use Case
Login/Register:

Clients can create an account or log in to an existing account.
Upload Documents:

Clients can upload documents that need data entry.
Assign Tasks:

Assign data entry tasks to employees.
Download Completed Documents:

Download the finished documents after data entry is completed.
Make Payments:

Pay for the data entry services via integrated payment systems.
Generate Invoices:

Receive and download invoices for the services rendered.

Employee Use Case
Login/Register:

Employees can create an account or log in to an existing account.

View Assigned Tasks:

View tasks assigned by clients and download the documents for data entry.

Upload Completed Work:

Upload completed data entry tasks for client review.

Track Task Progress:

Track the progress of assigned tasks and report any issues.

Contributing
Contributions are welcome! Please fork the repository and submit a pull request with your changes. Make sure to follow the coding guidelines and write clear commit messages.

Contact
For any queries or support, please reach out to:

Email: Abishekappu15@gmail.com
GitHub: https://github.com/ABISHEK-S-15
