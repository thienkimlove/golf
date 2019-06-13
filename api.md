## Json Web Token API

* API Endpoint `https://golf.teko.dev/api`

### Register

* Link `<API_ENDPOINT>/register`
* Method `POST, form-data`
* Params

```textmate
phone : required,  example format +84903347191
name  : optional
email : optional,
organization_id : optional (choose from the list of organizations)
desc : optional 
```

* Response 

```textmate
{
"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1NjE2ODgzMiwiZXhwIjoxNTU2NTI4ODMyLCJuYmYiOjE1NTYxNjg4MzIsImp0aSI6InFlQTlkeW1tV2R0ZXRRUksiLCJzdWIiOjIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.CQDWigqCfXA5IDN11MHJZQFBGghfSyY7sQFVBa3MUKw",
"expires":360000
}
```


### Login

* Link `<API_ENDPOINT>/login`
* Method `POST, form-data`
* Params

```textmate
phone : required,  example format +84903347191
```

* Response 

```textmate
{
"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1NjE2ODgzMiwiZXhwIjoxNTU2NTI4ODMyLCJuYmYiOjE1NTYxNjg4MzIsImp0aSI6InFlQTlkeW1tV2R0ZXRRUksiLCJzdWIiOjIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.CQDWigqCfXA5IDN11MHJZQFBGghfSyY7sQFVBa3MUKw",
"expires":360000
}
```

### Get current Logged-in User information

* Link `<API_ENDPOINT>/me?token=xxxxxx`
* Method `GET`

### Update current User

* Link `<API_ENDPOINT>/update?token=xxxx`
* Method `POST`

* Post Params

```textmate
name  : optional
email : optional,
organization_id : optional (choose from the list of organizations)
desc : optional 
```

## Content Listing API

### User Listing

* Link `<API_ENDPOINT>/users`
* Link `<API_ENDPOINT>/users/<user_id>`

### Category Listing

* Link `<API_ENDPOINT>/categories`
* Link `<API_ENDPOINT>/categories/<category_id>`

### Organization Listing

* Link `<API_ENDPOINT>/organizations`
* Link `<API_ENDPOINT>/organizations/<organization_id>`

### API for Message and Timeline Posts

* Listing `https://golf.teko.dev/api/contents`

Example Response :

```textmate
 "data": [
        {
            "id": 1,
            "user_name": "Admin",
            "text_content": "Test",
            "image_link": "http://test_image.link",
            "video_link": "http://test.link",
            "created_at": "2019-06-13 05:05:18",
            "updated_at": "2019-06-13 05:05:18"
        }
    ],
    "links": {
        "first": "https://golf.teko.dev/api/contents?page=1",
        "last": "https://golf.teko.dev/api/contents?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "https://golf.teko.dev/api/contents",
        "per_page": 25,
        "to": 1,
```

* Listing `https://golf.teko.dev/api/messages`

##### Create and Update

* Create Timeline Posts by send `POST` request to `https://golf.teko.dev/api/contents` :

Example POST Request

```textmate
user_id:1
text_content:Test
video_link:http://test.link
image_link:http://test_image.link
```

* Update Timeline Posts by send `PUT` request to `https://golf.teko.dev/api/contents/<POST_ID>` :

Example PUT Request `https://golf.teko.dev/api/contents/1`

Content Type `Content-Type:application/x-www-form-urlencoded`

```textmate
text_content:Test Update
video_link:http://test.link
image_link:http://test_image.link
```

* Create Message by send `POST` request to `https://golf.teko.dev/api/messages` :

Example POST Request

```textmate
send_user_id:1
receiver_user_id:2
text_message:Test
video_link:http://test.link
image_link:http://test_image.link
```

* Update Timeline Posts by send `PUT` request to `https://golf.teko.dev/api/messages/<MSG_ID>` :

Example PUT Request `https://golf.teko.dev/api/messages/1`

Content Type `Content-Type:application/x-www-form-urlencoded`

```textmate
text_message:Test Update
video_link:http://test.link
image_link:http://test_image.link
```