

---

# Laravel E-Commerce Project

## Requirements

Before running this project, make sure you have the following installed on your system:

* **PHP** version 8.0 or higher
* **Composer** (PHP dependency manager)
* **MySQL** or a compatible database system
* **Node.js** and **npm** (for frontend asset management)

---

## Installation Steps

Follow these steps to set up and run the project:

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-directory>
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Copy the example environment file and set your own configuration:

```bash
cp .env.example .env
```

Then, open the `.env` file and update:

* Database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)
* Other environment variables as needed

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Install Node.js Dependencies

```bash
npm install
```

### 7. Build Frontend Assets

For development with hot reload:

```bash
npm run dev
```

For production build:

```bash
npm run build
```

### 8. Start the Laravel Development Server

```bash
php artisan serve
```

Your application will be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Additional Notes

* **Livewire** is used for dynamic frontend components without writing JavaScript. Ensure the Livewire scripts are included in your layouts.
* The **admin panel** is built using **Filament** and is usually accessible at `/admin`.
  Default credentials (for testing):

  ```
  Email: admin@example.com
  Password: @AdminUser123
  ```

  Or create your own admin user via a database seeder.
* I also use preline for the tailwindcss.
---

