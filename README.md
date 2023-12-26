<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework 
Is social Network 
Laravel Version is 10

## Requirements
- php 8.1
- composer

## Install
- git clone https://github.com/enasellithy/socail_newtwork
- cd socail_newtwork
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan serv

### For Login With Github For Example
- create app in your github
- add this in config/services.php 

'github' => [
    'client_id' => env('GITHUB_CLIENT_ID'),
    'client_secret' => env('GITHUB_CLIENT_SECRET'),
    'redirect' => 'http://127.0.0.1:8000/api/github/callback',
],

- add in .env
  GITHUB_CLIENT_ID=
  GITHUB_CLIENT_SECRET=
- php artisan config:cache

### For Login With Google For Example
- Google Developers Console
- Create Project
- Select Project
- Click Credentials
- Create an OAuth 2.0 client ID
- add this in config/services.php

'google' => [
'client_id' => env('GOOGLE_CLIENT_ID'),
'client_secret' => env('GOOGLE_CLIENT_SECRET'),
'redirect' => 'your_redirect_url',
],

- add in .env
  GOOGLE_CLIENT_ID=
  GOOGLE_CLIENT_SECRET=


