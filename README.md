```bash
# User, Role, and Permission Management API

This project is a RESTful API developed using **Laravel** to manage **users**, **roles**, and **permissions** with secure authentication via **Laravel Passport**. It is designed with scalable architecture and the **Repository Pattern** for maintainable and testable code.

## Table of Contents
- [How to Run the Application Locally](#how-to-run-the-application-locally)
- [Application Process Flow](#application-process-flow)
- [API Endpoints](#api-endpoints)
- [Postman Collection](#postman-collection)
- [Contributing](#contributing)

## How to Run the Application Locally

Follow the steps below to set up and run the application on your local machine.

### 1. Clone the Repository
First, clone the repository to your local machine:




### 2. Install Dependencies
Install the necessary PHP dependencies using Composer:


composer install

### 3. Set Up Environment
Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env

### 4. Configure Database
Open the `.env` file and configure your database connection settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=role_permission_db
DB_USERNAME=root
DB_PASSWORD=

### 5. Generate Application Key
Generate the application key by running:

```bash
php artisan key:generate

### 6. Import Database
Import the given database file into your database.


9. Run the Application
Start the development server:

bash
Copy code
php artisan serve

## Application Process Flow

### 1. User Authentication
- **User Registration**: A user can register by providing their name, email, and password.
- **Login**: After registering, the user can log in by providing their email and password. On successful login, the system will issue an API token for authentication via **Laravel Passport**.

### 2. Role Management
- **Create Roles**: Admins can create roles like "Admin", "Editor", etc.
- **Assign Roles**: Admins can assign multiple roles to a user.
- **Role-Based Access Control**: Permissions are defined based on roles. When users are assigned roles, they inherit the permissions associated with those roles.

### 3. Permission Management
- **Create Permissions**: Permissions like "view_posts", "edit_posts", etc., are created.
- **Assign Permissions**: Permissions can be assigned directly to users or inherited from roles.
- **Permission Checking**: Before accessing specific routes, the middleware checks whether the authenticated user has the required permissions, either directly or through roles.

### 4. Assigning Roles and Permissions
- **Assign Roles to Users**: Admin can assign roles to users to provide access to specific actions.
- **Assign Permissions to Roles**: Roles can have permissions assigned that define the actions users in that role can perform.
- **Direct Permission Assignment**: Permissions can be assigned directly to users, allowing fine-grained control.

### 5. Middleware for Authorization
- **Middleware**: A middleware verifies if the authenticated user has the required permissions to access protected routes. It ensures secure and restricted access to certain API endpoints.

## API Endpoints

### Authentication

#### 1. Register User
- **Endpoint**: `POST /api/register`
- **Body**:

```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}

#### Admin: moazzem@atilimited.net
#### Password: 12345678

#### 2. Login User
- **Endpoint**: `POST /api/login`
- **Body**:

```json
{
  "email": "john@example.com",
  "password": "password"
}

### Role Management

#### 1. Create Role
- **Endpoint**: `POST /api/roles`
- **Body**:

```json
{
  "name": "Editor"
}

#### 2. List Roles
- **Endpoint**: `GET /api/roles`

---

### Permission Management

#### 1. Create Permission
- **Endpoint**: `POST /api/permissions`
- **Body**:

```json
{
  "name": "edit_posts"
}


2. List Permissions
Endpoint: GET /api/permissions
Assign Roles and Permissions
1. Assign Role to User
Endpoint: POST /api/users/{user_id}/assign-role
Body:
json
Copy code
{
  "role": "Super Admin"
}

#### 2. Assign Permission to Role
- **Endpoint**: `POST /api/roles/{role_id}/assign-permission`
- **Body**:

```json
{
  "permission": "edit_posts"
}

## Postman Collection

A Postman collection has been provided for testing the API. It includes requests for:

- **Authentication** (register, login).
- **Role and Permission management** (create, list).
- **Assigning roles and permissions to users**.