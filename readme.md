## Description
This project is a small ERP for a small business (company name=Afrah Bhar), this project developed to meet their specific requirements.
## How to install
it's recommended to use for this project php version 7.1, 7.2 or 7.3 
after cloning the repository go to the directory then follow the steps :
- Step 1 : Run the command
```
         composer install
```
- Step 2: Laravel 5.8 has an issue in PackageManifest.php file with the new composer version to fix it navigate to 
  vendor/laravel/framework/src/Illuminate/Foundation/PackageManifest.php file

and change this line
```
        $packages = json_decode($this->files->get($path), true);
``` 
to these line   

```
        $installed = json_decode($this->files->get($path), true);
        $packages = $installed['packages'] ?? $installed;
```

then install again some missing packages using  

```
        composer install 
```
- Step 3: Rename .env.example to .env
- Step 4: Generate an app encryption key by running a command

```
        php artisan key:generate
```
- Step 5: Migrate the database

```
        php artisan migrate
```

- Step 6: Seed the database it has just users + it's roles, users[(admin , pass: admin),(reglement , pass: reglement),(depot , pass: depot)]

```
        php artisan db:seed
```
- Step 7: Run the project using this command

```
        php artisan serve
```
