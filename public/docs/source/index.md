---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
## user
> Example request:

```bash
curl -X GET -G "http://localhost/user" 
```

```javascript
const url = new URL("http://localhost/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET user`


<!-- END_3bcedda78ae45ef5c0f4c97a4963b7a1 -->

<!-- START_06673e37f2aeae326bcc55d98b998d45 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user/create" 
```

```javascript
const url = new URL("http://localhost/user/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET user/create`


<!-- END_06673e37f2aeae326bcc55d98b998d45 -->

<!-- START_3efbce72c5183a8fae61143a8bcdd44a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/user" 
```

```javascript
const url = new URL("http://localhost/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user`


<!-- END_3efbce72c5183a8fae61143a8bcdd44a -->

<!-- START_7918d9f1ab4b0bdb25a75473dca51c27 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user/{user}" 
```

```javascript
const url = new URL("http://localhost/user/{user}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET user/{user}`


<!-- END_7918d9f1ab4b0bdb25a75473dca51c27 -->

<!-- START_472148c21a3de692528742c729750a1c -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user/{user}/edit" 
```

```javascript
const url = new URL("http://localhost/user/{user}/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET user/{user}/edit`


<!-- END_472148c21a3de692528742c729750a1c -->

<!-- START_6a3ef17350fff97877239307bcd51786 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/user/{user}" 
```

```javascript
const url = new URL("http://localhost/user/{user}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT user/{user}`

`PATCH user/{user}`


<!-- END_6a3ef17350fff97877239307bcd51786 -->

<!-- START_c3f689a804341d95e136d0131312e64f -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/user/{user}" 
```

```javascript
const url = new URL("http://localhost/user/{user}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE user/{user}`


<!-- END_c3f689a804341d95e136d0131312e64f -->

<!-- START_42dacbc38de4000c89d65e2182a587fc -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/empresa" 
```

```javascript
const url = new URL("http://localhost/empresa");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET empresa`


<!-- END_42dacbc38de4000c89d65e2182a587fc -->

<!-- START_96345fbceccf1e587fe833c07f75c3d7 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/empresa/create" 
```

```javascript
const url = new URL("http://localhost/empresa/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET empresa/create`


<!-- END_96345fbceccf1e587fe833c07f75c3d7 -->

<!-- START_4d30c4a3e4beb24a6e1e59a0f7dd5264 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/empresa" 
```

```javascript
const url = new URL("http://localhost/empresa");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST empresa`


<!-- END_4d30c4a3e4beb24a6e1e59a0f7dd5264 -->

<!-- START_0c0dd01a3ea54ea5367be577480fb51b -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/empresa/{empresa}" 
```

```javascript
const url = new URL("http://localhost/empresa/{empresa}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET empresa/{empresa}`


<!-- END_0c0dd01a3ea54ea5367be577480fb51b -->

<!-- START_d82268a870c9cd66f3526e274b610865 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/empresa/{empresa}/edit" 
```

```javascript
const url = new URL("http://localhost/empresa/{empresa}/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET empresa/{empresa}/edit`


<!-- END_d82268a870c9cd66f3526e274b610865 -->

<!-- START_c8d587799f2a7b7d7ac6e426a38d56c0 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/empresa/{empresa}" 
```

```javascript
const url = new URL("http://localhost/empresa/{empresa}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT empresa/{empresa}`

`PATCH empresa/{empresa}`


<!-- END_c8d587799f2a7b7d7ac6e426a38d56c0 -->

<!-- START_0311cce7017e2f81cd4ce757ef9909ca -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/empresa/{empresa}" 
```

```javascript
const url = new URL("http://localhost/empresa/{empresa}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE empresa/{empresa}`


<!-- END_0311cce7017e2f81cd4ce757ef9909ca -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://localhost/logout" 
```

```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```

```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/{token}" 
```

```javascript
const url = new URL("http://localhost/password/reset/{token}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://localhost/home" 
```

```javascript
const url = new URL("http://localhost/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_a55b5956412237f2e8ea3f1292e1e3fc -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/graph" 
```

```javascript
const url = new URL("http://localhost/graph");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET graph`


<!-- END_a55b5956412237f2e8ea3f1292e1e3fc -->

<!-- START_5ae3008e673a7b19cd639a0bd7cdae1c -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/graph/create" 
```

```javascript
const url = new URL("http://localhost/graph/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET graph/create`


<!-- END_5ae3008e673a7b19cd639a0bd7cdae1c -->

<!-- START_1677d9b8e629eb9e2d2f4b26c721e53f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/graph" 
```

```javascript
const url = new URL("http://localhost/graph");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST graph`


<!-- END_1677d9b8e629eb9e2d2f4b26c721e53f -->

<!-- START_4be3e1fa783daa533245fa5ba1949a48 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/graph/{graph}" 
```

```javascript
const url = new URL("http://localhost/graph/{graph}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET graph/{graph}`


<!-- END_4be3e1fa783daa533245fa5ba1949a48 -->

<!-- START_116af749dbf7c33cab9634e11cc42cd8 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/graph/{graph}/edit" 
```

```javascript
const url = new URL("http://localhost/graph/{graph}/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET graph/{graph}/edit`


<!-- END_116af749dbf7c33cab9634e11cc42cd8 -->

<!-- START_143b5ad338fc0f5e2889c4a7b9dfebf8 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/graph/{graph}" 
```

```javascript
const url = new URL("http://localhost/graph/{graph}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT graph/{graph}`

`PATCH graph/{graph}`


<!-- END_143b5ad338fc0f5e2889c4a7b9dfebf8 -->

<!-- START_9900fa74e2f1a341e9151a59edc5f984 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/graph/{graph}" 
```

```javascript
const url = new URL("http://localhost/graph/{graph}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE graph/{graph}`


<!-- END_9900fa74e2f1a341e9151a59edc5f984 -->

<!-- START_d875a68fc1199e3b883d98ffb7a542b1 -->
## graph/json
> Example request:

```bash
curl -X POST "http://localhost/graph/json" 
```

```javascript
const url = new URL("http://localhost/graph/json");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST graph/json`


<!-- END_d875a68fc1199e3b883d98ffb7a542b1 -->

<!-- START_cd63e25868e73ca8633e73bd771a88a0 -->
## persona
> Example request:

```bash
curl -X GET -G "http://localhost/persona" 
```

```javascript
const url = new URL("http://localhost/persona");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET persona`


<!-- END_cd63e25868e73ca8633e73bd771a88a0 -->

<!-- START_c88bde619b4f7702d96bc4931da6703d -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/persona/create" 
```

```javascript
const url = new URL("http://localhost/persona/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET persona/create`


<!-- END_c88bde619b4f7702d96bc4931da6703d -->

<!-- START_a87c31dd673512d2d4e4a5b4fd21d25e -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/persona" 
```

```javascript
const url = new URL("http://localhost/persona");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST persona`


<!-- END_a87c31dd673512d2d4e4a5b4fd21d25e -->

<!-- START_ae730875e0873aa12cf1218c39370f11 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/persona/{persona}" 
```

```javascript
const url = new URL("http://localhost/persona/{persona}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET persona/{persona}`


<!-- END_ae730875e0873aa12cf1218c39370f11 -->

<!-- START_ec9fd9bc5ca55b3dacc2c6c684e5503f -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/persona/{persona}/edit" 
```

```javascript
const url = new URL("http://localhost/persona/{persona}/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET persona/{persona}/edit`


<!-- END_ec9fd9bc5ca55b3dacc2c6c684e5503f -->

<!-- START_1dcac1749324b6daaeb6013788a9b334 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/persona/{persona}" 
```

```javascript
const url = new URL("http://localhost/persona/{persona}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT persona/{persona}`

`PATCH persona/{persona}`


<!-- END_1dcac1749324b6daaeb6013788a9b334 -->

<!-- START_dc6732ab0386bba269cda473d86ec2aa -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/persona/{persona}" 
```

```javascript
const url = new URL("http://localhost/persona/{persona}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE persona/{persona}`


<!-- END_dc6732ab0386bba269cda473d86ec2aa -->


