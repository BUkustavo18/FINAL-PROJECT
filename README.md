install the Spatie package for ACL.
run command

    composer require spatie/laravel-permission
    
migrate
run command

    php artisan migrate

 install the laravel/ui package
 run command

    composer require laravel/ui
    
 run command  
 
    php artisan ui bootstrap --auth
    

Install NPM:

    npm install
    

Run NPM:

    npm run build

Seeder For Permissions and AdminUser

run command

    php artisan db:seed --class=PermissionTableSeeder

seeder for creating an admin user.
run command

    php artisan db:seed --class=CreateAdminUserSeeder

final check if it works

run command

    php artisan serve

log in credential for initial admin

    mail: 
        quipper18@gmail.com
        
    pass:
        123456



# FINAL-PROJECT
