# Bungalow Rental Website

This project was developed using **Laravel 12**, with **MySQL (MariaDB)** as the database, **Breeze** for authentication, and **Blade** for interface rendering. The main goal is to create a website where users can search for bungalows, pay with PayPal, receive reservation details via email or download them as a PDF, and access all their bookings.

The APIs integrated in this project are:
- Email
- PayPal

## 🚀 Technologies Used:
- **Laravel 12** – Modern and robust PHP framework
- **MySQL (MariaDB)** – Relational database management system
- **Breeze** – Simple authentication implementation for Laravel
- **Blade** – Laravel’s templating engine
- **Tailwind CSS** – Modern and responsive styling framework
- **Bootstrap** – CSS framework for responsive design and components
- **PHP Pest** – Elegant testing framework for PHP
- **JavaScript** – Front-end scripting language for interactive features

## 🎯 Features
✔ User authentication and registration  
✔ Search for bungalows with date and guest number filters  
✔ Detailed and clean interface for each property: features, location, and more  
✔ Booking reservation system  
✔ PayPal payment option (initial 10% deposit or full payment)  
✔ Reservation confirmation with personalized email notification  
✔ Reservation confirmation with PDF download  
✔ User access to track all their bookings  

## 🔧 Installation

> **Important:** Make sure your local server environment is running before starting.
>  If you are using XAMPP, start Apache and MySQL services.

```bash
git clone https://github.com/CarmemZava/mybungalow.git
- cd mybungalow
- composer install
- composer update
- npm install

# Copy the example environment file and configure your API keys (Mail - Brevo, PayPal) in the .env file:
- cp .env.example .env

- php artisan key:generate
- php artisan migrate

# popular o banco de dados com Users e Locacao(factory)
- php artisan db:seed

- npm run dev
```

## 👊 Contribution
Contributions are welcome! To collaborate:  
- Fork the project.  
- Create a new branch with your changes.  
- Submit a Pull Request.







