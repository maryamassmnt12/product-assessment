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


