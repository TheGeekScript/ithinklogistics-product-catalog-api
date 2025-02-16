# Product Catalog API    ![Visitors](https://api.visitorbadge.io/api/visitors?path=thegeekscript&label=Visitors&labelColor=%23d9e3f0&countColor=%23555555)

Building a Simplified API for a Product Catalog for iThinkLogistics.

## Features
- CRUD operations for Products and Categories
- Request validation
- Repository pattern for data access
- Unit testing with PHPUnit
- Error handling and logging

## API Endpoints for Products
- Base URL: http://127.0.0.1:8000/api/v1
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

## API Endpoints for Categories
- Base URL: http://127.0.0.1:8000/api/v1
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
Clone the repository:
   ```sh
   git clone https://github.com/TheGeekScript/ithinklogistics-product-catalog-api.git

