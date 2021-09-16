# GooW Market API

## Installation instructions
* Create database
* Clone repository `git clone git@gitlab.com:ix42/goow-market-back-end.git api`
* CD into folder `cd api`
* Create .env file `cp .env.example .env`
* Install composer dependencies `composer install`
* Generate application key `php artisan key:generate`
* Edit .env file to your need
* Migrate database `php artisan:migrate` add `--seed` flag for test data and admin account




Default credentials (seeded with migration):
 
### admin
email: `admin@goow.com`\
password: `secret`


Dev: https://api.nutritia.ix42.com
