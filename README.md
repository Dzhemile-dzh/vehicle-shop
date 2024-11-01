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

The application uses the **Symfony Reset Password Bundle** to manage password resets. An email with a password reset link and token is sent to the user. The link is valid for **1 hour**.

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

#### 3. Setup Docker containers:

```bash
docker-compose up -d
```

#### 4. Run migrations:

```bash
php bin/console doctrine:migrations:migrate
```

#### 5. Load fixtures:

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

### Conclusions
Integrating the backend Symfony logic with the React frontend presented some challenges, particularly after setting up Webpack, where React components weren’t rendering as expected. To keep the project moving smoothly, I opted to create visualizations using Twig templates, ensuring a functional project setup. The React code is included in assets/src for reference, and changes the API endpoints to return data in JSON format, compatible with React’s requirements.

Thank you for exploring this project!

### Project Interface 
## Login
![login](https://github.com/user-attachments/assets/84f5c484-fdba-4e3c-9652-f781126cd0f0)

## Register
![register](https://github.com/user-attachments/assets/dc4cdf0e-f8a4-4825-81bb-1d0acca26f03)

## Forgot Password
![forgot-pass](https://github.com/user-attachments/assets/701dcf9b-53b4-4866-9267-9178090973ac)

![forgot-pass-email-sent](https://github.com/user-attachments/assets/aad68ed5-cef2-4c3b-ac3f-6f9430c8aee6)

![forgot-pass-email](https://github.com/user-attachments/assets/f5f9b980-7b6a-4fc2-a99c-be0366d9f820)

![forgot-pass-reset'](https://github.com/user-attachments/assets/e42df3a2-b3e2-4512-b029-979504fe343c)

## Role Buyer
# Homepage
![homepage](https://github.com/user-attachments/assets/4a956b22-f201-49cd-a503-4d1d5e3b5d58)

# Followed
![followed-page](https://github.com/user-attachments/assets/1deff5f4-7b25-49f5-ad46-e1ef2738e4b1)

# All Cars
![all-cars](https://github.com/user-attachments/assets/ef30c5c5-2600-4350-b7cc-1268d5d72911)

# All Motorcycles 
![all-mototrcycles](https://github.com/user-attachments/assets/669c0f94-75b4-4541-9c8d-512acabffc8d)

# All Trailers 
![all-trailers](https://github.com/user-attachments/assets/483b7423-a182-48fb-98b5-58e18050859f)

# All Trucks
![all-trucks](https://github.com/user-attachments/assets/d41bf080-2c8b-46f3-abbe-8c759400f30e)

# Details page 
![car-detail](https://github.com/user-attachments/assets/81bc384c-bd77-42e6-a6ed-e1c3492f25e0)
![motorcycle-detail](https://github.com/user-attachments/assets/5fefef01-f496-45ce-bc06-8a9ade5b1c93)
![trailer-detail](https://github.com/user-attachments/assets/15e3494f-78bf-4021-9501-dbd0c2550388)
![truck-detail](https://github.com/user-attachments/assets/0d7bd53e-f97a-4d3d-a456-eeee69896b08)

## Role Merchant
# Homepage
![homepage](https://github.com/user-attachments/assets/4fc55a72-ef4a-4bf0-bd8e-aafdd8c251f4)

# All Cars
![cars-list](https://github.com/user-attachments/assets/e6c872f1-999e-436d-bdb7-50f04fd3600e)

# All Motorcycles 
![mototrcycle-list](https://github.com/user-attachments/assets/9d801486-d034-4f82-84b5-346591f5342e)

# All Trailers 
![trailers-list](https://github.com/user-attachments/assets/e52f334e-5003-433d-beb2-32f1859aedfd)

# All Trucks
![trucks-list](https://github.com/user-attachments/assets/86e8f897-a95a-4d2c-9f5b-75e5116f04a1)

# Add new pages
![car-add](https://github.com/user-attachments/assets/0aa888c3-7602-443a-8481-352128c06f51)
![motorcycle-add](https://github.com/user-attachments/assets/a4b10c4a-cf72-4787-8bd4-fc6c9ddd7b86)
![trailer-add](https://github.com/user-attachments/assets/130150e7-70d6-467b-9efe-22e792af2ae0)
![truck-add](https://github.com/user-attachments/assets/4d4df96d-d25a-4f66-84f1-29640fe7a5be)


# Details page 
![car-detail](https://github.com/user-attachments/assets/81bc384c-bd77-42e6-a6ed-e1c3492f25e0)
![motorcycle-detail](https://github.com/user-attachments/assets/5fefef01-f496-45ce-bc06-8a9ade5b1c93)
![trailer-detail](https://github.com/user-attachments/assets/15e3494f-78bf-4021-9501-dbd0c2550388)
![truck-detail](https://github.com/user-attachments/assets/0d7bd53e-f97a-4d3d-a456-eeee69896b08)
