# Vehicle Shop Project

## Overview
The **Vehicle Shop Project** is a web application that allows users to explore different types of vehicles including **cars, motorcycles, trucks, and trailers**. The project supports two user roles: **Merchant** and **Buyer**, each with different functionalities. The application also includes features for user registration, authentication, password reset, and Docker-based MySQL database setup.

## Features
 
### User Roles:
 
- **Role: Buyer**
  - Can view all vehicle types and detailed information for each.
  - Has an option to **follow (favorite)** vehicles and **unfollow** previously followed vehicles.
  - Default role for new user registrations.

- **Role: Merchant**
  - Can view all vehicle types and detailed information for each.
  - Can **add new vehicles** to the system.
  - Cannot follow or favorite vehicles.

### Vehicle Types:

The application manages and displays different types of vehicles including **Cars, Motorcycles, Trucks, and Trailers**. Each vehicle type has its own listing and detail page (e.g., `/car/1`, `/truck/2`).

### Anonymous Users:

- Anonymous users can browse vehicle listings and view vehicle details.
- They do not have the ability to follow or add vehicles.

### Password Reset:

The application uses the **Symfony Reset Password Bundle** to manage password resets. An email with a password reset link and token is sent to the user. The link is valid for **1 day**.

#### Mailer Configuration:
```makefile
MAILER_DSN="smtp://241268265d00ec:fc4bca93903ab4@sandbox.smtp.mailtrap.io:2525"
```

### Database:

- The project uses **MySQL** as its database, running in a Docker container.
- **Fixtures** are used to pre-populate the database with sample data for development.

## Installation

### Setup Steps

#### 1. Clone the repository:

```bash
git clone <repository-url>
cd vehicle-shop
```

#### 2. Install PHP dependencies:

```bash
composer install
```

#### 3. Install Node.js dependencies :

```bash
npm install
```

#### 4. Configure environment variables:

Copy the `.env.example` file to `.env` and configure the required variables such as database connection, mailer settings, etc.

#### 5. Setup Docker containers:

```bash
docker-compose up -d
```

#### 6. Run migrations:

```bash
php bin/console doctrine:migrations:migrate
```

#### 7. Load fixtures:

```bash
php bin/console doctrine:fixtures:load
```

- This will generate 10 Cars, 10 Motorcycles, 10 Trucks, and 10 Trailers.
- It will also create two users:
  - **Buyer**: Username: `buyer`, Password: `tada`, Role: `ROLE_BUYER`
  - **Merchant**: Username: `merchant`, Password: `tada`, Role: `ROLE_MERCHANT`

## Usage

### Login Information

- **Buyer**:
  - Username: `buyer`
  - Password: `tada`
  
- **Merchant**:
  - Username: `merchant`
  - Password: `tada`

### User Functionality

#### Anonymous User:

- Can view vehicle listings and details.
- Cannot follow or add vehicles.

#### Buyer:

- Can view vehicle listings and details.
- Can follow vehicles by adding them to a favorite list.
- Can unfollow previously followed vehicles.

#### Merchant:

- Can view vehicle listings and details.
- Can add new vehicles to the system.
- Cannot follow vehicles.

## Vehicle Requirements

When creating a new vehicle, ensure that:

- All required fields are filled in (e.g., brand, model, engine capacity, price, etc.).
- Validations are enforced to prevent empty values.

## Password Reset

- If you forget your password, click on the **Forgot Password** link on the login page.
- Enter your email address and submit the form.
- An email will be sent to you with a password reset link.
- The link will be valid for **1 hour**.

## Endpoints

- **Vehicle Listings**: View all vehicles of a specific type.
  - `/cars` - List all cars.
  - `/motorcycles` - List all motorcycles.
  - `/trucks` - List all trucks.
  - `/trailers` - List all trailers.

- **Vehicle Details**: View detailed information about a specific vehicle.
  - `/car/{id}`
  - `/motorcycle/{id}`
  - `/truck/{id}`
  - `/trailer/{id}`

- **Add New Vehicle (Merchant Only)**:
  - `/{{vehicle_type}}/new`

- **Follow/Unfollow Vehicle (Buyer Only)**:
  - `/{{vehicle_type}}/{id}/follow`
  - `/{{vehicle_type}}/{id}/unfollow`

## Technology Stack

- **Backend**: Symfony PHP Framework
- **Frontend**: HTML, CSS (Tailwind CSS), JavaScript
- **Database**: MySQL (Docker-based)
- **Authentication**: Symfony Security Component
- **Password Reset**: Symfony Reset Password Bundle
- **Fixtures**: Symfony Fixtures Bundle

## Project Structure

- **Entity**: Defines the structure of your data models.
- **Controller**: Handles user interactions and routes.
- **Repository**: Manages data fetching and queries.
- **Templates**: Twig templates for rendering views.
- **Form**: creating forms.
- **Fixtures**: Data pre-population for development.
- **Factory**: Rules for data fixtures.

## Docker Configuration

The project uses Docker to manage the database container. The default `docker-compose.yml` includes a MySQL container configured with the necessary credentials.

To start the Docker containers, run:

Here is the updated `README.md` with the requested changes:
```bash
    docker-compose up -d
```

This will set up the MySQL database within the container. Be sure to configure the database connection in your `.env` file to point to the Docker container.
