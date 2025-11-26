# 📦 Catalog API

[![Laravel](https://img.shields.io/badge/Laravel-10-red.svg?style=flat)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.3-blue.svg)](https://www.php.net/)
[![API](https://img.shields.io/badge/API-REST-green.svg)](#)

A professional **Catalog API** built with **Laravel** for managing categories and items with user authentication using **Laravel Sanctum**.

---

## 🔹 Features

-   User registration & login with API token authentication
-   Category listing
-   Items listing by category
-   Filter, search, sort, and pagination support for items
-   Fully seeded database for testing

---

## 🔹 Installation

```bash
git clone https://github.com/yourusername/catalog-api.git
cd catalog-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

API will be available at: `http://127.0.0.1:8000/api`

---

## 🔹 Authentication

### Register

**URL:** `POST /api/auth/register`

**Body:**

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
}
```

**Response:**

```json
{
    "token": "1|somerandomapitoken123"
}
```

---

### Login

**URL:** `POST /api/auth/login`

**Body:**

```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

**Response:**

```json
{
    "token": "1|somerandomapitoken123"
}
```

> 🔑 Use the returned `token` in the header for authenticated requests:

```http
Authorization: Bearer {token}
```

---

## 🔹 Categories

### List All Categories

**URL:** `GET /api/categories`

**Headers:**

```http
Authorization: Bearer {token}
```

**Response:**

```json
[
    {
        "id": 1,
        "name": "Electronics",
        "slug": "electronics"
    },
    {
        "id": 2,
        "name": "Furniture",
        "slug": "furniture"
    }
]
```

---

## 🔹 Items

### List Items by Category

**URL:** `GET /api/categories/{category_slug}/items`

**Headers:**

```http
Authorization: Bearer {token}
```

**Query Parameters (optional):**

| Parameter   | Type    | Description                                                  |
| ----------- | ------- | ------------------------------------------------------------ |
| `page`      | integer | Page number (default 1)                                      |
| `per_page`  | integer | Items per page (default 10, max 50)                          |
| `q`         | string  | Search by item name                                          |
| `min_price` | float   | Minimum item price                                           |
| `max_price` | float   | Maximum item price                                           |
| `sort`      | string  | Sorting (`price_asc`, `price_desc`, `name_asc`, `name_desc`) |

**Example Request:**

```
GET /api/categories/electronics/items?q=Item&min_price=10&max_price=500&sort=price_asc&page=1&per_page=5
```

**Response:**

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "category_id": 1,
            "name": "Electronics Item 1",
            "price": 10.5
        },
        {
            "id": 2,
            "category_id": 1,
            "name": "Electronics Item 2",
            "price": 15.2
        }
    ],
    "first_page_url": "/api/categories/electronics/items?page=1",
    "last_page": 2,
    "last_page_url": "/api/categories/electronics/items?page=2",
    "per_page": 5,
    "total": 10
}
```

---

## 🔹 Database Seeders

-   **CategorySeeder:** Creates sample categories (`Electronics`, `Furniture`, `Clothing`, `Books`, `Groceries`)
-   **ItemSeeder:** Creates 10 items per category with random prices

---

## 🔹 Contributing

1. Fork the repository
2. Create a new branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to branch (`git push origin feature/YourFeature`)
5. Open a Pull Request

---

## 🔹 License

This project is licensed under the MIT License.
Feel free to use, modify, and distribute.

---

## 🔹 Contact

Created by **NallaPerumal** – [nallaperumal342@gmail.com](mailto:nallaperumal342@gmail.com)
