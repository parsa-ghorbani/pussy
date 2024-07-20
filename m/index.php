<?php
// بررسی اینکه فرم به صورت POST ارسال شده است
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت و تمیز کردن ورودی کاربر
    $userpass = trim($_POST["userpass"]);

    // بررسی اینکه ورودی خالی نباشد
    if (!empty($userpass)) {
        // رمزنگاری ورودی (اختیاری)
        $hashed_password = password_hash($userpass, PASSWORD_DEFAULT);

        // داده برای ذخیره‌سازی
        $data = $hashed_password . PHP_EOL;

        // فایل ذخیره‌سازی
        $file = 'User.txt';

        // ذخیره‌سازی داده‌ها در فایل با استفاده از file_put_contents
        if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) === false) {
            echo "خطا در ذخیره داده‌ها.";
        } else {
            echo "داده‌ها با موفقیت ذخیره شدند.";
        }
    } else {
        echo "ورودی نمی‌تواند خالی باشد.";
    }
} else {
    // نمایش پیام خطا اگر درخواست POST نباشد
    echo "فرم به درستی ارسال نشده است.";
}
?>
