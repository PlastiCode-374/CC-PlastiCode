# API Documentation

API for accessing PlastiCode Apps

# Endpoint

https://plasticode-vxoopzmopq-et.a.run.app/api

## Register

- URL
  - `/register`
- Method
  - POST
- Request Body
  - `name` as `string`
  - `email` as `string`, must be unique
  - `password` as `string`, must be at least 5 characters
- Response

```
{
    "error": false,
    "message": "User Created"
}
```

## Login

- URL
  - `/login`
- Method
  - POST
- Request Body
  - `email` as `string`
  - `password` as `string`
- Response

```
{
    "error": false,
    "message": "success",
    "data": {
        "token": "string",
        "id": "integer",
        "name": "string",
        "email": "string"
    }
}
```

## Upload Image

- URL
  - `/image`
- Method
  - POST
- Headers
  - `Accept` : `application/json`
  - `Authorization` : `Bearer <token>`
- Request Body
  - `photo` as `file`
- Response

```
{
    "status_code": 201,
    "success": true,
    "error": false,
    "success_message": "Image has been uploaded successfully",
    "history_id": "integer",
    "image_url": "string"
}
```
