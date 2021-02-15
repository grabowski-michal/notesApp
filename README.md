## What is required for running the project?

- **Composer package manager (version preferable ^2.0.8)**
https://getcomposer.org/download/

- **XAMPP development environment with PHP (at least ^7.3) and MySQL DB installed
https://www.apachefriends.org/download.html

- **Laravel framework installed (at least ^7.0 version, ^8.0 preferable)**
  *to install Laravel just run command:*
  composer global require laravel/installer

## Steps how to setup database for the project

1. Install XAMPP environment with MySQL database support.

2. Open XAMPP Control Panel and start MySQL database.

3. That's it.

You don't need to set any user accounts, passwords, databases or tables. Laravel will do it for you.

## Steps how to build and run the project

1. Open main project folder NotesApp after downloading and unzipping it.

2. Run command in terminal/command prompt:
php artisan serve

3. Now you should see information that Laravel development server has successfully started at http://127.0.0.1:8000/ (your local address).

4. Open your web browser and go to your loopback address at 8000 port and check if the project runs successfully. If you see empty table, then we can assume that project has been launched efficiently.

## Example usages

1. Commands for running integration tests in your terminal/cmd (without having local server launched):

./vendor/bin/phpunit tests\Feature\AddNoteTest.php
./vendor/bin/phpunit tests\Feature\RemoveNoteTest.php
./vendor/bin/phpunit tests\Feature\UpdateNoteTest.php
./vendor/bin/phpunit tests\Feature\ReadNoteTest.php

The integration tests can add, remove, edit the notes automatically (using the MySQL databases that has been created by XAMPP environment).

2. Run `php artisan serve` and go to http://127.0.0.1:8000/ in your browser.

       2.1. Click 'Add note' to add new note manually.
       
       2.2. Type title and content of new note in appropriate inputs.
       
       2.3. Click 'Add one' button.
       
       2.4. After clicking the button you are redirected to the main page.
       
       2.5. Check if the note has been successfully added.
