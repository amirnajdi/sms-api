```
composer install
```
<ol dir="rtl">
    <li> یک دیتابیس جدید با اسم `amirnajdi_digikala_task` در `mysql` ایجاد کنید.</li>   
    <li> می توانید برای تست از فایل `database/amirnajdi_digikala_task.sql`  استفاد کنید (جدول log در این فایل 2.5 میلیون  رکورد دارد) </li>
    <li> در صورتی که از فایل backup استفاده نکردید دستور زیر را اجرا کنید </li>
</ol>

```
php artisan migrate
```
