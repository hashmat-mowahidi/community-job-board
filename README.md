# 🚀 Professional Job Board Backend

[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-red)](https://laravel.com)
[![Pest Version](https://img.shields.io/badge/Pest-3.x-blue)](https://pestphp.com)
[![License](https://img.shields.io/badge/License-MIT-green)](https://opensource.org/licenses/MIT)

A modern, high-performance Job Board application built with **Laravel 11** and **Pest PHP**. This project focuses on Clean Code, Test-Driven Development (TDD), and strict security policies.

---

## 🌟 Key Features

### 🔍 Advanced Search & Discovery
* **Full-text Search:** Case-insensitive filtering of job listings by title.
* **Many-to-Many Tagging:** Comprehensive filtering system allowing users to browse jobs by tech stack (e.g., PHP, Vue, Laravel).
* **SEO Friendly Slugs:** Utilizes `getRouteKeyName()` to provide human-readable URLs (e.g., `/listings/senior-laravel-developer`) instead of database IDs.

### 🛡️ Secure Authorization
* **Policy-Driven Access:** Built-in `ListingPolicy` ensures that only the original creator can update or delete a job listing.
* **Middleware Protection:** Guests are restricted to "View Only" access, while authenticated users can manage their own content.

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