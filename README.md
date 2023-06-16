# API Documentation

API for accessing PlastiCode Apps

# Endpoint

https://plasticode-vxoopzmopq-et.a.run.app/api

# Endpoint List

- [Register](https://github.com/PlastiCode-374/CC-PlastiCode#register)
- [Login](https://github.com/PlastiCode-374/CC-PlastiCode#login)
- [Upload Image](https://github.com/PlastiCode-374/CC-PlastiCode#upload-image)
- [Jenis Plastik](https://github.com/PlastiCode-374/CC-PlastiCode#jenis-plastik)
- [Update History](https://github.com/PlastiCode-374/CC-PlastiCode#update-history)
- [User Histories](https://github.com/PlastiCode-374/CC-PlastiCode#user-histories)

## Register

- URL
  - `/register`
- Method
  - POST
- Request Body
  - `name` as `string`, required
  - `email` as `string`, must be unique, required
  - `password` as `string`, must be at least 5 characters, required
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
  - `email` as `string`, required
  - `password` as `string`, required
- Response
```
{
    "error": false,
    "message": "success",
    "data": {
        "token": "string",
        "id": integer,
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
  - `photo` as `file`, required
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

## Jenis Plastik

- URL
  - `/plastic/{jenis_plastik}`
- Method
  - GET
- Headers 
  - `Accept` : `application/json`
  - `Authorization` : `Bearer <token>`
- Response
```
{
    "status_code": 201,
    "success": true,
    "error": false,
    "success_message": "Data found.",
    "data": {
        "id": integer,
        "jenis_plastik": "string",
        "masa_pakai": "string",
        "tingkat_bahaya": "string",
        "detail_jenis_plastik": "text",
        "detail_masa_pakai": "text",
        "detail_tingkat_bahaya": "text",
        "created_at": datetime,
        "updated_at": datetime
    }
}
```

## Update History

- URL
  - `/history-update/{history_id}`
- Method
  - PUT or PATCH
- Headers 
  - `Accept` : `application/json`
  - `Authorization` : `Bearer <token>`
- Request Body
  - `jenis_plastik` as `string`, required
  - `masa_pakai` as `string`, required
  - `tingkat_bahaya` as `string`, required
  - `detail_jenis_plastik` as `string`, required
  - `detail_masa_pakai` as `string`, required
  - `detail_tingkat_bahaya` as `string`, required
- Response
```
{
    "status_code": 201,
    "success": true,
    "error": false,
    "success_message": "History has been updated successfully",
    "data": {
        "id": integer,
        "user_id": integer,
        "url_image": "string",
        "jenis_plastik": "string",
        "masa_pakai": "string",
        "tingkat_bahaya": "string",
        "detail_jenis_plastik": "text",
        "detail_masa_pakai": "text",
        "detail_tingkat_bahaya": "text",
        "created_at": datetime,
        "updated_at": datetime
    }
}
```

## User Histories

- URL
  - `/user-histories/{user_id}`
- Method
  - GET
- Headers 
  - `Accept` : `application/json`
  - `Authorization` : `Bearer <token>`
- Response
```
{
    "status_code": 200,
    "success": true,
    "error": false,
    "success_message": "Histories found",
    "histories": [
        {
            "id": integer,
            "user_id": integer,
            "url_image": "string",
            "jenis_plastik": "string",
            "masa_pakai": "string",
            "tingkat_bahaya": "aas",
            "detail_jenis_plastik": "text",
            "detail_masa_pakai": "text"",
            "detail_tingkat_bahaya": "text",
            "created_at": datetime,
            "updated_at": datetime
        }
    ]
}
```
