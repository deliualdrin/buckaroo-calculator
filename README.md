<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Calculator App

Welcome to the Calculator App, a simple web-based calculator with basic arithmetic operations and a calculation history feature.

### Features

- Perform addition, subtraction, multiplication, and division.
- View and clear calculation history.
- Responsive and user-friendly interface.

### Getting Started

Follow these steps to set up and run the Calculator App on your local machine.

#### Prerequisites

- [PHP](https://www.php.net/) installed on your machine.
- [Composer](https://getcomposer.org/) installed for managing dependencies.
- [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/) for managing frontend assets.
- [Docker](https://www.docker.com/) (optional, for running in a Docker environment).

#### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/calculator-app.git
    ```

2. Navigate to the project directory:

    ```bash
    cd calculator-app
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install Laravel Breeze for authentication:

    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    ```

    Follow the instructions provided by Laravel Breeze to complete the setup.

5. Install frontend dependencies:

    ```bash
    npm install
    ```

6. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

7. Generate application key:

    ```bash
    php artisan key:generate
    ```

8. Configure your database connection in the `.env` file.

9. Run database migrations:

    ```bash
    php artisan migrate
    ```

10. Build frontend assets:

    ```bash
    npm run dev
    ```

#### Usage

1. Start the development server:

    ```bash
    php artisan serve
    ```

2. Access the application in your browser at [http://localhost:8000](http://localhost:8000).

3. Perform calculations, view history, and enjoy using the Calculator App!

#### API Endpoints

- **POST /api/calculator/calculate**: Store a calculation.
- **GET /api/calculator/history**: Retrieve the calculation history.

#### Docker (Optional)

If you prefer running the application in a Docker environment:

1. Build the Docker image:

    ```bash
    docker build -t calculator-app .
    ```

2. Run the Docker container:

    ```bash
    docker run -p 8080:80 calculator-app
    ```

3. Access the application in your browser at [http://localhost:8080](http://localhost:8080).

### Contributing

Feel free to contribute to the development of the Calculator App. Please follow the contribution guidelines outlined in the [CONTRIBUTING.md](CONTRIBUTING.md) file.

### License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
