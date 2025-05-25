# Telenavi Test - Laravel Todo API

This is a recruitment technical test project for Telenavi, built with Laravel.  
It provides APIs for creating, exporting, and summarizing a Todo List with chart-ready data.

## 🔧 Features

- ✅ Create Todo List (POST /api/todo)
- 📤 Export Todo List to Excel (GET /api/todo/export)
- 📊 Chart Summary Data:
  - Status Summary (GET /api/chart?type=status)
  - Priority Summary (GET /api/chart?type=priority)
  - Assignee Summary (GET /api/chart?type=assignee)

## 🚀 Getting Started

### 1. Clone this Repository
git clone https://github.com/risnaberti/telenavi-test-laravel.git
cd telenavi-test-laravel

### 2. Install Dependencies
composer install
cp .env.example .env
php artisan key:generate

### 3. Configure Database
Edit file .env:
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

### 4. Run Migration
php artisan migrate

### 5. Start Local Server
php artisan serve

Visit: http://localhost:8000

## 📦 Postman Collection

Use the included Postman collection (or create one manually) to test:

- POST /api/todo – create todo
- GET /api/todo/export – export Excel
- GET /api/chart?type=status|priority|assignee – summary data

---

Developed for recruitment test by [@risnaberti](https://github.com/risnaberti).