# Sistem Akademik Telkom (SIAKAD TELKOM)


## Features

- 🔐 **Authentication** - User login & account management
- 👨‍🎓 **Student Management** - CRUD student data
- 👨‍🏫 **Lecturer Management** - CRUD lecturer data
- 📚 **Course Management** - CRUD course data
- 🗓️ **Schedule Management** - Academic schedule management
- 📝 **Advising Management** - Academic advising session management

## Tech Stack

**Backend:** PHP 8.2, Laravel 12

**Frontend:** Blade Template, Vite

**Auth:** Laravel Breeze

**Database:** MySQL

## Setup Project

### Prerequisites

Make sure you have the following installed:

- [PHP](https://www.php.net/) version 8.2 or higher
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) version 18.x or higher
- [MySQL](https://www.mysql.com/) / [MariaDB](https://mariadb.org/)

### Step 1: Clone Repository

```bash
git clone https://github.com/username/sistem-informasi-akademik-telkom.git
cd sistem-informasi-akademik-telkom
```

### Step 2: Install Dependencies

```bash
composer install
npm install
```

### Step 3: Configure Environment

Copy `.env.example` to `.env`:

**Windows (Command Prompt):**
```bash
cat .env.example > .env
```

**Windows (PowerShell) / Linux / Mac:**
```bash
cp .env.example .env
```

### Step 4: Generate App Key

```bash
php artisan key:generate
```

### Step 5: Configure Database

Edit the `.env` file and adjust the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_siakad_telkom
DB_USERNAME=root
DB_PASSWORD=
```

### Step 6: Run Database Migration

```bash
php artisan migrate
```

### Step 7: Build Assets

```bash
npm run build
```

### Step 8: Run the Application

```bash
php artisan serve
```

Or run everything at once (server + queue + vite):

```bash
composer run dev
```

Access the application in your browser:

```
http://localhost:8000
```

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Application controllers
│   │   └── Requests/       # Form request validation
│   ├── Models/             # Eloquent models
│   └── Policies/           # Authorization policies
├── bootstrap/
├── resources/
│   └── views/              # Blade templates
├── routes/
├── .env.example
└── composer.json
```
