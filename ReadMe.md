Small API for HRM system

To install:
    1. cd to cloned project directory
    2. type in console 'make up' (or docker-compose up -d --build)
    3. wait till docker ends setting up project
    4. make sure that composer is installed in project by typing in terminal 'docker-compose exec app composer install'
    5. type in console 'make migrate' to set up migrations and seed the tables. This migration command is "fresh", so it will drop all the tables before it starts migrating. (or php artisan migrate:fresh --seed in bash command line)

Important notes:
    * there are resources and collections for all models provided
    * all GET endpoints for all models are valid
    * api/workers/assign-worker-to-order - endpoint for assigning the worker to the order
    * api/workers/available-for-order-types - to filter available for specific orders types workers

Karelin. 2025
