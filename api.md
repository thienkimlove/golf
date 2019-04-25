## Json Web Token API

* API Endpoint `https://golf.teko.dev/api`

### Register

* Link `<API_ENDPOINT>/register`
* Method `POST, form-data`
* Params

```textmate
phone : required,  example format +84903347191
name  : optional
email : optional
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