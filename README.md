Create a new branch:

bash
run code

    git branch <branch-name>

Replace <branch-name> with the desired branch name (e.g., feature-login).

Switch to the new branch:

bash
run code

    git checkout <branch-name>

Alternatively, you can create and switch to the branch in one command:

bash
run code

    git checkout -b <branch-name>

Push the branch to GitHub:

bash
run code

    git push -u origin <branch-name>

This command sets up the branch to track the remote branch on GitHub.

2. Verify the Branch
To list all branches (local and remote):

bash
run code

    git branch -a

To confirm you’re on the new branch, look for the * symbol:

bash
run code

    git branch

3. Create a Branch Directly on GitHub (Optional)
If you want to create a branch directly on GitHub:

Go to your repository on GitHub.
Click on the Branch dropdown (near the top-left corner).
Type the name of the new branch in the text box and press Enter.
You can then pull the new branch locally:

bash
run code

    git fetch

    git checkout <branch-name>

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

in separate terminal
run command

    npm i

    npm run dev
    

run command

    php artisan serve

log in credential for initial admin

    mail: 
        quipper18@gmail.com
        
    pass:
        123456



# FINAL-PROJECT
