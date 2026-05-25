# Task Management API

## Setup

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve

## API Endpoints

POST /api/tasks
GET /api/tasks
PUT /api/tasks/{id}
DELETE /api/tasks/{id}

## Features

- Task CRUD
- Validation
- Filtering
- Pagination
- Service Pattern
- Duplicate prevention
