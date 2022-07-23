<h1 align="center">MacPaw Intership 2022: Back-End PHP Test Task</h1>

<strong style="color: red">PHP:</strong> v8.1.6
<br>
<strong style="color: red">Laravel:</strong> v9.21.0

### 1. Clone GitHub repo for this project locally
Find a location on your computer where you want to store the project.
``` 
 git clone https://github.com/jimmywilson111/MacPaw_Intership_2022.git
```
### 2. Install Composer & NPM Dependencies
``` 
 cd projectName folder
 composer install
 npm install
```
### 3. Create a copy of your .env file
```
cp .env.example .env
```
### 4. Generate an app encryption key
```
php artisan key:generate
```
### 5. Create an empty database for application

Create an empty database for project using the database tools you prefer.

### 6. In the .env file, add database information to allow Laravel to connect to the database
In the .env file fill in the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you created.

### 7. Migrate the database
```
php artisan migrate
```
### 8. Seed the database
```
php artisan db:seed
```
### 9. See routes for using app
```
php artisan route:list
```
### 10. Run server
```
php artisan serve
```

## Additional Task
#### 1. Define `NASA_API_KEY` variable in `env` file
#### 2. Run `php artisan config:clear`
#### 3. For show result of additional task get route: `/asteroids`s
