<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel WebSocket simple example

## Requirements

1. Docker :muscle:

## Installation

1. Clone the repo
2. `cd` to the project, run
   ```sh
   cp .env.example .env
   ```
3. Build a docker image
   ```sh
   docker compose build
   ```
4. Open a new terminal window and install app dependencies
   ```sh
   docker compose run php composer install
   ```
5. Wait for the previous command to complete and generate the app key
   ```sh
   docker compose run php php artisan key:generate
   ```
6. Start docker containers
   ```sh
   docker compose up
   ```
   
## Usage

1. Navigate to http://127.0.0.1:8080/messages and keep it open, don't refresh
2. Open a new terminal window and send a message using the below command
   ```js
   docker compose run php php artisan broadcast:message 'Your message here'
   ```
3. Or use a HTTP request, open a new window and navigate to http://127.0.0.1:8080/messages/Your%20message%20here



<b>
   If no messages are displayed, or you get a "Connection closed" then just clear your browsers
Local Storage property and refresh the page.
</b>
