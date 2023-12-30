
# Project Tiki




## Installation

first clone the git repo and get to the directory 

```bash
  git clone https://github.com/srshubho/module12.git
  cd module12
```
then install the composer and npm packages
```bash
composer install
npm install
```
copy .env.example to .env. don't forget to change the database name in .env file
```bash
cp .env.example .env
```
run the following command 
```bash
php artisan key:generate
php artisan migrate --seed
php artisan serve
npm run dev
```
you are good to go
