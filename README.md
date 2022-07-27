# WCTT-CONTACTFORM-YEAPKHORCHIN

A contact us page to allow user to submit their name, email and description.


## Run Locally

Clone the project

```bash
  git clone https://github.com/kc98/WCTT-CONTACTFORM-YEAPKHORCHIN.git
```

Go to the project directory

```bash
  cd WCTT-CONTACTFORM-YEAPKHORCHIN
```

Install frontend dependencies

```bash
  cd frontend
  npm install
```

Install backend packages

```bash
  cd backend
  composer install
```

Start the server

#### Frontend (In ```frontend``` folder)
```bash
  npm run dev
```
Frontend URL would be ```http://localhost:8000```

#### Backend (In ```backend``` folder)
```bash
  php yii serve 127.0.0.1
```
Backend URL would be ```http://localhost:8080```


## Setup Database
Create a database with name ```contact_us```.

### Running Migrations

To run all migrations, execute the migrate command:

```bash
  php yii migrate
```

## TDD

### Backend
```bash
php vendor/bin/codecept run api
```


### Frontend
```bash
npm run cypress:open
```


## API Documentation

[Documentation link](https://documenter.getpostman.com/view/22312200/UzXNTHAB)


