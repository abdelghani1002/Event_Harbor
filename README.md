# Event Harbor Project

## Overview
Event Harbor is a Laravel-based project aimed at creating an innovative platform for seamless event management. The platform enables users to discover, reserve, and generate tickets for various events, while providing organizers with robust tools for event creation and management.

## Requirements
- PHP 8.1
- Laravel 10.10
- Other dependencies such as DomPDF, Guzzle, Laravel Breeze, Sanctum, Mollie, and Spatie Laravel Permission.

## Installation
1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Copy the `.env.example` file to `.env` and configure your environment variables.
4. Run `php artisan key:generate` to generate an application key.
5. Run `php artisan migrate` to apply database migrations.
6. Run `php artisan serve` to start the development server.

## Configuration
- Configure your `.env` file with necessary settings such as database connection, mailer, and third-party API keys.

## Database Setup
1. Ensure your database is created.
2. Run `php artisan migrate` to apply migrations.
3. Optionally, run `php artisan db:seed` to seed the database.

