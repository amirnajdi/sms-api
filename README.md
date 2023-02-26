```
composer install
```
<ol dir="rtl">
    <li> یک دیتابیس جدید با اسم `amirnajdi_digikala_task` در `mysql` ایجاد کنید.</li>   
    <li> می توانید برای تست از فایل `database/amirnajdi_digikala_task.sql`  استفاد کنید (جدول log در این فایل 0.5 میلیون  رکورد دارد) </li>
    <li> فایل `.env` را ویرایش کنید.</li>
    <li> در صورتی که از فایل backup استفاده نکردید دستور زیر را اجرا کنید </li>
</ol>

```
php artisan migrate
```

<ol dir="rtl" start="4">
    <li> می تونید از دستور زیر استفاده کنید تا 100000 رکورد با دیتای تصادفی در دیتابیس ثبت شود </li> 
</ol>

```
php artisan db:seed
```
<ol dir="rtl" start="5">
    <li> از دستور زیر استفاده کنید تا پروژه اجرا شود</li>
</ol>

```
php artisan serve
```


1. report page
    -http://127.0.0.1:8000/sms/report
2. send sms
    -http://127.0.0.1:8000/sms/send/{api_type}/{number}/{body}
3. api type: Kavensegdar or ghasedak


