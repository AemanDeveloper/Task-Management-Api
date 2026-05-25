# Task Management API

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![PHP](https://img.shields.io/badge/PHP-8-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![REST API](https://img.shields.io/badge/API-REST-green)

This project is a full-stack task management system built with:

- Laravel REST API
- Next.js web frontend
- React Native mobile app

The system supports task CRUD operations, filtering, pagination, search, and task status management.

## Architecture Decisions

- Used Service Pattern in Laravel to separate business logic
- Used reusable components for maintainability
- Used Axios service layer for centralized API requests
- Used TypeScript for better type safety
- Used pagination to improve scalability
- Used debounced search for optimized API calls

## Future Improvements

- Authentication & authorization
- Drag and drop task management
- Real-time updates using WebSockets
- Offline support for mobile app
- Automated testing
- Docker support
- CI/CD pipeline


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
