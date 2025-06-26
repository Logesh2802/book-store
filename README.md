# 📚 Laravel Bookstore Project

A simple full-stack Laravel web application that allows users to browse books and admins to manage them. The project uses Blade templating, Bootstrap UI, Laravel Sanctum (for token generation), and optionally integrates the Google Books API.

---

## 🚀 Features

### 🧑‍💻 Admin Panel
- Login/logout functionality
- Add, edit, and delete books
- View books in a searchable and paginated DataTable

### 📘 User Features
- View a list of available books
- Detailed view for each book
- Search books

### 🔒 Authentication
- Session-based custom login

---

## 🛠️ Technologies Used

- **Backend:** Laravel 11+
- **Frontend:** Blade + Bootstrap 5
- **Database:** MySQL
- **Others:** jQuery DataTables

---

## 📦 Project Setup Guide

### 1. Clone the Repo

```bash
git clone https://github.com/Logesh2802/book-store.git
cd book-store

### 2. Env setup

DB_DATABASE=bookstore_db
DB_USERNAME=root
DB_PASSWORD=

### 3. Run Migrations & Seeder

php artisan migrate
php artisan db:seed

### 4. Start Server

php artisan serve

### 5. Admin Credentials

Email: admin@example.com
Password: password123

