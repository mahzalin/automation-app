<p align="center">
ورژن لاراول
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

## Automation app

این پروژه شامل موارد زیر است:
- ثبت نام کاربر جدید
- ورود
- خروج
- ثبت درخواست پرداخت توسط کاربر
- امکان آپلود یک یا چند فایل با فرمت pdf به همراه درخواست پرداخت
- لیست درخواست‌های کاربر
- تایید و رد درخواست پرداخت کاربر توسط ادمین
- ویرایش درخواست کاربر توسط ادمین

### Project preparation and implementation
##### برای اجرای پروژه ابتدا باید دیتابیس آن را با اطلاعات موجود در .env.example ساخت
##### سپس با دستور زیر تیبل‌های مورد نیاز ساخته خواهند شد
- php artisan migrate:refresh
##### و با دستور زیر نیز اطلاعات اولیه مورد نیاز برای کار با پروژه ساخته می‌شوند
- php artisan db:seed
##### ور در نهایت با دستور زیر پروژه اجرا خواهد شد
- php artisan serve

- http://127.0.0.1:8000/

### Admin user
برای ورود با اکانت یوزر ادمین می‌توان از ایمیل و پسورد زیر استفاده کرد
- email: admin@gmail.com
- password: 123456789
