# Product Catalog API

Building a Simplified API for a Product Catalog for iThinkLogistics.

## Features
- CRUD operations for Products and Categories
- Request validation
- Repository pattern for data access
- Unit testing with PHPUnit
- Error handling and logging

## API Documentation 📄

### Postman Collection
You can import our API collection into Postman to test all endpoints.

[📥 Download Postman Collection](docs/api-doc.json)

#### How to Import into Postman:
1. Open Postman.
2. Click **"File" → "Import"**.
3. Select the `api-doc.json` file.
4. Click **"Import"** and start testing!


## API Endpoints

- Base URL: http://127.0.0.1:8000/api/v1

### Products
- Get All Products: GET /products
- Get a Single Product: GET /products/{id}
- Create a Product: POST /products
  ```sh
  {
  "name": "New Product",
  "description": "Product Description",
  "sku": "NEW123",
  "price": 500,
  "category_id": 1
  }
- Update a Product: PUT /products/{id}
- Delete a Product: DELETE /products/{id}

### Categories
- Get All Categories: GET /categories
- Get a Single Category: GET /categories/{id}
- Create a Category: POST /categories
  ```sh
  {
  "name": "New Category"
  }
- Update a Category: PUT /categories/{id}
- Delete a Category: DELETE /categories/{id}

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/TheGeekScript/ithinklogistics-product-catalog-api.git

2. Generate an application key:
   ```sh
   php artisan key:generate

3. Configure the database in .env and run migrations:
   ```sh
   php artisan migrate --seed

4. Run the application:
   ```sh
   php artisan serve

5. Run unit tests:
   ```sh
   php artisan test

---

![Visitors](https://api.visitorbadge.io/api/visitors?path=thegeekscript&label=Visitors&labelColor=%23d9e3f0&countColor=%23555555)
