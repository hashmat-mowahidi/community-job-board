# 🚀 Professional Job Board Backend

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red)](https://laravel.com)
[![Pest Version](https://img.shields.io/badge/Pest-3.x-blue)](https://pestphp.com)
[![License](https://img.shields.io/badge/License-MIT-green)](https://opensource.org/licenses/MIT)

A modern, high-performance Job Board application built with **Laravel 12** and **Pest PHP**. This project focuses on Clean Code, Test-Driven Development (TDD), and strict security policies.

---

## 🌟 Key Features

### 🛡️ Security & Authorization

We implemented a strict Policy-based security layer.
* **Guests can view listings**
* **Registered users can create listings**
* **Strict Ownership:** Only the creator of a listing can Update or Delete it, enforced via ListingPolicy.


### 🔍 Advanced Search & Discovery
* **Full-text Search:** Case-insensitive filtering of job listings by title.
* **Many-to-Many Tagging:** Comprehensive filtering system allowing users to browse jobs by tech stack (e.g., PHP, Vue, Laravel).
* **SEO Friendly Slugs:** Utilizes `getRouteKeyName()` to provide human-readable URLs (e.g., `/listings/senior-laravel-developer`) instead of database IDs.

### ⏱️ Smart Time Logic
* **Carbon Integration:** Dynamic "New" badge logic using:
  `$this->created_at->greaterThanOrEqualTo(now()->subDay())`
  to identify listings posted within the last 24 hours.

---

## 🧪 Testing Suite (The "Gold Standard")

This project maintains high code quality through a rigorous testing suite using **Pest PHP**. We follow the **AAA (Arrange, Act, Assert)** pattern and utilize **Parallel Testing** for maximum efficiency.



### Feature Tests Included:
* **SearchTest:** Verifies that search queries return accurate results and handle "no results" states gracefully.
* **TagTest:** Validates the many-to-many relationship and array-based filtering.
* **ListingAuthorizationTest:** Crucial security tests proving that:
    1. Owners can update their listings.
    2. Strangers are blocked (403 Forbidden) from modifying other users' data.

**Run the tests:**
```bash
php artisan test --parallel

```

---

## 🏗️ Technical Architecture
<details>
<summary><b>Click to expand: Validation & Data Strategy</b></summary>

Server-Side Validation: Utilizes FormRequest classes to decouple validation logic from controllers, ensuring clean, reusable, and highly secure data entry.

Database Seeding: A robust Seeder system is included that automatically generates:

One Admin User (admin@example.com / password) for immediate testing of protected routes.

30+ categorized job listings with associated tags.

Model Factories: Extensive use of Factories to maintain a consistent state across Development and Testing environments.
</details>

## 🎨 Frontend & Design
* **Tailwind CSS:** Fully responsive UI built with Utility-First CSS for a modern, high-performance look.
* **Dynamic Assets:** Custom Logo integration and dynamic image handling via Laravel's Storage system.
* **Blade Components:** Reusable UI components (buttons, inputs, cards) to maintain design consistency.

--- 

## ⚙️ Configuration & Setup

### 1️⃣ Prerequisites

Before you begin, ensure you have the following installed:
* **XAMPP (with PHP 8.2+ and MySQL)**
* **Composer (PHP Package Manager)** 
* **Node.js & NPM (For frontend assets)**

### 2️⃣ Clone the Repository
```bash
git clone https://github.com/hashmat-mowahidi/community-job-board.git
cd community-job-board
composer install
npm install && npm run dev
```

### 3️⃣ Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```
* **Open .env and configure your database settings to match XAMPP (usually)**

### 4️⃣ Database Migration & Seeding

```bash
php artisan migrate --seed
```
