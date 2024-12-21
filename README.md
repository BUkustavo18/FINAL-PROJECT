 Install spatie/laravel-permission Package:
composer require spatie/laravel-permission

 
para maka register as an Admin

use this user information: 

name = Demdem Torred

email = quipper18@gmail.com

password = 123456

if you want to change the initial admin information, go to 

database/seeder/CreateAdminUserSeeder.

change information below

$user = User::create([

            'name' => 'Demdem Torred', 
			
            'email' => 'quipper18@gmail.com',
			
            'password' => bcrypt('123456')
			
        ]);

ps. If wala ka naka log in as initial Admin, wala kay access mostly sa mga features.

message me nalang if naay confusions. 

PS. AUTHENTICATION CODE AND LOGIC NOT MINE.

credits to:https://www.itsolutionstuff.com/post/laravel-11-user-roles-and-permissions-tutorialexample.html#google_vignette



# WEIGHBRIDGE-MANAGMENT-SYSTEMSSSS
