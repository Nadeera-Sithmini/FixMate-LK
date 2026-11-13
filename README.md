# 🔧 FixMate LK – Home Repair Service Management System

FixMate LK is a web-based home repair service management system developed using the Laravel framework. The platform helps customers find repair services, book appointments, and manage their service requests.

## 🚀 Features

### 👤 Customer
- User Registration and Login
- Browse Available Repair Services
- Book Home Repair Services
- View and Manage Bookings
- Track Booking Status
- Submit Reviews and Ratings
- View Payment Information

### 🛠️ Technician
- Technician Dashboard
- View Assigned Jobs
- Manage Job Status
- Update Job Progress
- View Customer Booking Details

### 👨‍💼 Admin
- Admin Dashboard
- Manage Services
- Manage Bookings
- Assign Technicians
- Manage Service Requests
- Monitor System Activities

## 💻 Technologies Used

| Technology | Purpose |
|---|---|
| Laravel 13 | Backend Framework |
| PHP 8.5 | Server-side Programming |
| MySQL | Database |
| Blade | Frontend Templating |
| Bootstrap 5.3.3 | UI Framework |
| JavaScript | Frontend Interactions |
| Laravel Sanctum | API Authentication |
| Postman | API Testing |

## 📁 Project Structure

```text
FixMate-LK/
├── app/
│   ├── Http/Controllers/
│   │   ├── Api/
│   │   └── ...
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   ├── api.php
│   └── web.php
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## ⚙️ Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/Nadeera-Sithmini/FixMate-LK.git
```

### 2. Navigate to Project Directory

```bash
cd FixMate-LK
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Create Environment File

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Configure Database

Create a MySQL database named:

```text
fixmate_db
```

Update the database credentials in the `.env` file.

### 7. Run Database Migrations

```bash
php artisan migrate
```

### 8. Install Frontend Dependencies

```bash
npm install
npm run build
```

### 9. Start Laravel Development Server

```bash
php artisan serve
```

Open the application:

http://127.0.0.1:8000

## 🔌 API Development

The project includes REST API controllers for:

- Authentication
- Services
- Bookings
- Technician Management
- Admin Management
- Assignments
- Reviews
- Payments

API routes are defined in:

```text
routes/api.php
```

Laravel Sanctum is used for API authentication.

## 🧪 API Testing

API endpoints can be tested using Postman.

Base URL:

```text
http://127.0.0.1:8000/api
```

## 🔐 Security

- Environment credentials are stored in `.env`.
- `.env` is excluded from Git version control.
- API authentication uses Laravel Sanctum.

## 👨‍💻 Developer

**Nadeera Sithmini**

GitHub: https://github.com/Nadeera-Sithmini

## 📄 License

This project is developed as an educational project using the Laravel framework.