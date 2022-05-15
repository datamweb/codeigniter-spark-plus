[English](./README.md) | فارسی
# کدیگنایتر ``اسپارک`` پلاس

```css
  _________                   _      ____  _
 / ________| _ __   __ _ _ __| | __ |  _ \| |_   _ ___ 
 \________ \| '_ \ / _` | '__| |/ / | |_) | | | | / __|
  ________) | |_) | (_| | |  |   <  |  __/| | |_| \__ \
 |v1.0.0___/| .__/ \__,_|_|  |_|\_\ |_|   |_|\__,_|___/
            | | اضافه کردن دستورات بیشتر به دستورات پیشفرض خط فرمان کدیگنایتر!
            |_|
```

این پکیچ دستورات بیشتری را در خط فرمان کدیگنایتر نمایش میدهد. این پکیج به دلیل عدم وجود برخی از دستورات ضروری برای توسعه دهندگان در فرم ورک کدیگنایتر ایجاد شده است. با این دستور برخی از دستورات ضروری به فهرست دستورات ``php spark`` اضافه میشود.

# چگونگی نصب

### روش اول: با استفاده از کامپوزر

استفاده از این روش پیشنهاد میشود. برای اجرای این روش شما نیاز به نصب کامپوزر بر روی سیستم خود دارید، با فرض نصب بودن آن دستور زیر را در روت پروژه کدیگنایتر خود اجرا کنید:

``composer require datamweb/codeIgniter-spark-plus:dev-main``

### روش دوم: نصب دستی

آخرین نسخه پکیج را دانلود. استخراج فایل فشرده در مسیر ``app/ThirdParty`` . باز کردن فایل ``app/Config`` . و اضافه کردن  مقادیر زیر به فایل ``Autoload.php`` .

```
public $psr4 = [
        //اضافه کنید
        'Datamweb\SparkPlus' => APPPATH . 'ThirdParty\codeIgniter-spark-plus\src',
```

# فهرست دستورات

در این بخش ما فهرستی از دستورات و توضیحات مربوط به انها را قرار میدهیم. شما همچنین میتوانید با استفاده از دستور `php spark help make:helper` (یا make:lang و ...) توضیحات بیشتری از روش استفاده آنها را مشاهده کنید.

### دستور ``make:lang``

این دستور به شما کمک میکند تا یک فایل `Language` ایجاد کنید. همچنین این دستور به شما امکان میدهد تا بتتوانید فایل زبان خود را در زیر پوشه ای خاص ایجاد کنید(en,fa,fr ...). شما باید برای اینکار از گزینه ``--flag`` استفاده کنید که به شما امکان میدهد ب صورت (Language\en ,Language\fa, Language\fr ...) فایل زبان را ایجاد کنید.
روشهای استفاده از این دستور در زیر آمده است:

1. ``php spark make:lang``
2. ``php spark make:lang LangFileName``
3. ``php spark make:lang LangFileName --namespace CodeIgniter``
4. ``php spark make:lang --namespace YourNameSpace``
5. ``php spark make:lang LangFileName --flag fa``
6. ``php spark make:lang LangFileName --flag fa --namespace YourNameSpace``

> خروجی دستور ``php spark make:lang LangFileName --flag fa``

```
PS P:\MyGitHubWork\CI4> php spark make:lang LangFileName --flag fa

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-15 07:20:58 UTC-05:00

File created: APPPATH\Language\fa\LangFileName.php

```
