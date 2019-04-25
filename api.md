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