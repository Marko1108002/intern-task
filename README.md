# Task Management System

A simple CRUD application for managing users, projects, and tasks. The application supports user authentication (registration and login) and provides protected API endpoints for managing projects and tasks.

## Requirements

-   PHP >= 7.4
-   Composer
-   MySQL
-   Laravel 11

Setup Instructions

Follow these steps to set up the project locally.

1. Clone the Repository

Clone the project repository to your local machine:

git clone https://github.com/Marko1108002/intern-task.git
cd your-repository-name

composer install

Create a .env file by copying the .env.example file

php artisan key:generate

php artisan migrate

php artisan serve

Once the application is running, you can interact with the API endpoints. The following routes are available:

User Authentication:

POST /register - Register a new user.
POST /login - Login an existing user and receive a token.
Projects:

POST /projects - Create a new project.
GET /projects - Retrieve the list of projects for the authenticated user.
PUT /projects/{project} - Update a specific project.
DELETE /projects/{project} - Delete a project.
Tasks:

POST /projects/{project}/tasks - Create a new task within a project.
GET /projects/{project}/tasks - Retrieve tasks for a specific project.
PUT /projects/{project}/tasks/{task} - Update a task within a project.
DELETE /projects/{project}/tasks/{task} - Delete a task from a project.
