# Laravel Customer Management (CRUD)

A simple, user-friendly Customer Management application built with **Laravel 12** and **Bootstrap 5**. This application provides full Create, Read, Update, and Delete (CRUD) operations for managing customer records with server-side form validation.

---

## Features

- **Create** new customer records
- **Read** / view customer details
- **Update** existing customer information
- **Delete** customer records
- **Server-side form validation** with user-friendly error messages
- **Responsive UI** using Bootstrap 5
- **Pagination** for customer listings
- **Flash messages** for success feedback

### Customer Fields

| Field | Type | Required |
|-------|------|----------|
| Name | String | Yes |
| Email | Email (Unique) | Yes |
| Phone | String | No |
| Address | String | No |
| Status | Enum (Active/Inactive) | Yes |

---

## Requirements

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- XAMPP (or any local PHP server)

---

## Installation & Setup

### Step 1: Clone or Create the Project

```bash
composer create-project laravel/laravel:^12.0 customer-crud
cd customer-crud
```

> **Note:** If you encounter a zip extension error, enable `extension=zip` in your `php.ini` file (usually located at `C:\xampp\php\php.ini`).

### Step 2: Configure Environment

1. Copy the example environment file:
   ```bash
   cp .env.example .env
   ```

2. Update the `.env` file with your database credentials:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=wcl_customer
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

3. Generate the application key:
   ```bash
   php artisan key:generate
   ```

### Step 3: Create the Database

Using **MySQL Workbench** or any MySQL client, create the database:

```sql
CREATE DATABASE wcl_customer;
```

### Step 4: Run Migrations

```bash
php artisan migrate
```

This will create the `customers` table with all necessary fields.

### Step 5: Start the Application

```bash
php artisan serve
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Project Structure

```
customer-crud/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── CustomerController.php    # Resource controller for CRUD
│   └── Models/
│       └── Customer.php                  # Eloquent model with fillable fields
├── database/
│   └── migrations/
│       └── xxxx_create_customers_table.php  # Customers table schema
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php             # Master layout with Bootstrap
│       └── customers/
│           ├── index.blade.php           # List all customers
│           ├── create.blade.php          # Add new customer form
│           ├── edit.blade.php            # Edit customer form
│           └── show.blade.php            # View customer details
├── routes/
│   └── web.php                           # Application routes
└── .env                                  # Environment configuration
```

---

## Routes

| Method | URI | Action | Name |
|--------|-----|--------|------|
| GET | `/customers` | List all customers | customers.index |
| GET | `/customers/create` | Show create form | customers.create |
| POST | `/customers` | Store new customer | customers.store |
| GET | `/customers/{id}` | Show customer details | customers.show |
| GET | `/customers/{id}/edit` | Show edit form | customers.edit |
| PUT/PATCH | `/customers/{id}` | Update customer | customers.update |
| DELETE | `/customers/{id}` | Delete customer | customers.destroy |

---

## Validation Rules

All forms include server-side validation:

- **Name**: Required, string, max 255 characters
- **Email**: Required, valid email format, unique in the customers table
- **Phone**: Optional, string, max 20 characters
- **Address**: Optional, string
- **Status**: Required, must be either `active` or `inactive`

Validation errors are displayed inline next to each form field.

---

## Troubleshooting

### Issue: "Base table or view not found"
**Solution:** Run the migration command:
```bash
php artisan migrate
```

### Issue: "The zip extension is missing"
**Solution:** Enable the zip extension in `php.ini`:
```ini
extension=zip
```
Then restart your terminal and retry.

### Issue: Config changes not reflecting
**Solution:** Clear the config cache:
```bash
php artisan config:clear
```

### Issue: Database connection failed
**Solution:** Verify your MySQL service is running and credentials in `.env` are correct.

---

## Technologies Used

- [Laravel 12](https://laravel.com/) - PHP Web Framework
- [Bootstrap 5](https://getbootstrap.com/) - CSS Framework
- [MySQL](https://www.mysql.com/) - Database
- [Composer](https://getcomposer.org/) - Dependency Manager

---

## License

This project is open-source and available for educational purposes.

---

## Author

Built as a learning project for Laravel CRUD operations with best practices.
