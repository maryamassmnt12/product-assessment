Installation:
I have install Laravel latest version that is 12.

Implemented Admin and Customer Login by using custom guards of laravel
Created separate Login, Register and dashboards for both the roles

For Admin you can access it using url : http://127.0.0.1:8000/admin/login
For Customer you can go with url :http://127.0.0.1:8000/customer/dashboard

I have also added routes restrictions that if admin/customer authenticate and authorize to access that url only then it will opens up

For Import: 

I have added product table and migration and done CRUD operations which is accessible by admin only and for bulk import i have Install maatwebsite for import feature
I have first export csv file by inserting dummy data using factory and seeder and then created import class using command  php artisan make:import ProductImport Added code to run import in background since data is very heavy 100K so it is not suitable to import all at once as it crash or show timeout error therefore i have added queue for this and on import there is command running on background that is php artisan queue:work

For test cases  
I have created one unit test class and one feature test class and use (php artisan test --filter=ProductCreationUnitTest) in order to test specific class.

For Real time online/offline point :
Since I have used the latest laravel version so websocket works with laravel reverb therefor i installed 
composer require laravel/reverb
and created providers and listeners classed also set echo.js and add admin-dashboard.js file for showing real time online/offline
I have added broadcastserviceprovider to define channel in this and added code on admin dashboard


Overview

This project is built using Laravel 12 and demonstrates a role-based product management system with Admin and Customer authentication, bulk product import, background processing using queues, unit/feature testing, and real-time online/offline status using WebSockets.

Installation and Setup -

1. Clone the repository: 
git clone https://github.com/maryamassmnt12/product-assessment.git

2. Install dependencies: 
composer install
npm install && npm run dev

3. Create environment file
4. Configure database credentials in .env
5. Run migrations
6. Start the application

Authentication & Authorization -

1. Implemented custom authentication guards for Admin and Customer
2. Separate login, registration, and dashboard flows for each role
3.Route access is protected using Laravel’s built-in guard middleware for Admin and Customer users.

Access URLs -

Admin Login:
http://127.0.0.1:8000/admin/login

Customer Dashboard:
http://127.0.0.1:8000/customer/login

Only authenticated users with the correct role can access their respective routes.

Product Management (Admin Only) - 

1. Created products table with migration
2. Implemented full CRUD operations
3. Access restricted to Admin users only

Bulk Product Import -

1. Integrated Maatwebsite Excel package for CSV import
2. Exported a sample CSV file using factories and seeders
3. Implemented import logic using:
    php artisan make:import ProductImport

Background Processing -

1. Bulk import is handled using Laravel Queues
2. Designed for large datasets (100K+ records) to avoid timeout issues
3. Queue worker must be running:
    php artisan queue:work

Testing - 

1. Unit Test for product creation logic
2. Feature Test for product creation flow 
3. Tests use Laravel’s built-in testing suite
    php artisan test --filter="ProductCreationUnitTest"

Real-Time Online/Offline Status -

1. Implemented real-time user presence using Laravel Reverb (WebSockets)
2. Installed Reverb:  composer require laravel/reverb
Key Implementations:
-> Broadcast service provider and channels
-> Event listeners for presence tracking
-> Configured echo.js
-> Custom admin-dashboard.js for real-time UI updates
-> Displays live online/offline status on Admin dashboard

Technologies Used =

1. Laravel 12
2. PHP 8+
3. MySQL / SQLite (for testing)
4. Laravel Queues
5. Maatwebsite Excel
6. Laravel Reverb (WebSockets)

Notes -

1. .env, vendor, and node_modules are excluded from the repository
2. All necessary setup steps are documented above


