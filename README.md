## Tentang Project Ini
Tanya.!n (Tanya.in) merupakan project untuk memenuhi tugas akhir yang diberikan oleh Kelompok 19.<br>
Anggota Kelompok: <br>
- Husnul Hayati (@husnulhayati)
- Putu Priyatna Pradipta (@priyana_Pradipta)
- Muhammad Naufal (@emnopal)
<br>

## Tentang Tanya.!n
Tanya.!n (Tanya.in) merupakan project fullstack web yang dibuat dengan menggunakan bahasa pemrograman PHP berbasis Framework Laravel.
Project ini merupakan project web tentang website tanya jawab

## Video Demo
[Demo Video Tanya.!n](https://youtu.be/7Por0ss2nyQ)

## Link Demo
[Demo Tanya.!n](https://tanyain.herokuapp.com/)<br>
Credentials Untuk Login: <br>

Role Admin:
Username: admin
Password: admin

Role User:
Username: user
Password: user

## Proses Development
Untuk Development dengan menggunakan Laravel:
- Clone repository ini
- `composer install`
- `php artisan migrate:fresh --seed`
- `php artisan serve`
<br>

Untuk Development dengan menggunakan Docker:
- Clone repository ini
- `composer install`
- `bash ./vendor/bin/sail up -d` (Untuk Linux dan Mac)
- `wsl -c ./vendor/bin/sail up -d` (Untuk Windows (Via WSL2))
- `./vendor/bin/sail artisan migrate:fresh --seed`


## ERD
![ERD Tanya.!n](erd.png)
