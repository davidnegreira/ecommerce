# ecommerce

## Installation
```bash
docker build . --tag ecomerce:latest
docker run --rm -d -p 8000:80 ecomerce:latest
```

## Use

### Check the service is ok
```bash
curl -I -X 'GET' 'http://localhost:8000/status'
```
### Bad token can't fetch products
```bash
curl -I -X 'GET' 'http://localhost:8000/api/v1/product?page=1'
curl -I -X 'GET' 'http://localhost:8000/api/v1/product?page=1' -H 'Authorization: Bearer badtoken'
```

### Valid Token retrive data
```bash
curl -X 'GET' 'http://localhost:8000/api/v1/product?page=1' -H 'Authorization: Bearer admintoken'
```

### Create new products
```bash
curl -X POST \
-H "Content-Type: application/json" \
-H 'Authorization: Bearer admintoken' \
-d '{"productId": "9b1b952e-5af9-44b2-9b62-880fd733b0ae","name": "filter","description": "description","tax": 10,"price": 12.12}' \
http://localhost:8000/api/v1/product
```

### Obtain created product
```bash
curl -X 'GET' 'http://localhost:8000/api/v1/product?name=filter' -H 'Authorization: Bearer admintoken'
```
