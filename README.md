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

### Backend - Codeception
To run the tests in the API suite, run the following command.
```bash
php vendor/bin/codecept run api
```
The output should be showed in the terminal and should be similar to that in the result below.

```bash
Api Tests (6) ----------------------------------------------------------------
+ SubmitFormCest: Try to submit form (1.02s)
+ SubmitFormCest: Try to submit form without email (0.12s)
+ SubmitFormCest: Try to submit form without name (0.07s)
+ SubmitFormCest: Try to submit form without description (0.05s)
+ SubmitFormCest: Get all forms (0.51s)
+ SubmitFormCest: Get form (0.14s)
------------------------------------------------------------------------------
```
### Frontend - Cypress
You can open Cypress from your project root of the following way:
```bash
npm run cypress:open
```
Cypress will open for you after executing the command.

![Cypress launchpad](https://docs.cypress.io/_nuxt/img/launchpad.fcc7cac.png)

Click on ```E2E Testing```

#### Choose to launch on a browser

![Choose browser to run cypress test](https://docs.cypress.io/_nuxt/img/select-browser.b7ecf05.png)

It would run the your server in the browser you have chosen.

Now click on the ```spec.cy.js``` file and watch Cypress open your browser.



## Documentation

[API Documentation](https://documenter.getpostman.com/view/22312200/UzXNTHAB)


[Open Cypress](https://docs.cypress.io/guides/getting-started/opening-the-app#The-Launchpad)

