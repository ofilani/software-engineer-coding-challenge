# Software Engineer - Coding challenge by Next Media

Don't forget to click the star and follow buttons to encourage us to build something amazing🌟

Enjoy <3

## Author

- [@Oussama Filani](https://www.github.com/oussamafilani)

## Source code

[Backend](https://github.com/ofilani/software-engineer-coding-challenge/tree/main/backend)<br/>
[Frontend](https://github.com/ofilani/software-engineer-coding-challenge/tree/main/frontend)

## Table of contents

- [UML Class Diagram](#uml-class-diagram)
- [Product definition](#product-definition)
- [Category definition](#category-definition)
- [Run Locally](#run-locally)
  - [Installation](#Installation)
- [Features](#features)
  - [Run Command](#cli-reference)
  - [API Reference](#api-reference)
    - [Api Documentation](#api-documentation)
- [Run Tests](#testing)
- [Repository Layer](#eloquent-queries-in-the-repository-layer)
- [Contributing](#contributing)
- [TODO](#todo)
- [License](#license)

## UML Class Diagram

![conception](https://user-images.githubusercontent.com/42185573/158068389-9dd6bfc9-b06b-46c7-b4f4-93f3b150c4c4.jpg)

## Product definition

| field         | Type     | Description   |
| :------------ | :------- | :------------ |
| `name `       | `string` | **Required**. |
| `description` | `string` | **Required**. |
| `price`       | `float`  | **Required**. |
| `image`       | `string` | **Required**. |

## Category definition

| field             | Type            | Description   |
| :---------------- | :-------------- | :------------ |
| `name `           | `string`        | **Required**. |
| `parent_category` | `null/category` | **Optional**. |

## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

### Installation

Use the package manager [composer](https://getcomposer.org/) to install required files

Install dependencies

```bash
  composer install
```

Set the environment variables:

```bash
cp .env.example .env
# open .env and modify the environment variables (if needed)
```

Start the server

```bash
  php artisan serve
```

## Features

### CLI Reference

### Category

#### Create

```bash
  php artisan category:create --name={name}
```

#### Delete

```bash
  php artisan category:delete --id={id}
```

### Product

#### Create

```bash
  php artisan product:create --name={name} --description={description} --price={price} --image={image Url}
```

#### Delete

```bash
  php artisan product:delete --id={id}
```

### API Reference

### Api Documentation

Click the link here to see the api Documentation

[Api Documentation](https://www.postman.com/filani/workspace/software-engineer-coding-challenge/)

### Product

#### Get products through a paginated

```http
  GET /api/v1/products/?page={pageNumber}
```

| Parameter     | Type      |
| :------------ | :-------- |
| `pageNumber ` | `integer` |

#### Add

```http
  POST /api/v1/products
```

##### Body

| field         | Type     | Description   |
| :------------ | :------- | :------------ |
| `name `       | `string` | **Required**. |
| `description` | `string` | **Required**. |
| `price`       | `float`  | **Required**. |
| `image`       | `string` | **Required**. |

#### Get products by name

```http
  GET /api/v1/products/name/{name}
```

| Parameter | Type     | Description   |
| :-------- | :------- | :------------ |
| `name `   | `string` | **Required**. |

#### Get products by price

```http
  GET /api/v1/products/price/{min}/{max}
```

| Parameter | Type    | Description                |
| :-------- | :------ | :------------------------- |
| `min `    | `float` | **Optional By default 0**. |
| `max`     | `float` | **Required**.              |

#### Get products by category

```http
  GET /api/v1/products/category/{id}
```

| Parameter | Type     | Description   |
| :-------- | :------- | :------------ |
| `id`      | `bigint` | **Required**. |

## Testing

#### Product creation can be covered by automated tests

```http
  php artisan test
```

## Eloquent queries in the repository layer

### Wrap Eloquent queries in the repository layer

```
app
├── Repository
│   ├── Eloquent
├───────├── BaseRepository.php                     # Implementing the EloquentRepositoryInterface inside the BaseRepository class.
├───────├── CategoryRepository.php
├───────├── ProductRepository.php
│   ├── CategoryRepositoryInterface.php
│   ├── EloquentRepositoryInterface.php            # define the methods that we will be using throughout our entire application in this interface.
│   └── ProductRepositoryInterface.php

```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## TODO

- [ ] Caching paginated results with Redis on Server

## License

[MIT](https://choosealicense.com/licenses/mit/)
