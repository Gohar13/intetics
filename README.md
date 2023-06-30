# Requirements of the task

- The application must be developed using MVC
- The browser has a form with a single textarea field
- The user can enter anything he wants into the form
- After submitting the form, the data should be written to the mysql database under a unique identifier.
- After the data is written to the database, the same data must be selected and displayed in the browser in exactly the same form as entered by the user.
- The data must be sent by email and sent as an SMS (only the classes need to be implemented), the sending itself is not necessary
- Be sure to provide protection from SQL injection, XSS, CSRF


### Prerequisite

- PHP >=7.2

### Local environment setup

1. Fill DB_HOST, DB_USER, DB_PASS, DB_NAME in config/app.php file

2. Run migration for creating tables in DB
```
php migration.php
```