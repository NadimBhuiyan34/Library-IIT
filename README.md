project install need

step:1 composer update
step:2 copy .env.example then it remane .env
step:3 edit

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library
DB_USERNAME=root
DB_PASSWORD= your server password

step:4 edit

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=caremeproject2023@gmail.com
MAIL_PASSWORD=dxlmmsvhbgoxezib
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=caremeproject2023@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

step:5 php artisan key:generate
step:6 php artisan migrate --seed

for fine automaticly add
step:7 php artisan schedule:work (terminal 1)
step: 8 php artisan serve (terminal 2)

Login for
username: nadim@gmail.com
password: 12345678
