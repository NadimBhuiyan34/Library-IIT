# Library Management

## Installation

- Step 1: Copy `.env.example` file to `.env` file	
	```sh
	cp .env.example .env
	```

- Step 2: Update composer packages	
	```sh
	composer update
	```

- Step 3: Edit `.env` database section
	```
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=library
	DB_USERNAME=root
	DB_PASSWORD=<Your_Database_Password>
	```
- Step 4: Edit `.env` mail section
	```
	MAIL_MAILER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=587
	MAIL_USERNAME=caremeproject2023@gmail.com
	MAIL_PASSWORD=dxlmmsvhbgoxezib
	MAIL_ENCRYPTION=tls
	MAIL_FROM_ADDRESS=caremeproject2023@gmail.com
	MAIL_FROM_NAME="${APP_NAME}"
	```

- Step 5: Generate key, migrate, and start
	```sh
	php artisan key:generate
	php artisan migrate --seed
	php artisan storage:link
	php artisan serve
	```
- Step 6: Start the scheduler in a separate terminal
	```sh
	php artisan schedule:work
	```

## Login credential

username: nadim@gmail.com

password: 12345678
