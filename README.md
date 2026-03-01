# 🍽️ Catering Service – Laravel Application

A web-based Catering Service application built with Laravel.

⚠️ Note: The application interface and project content are written in French.

---

## 📌 Project Description

This project allows customers to:

- Browse dishes by categories
- Select main dishes, desserts, and drinks
- Add a custom description to their order
- Make an online payment
- Send event reservation requests

On the management side, the catering service can manage orders, products, categories, and event reservations.

---

## 🚀 Features

### 👤 User Side

- Browse products by category
- Add items to cart
- Choose:
  - 🍛 Main dishes
  - 🍰 Desserts
  - 🥤 Drinks
- Add a personalized note to the order
- Secure payment
- Submit event reservation requests

### 🛠️ Admin Side

- View customer orders
- Manage products (Create, Read, Update, Delete)
- Manage categories (Create, Read, Update, Delete)
- View event reservation messages

---

## 🏗️ Technologies Used

- PHP
- Laravel
- MySQL
- Blade
- Bootstrap / CSS
- JavaScript

---

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/catering-service.git
cd catering-service
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment file

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials.

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Start the server

```bash
php artisan serve
```

Open in your browser:

```
http://127.0.0.1:8000
```

---

## 🔐 Roles

**Customer**
- Place orders
- Add order descriptions
- Send reservation requests

**Admin**
- Manage orders
- Manage products
- Manage categories
- View reservations

---

## 📄 License

This project was developed for professional purposes.


