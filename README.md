![Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

# 🌟 Laravel Portfolio Showcase 🚀

Laravel Portfolio Showcase adalah aplikasi web yang dirancang untuk menampilkan portofolio programmer dengan gaya dan fungsionalitas yang modern. Proyek ini dibangun menggunakan Laravel sebagai back-end untuk memastikan kinerja dan skalabilitas yang optimal.

## Features

-   Login Admin using AutGoogle
-   Adding Page
-   Adding Education & Experience (resume)
-   Adding curiculum vitae
-   Adding Portfolio/Project
-   Adding Skill for programmer
-   Setting Profile & Media sosial
-   Sending Email (Smtp google) for page contact

## Installation

Install

```bash
git clone https://github.com/dwikiyuri/Laravel9-Portofolio.git
cd Laravel9-Portfolio
composer install
php artisan key:generate
```

Setting .env to DB and Send Email

```bash

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=youremail
MAIL_PASSWORD=youremail.keygenerate
MAIL_ENCRYPTION=tlMAIL_FROM_ADDRESS=yourrmail
MAIL_FROM_NAME="${APP_NAME}"

```

or import DB in the folder.
