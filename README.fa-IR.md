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

###  دستور ``make:view``

این دستور به شما کمک میکند تا یک فایل `view` ایجاد کنید. با این دستور شما میتوانید فایل ویو را در زیر پوشه ای خاص(e.g: mysubfolder1/mysubfolder2). ایجاد کنید. برای اینکار کافیست از گزینه  ``--sub-folder mysubfolder1`` استفاده کنید.
روشهای استفاده از این دستور در زیر آمده است:

1. ``php spark make:view``
2. ``php spark make:view my_view_file``
3. ``php spark make:view my_view_file --namespace CodeIgniter``
4. ``php spark make:view --namespace YourNameSpace``
5. ``make:view my_view_file --sub-folder Panel/Admin --namespace CodeIgniter``

> OutPut ``php spark make:view my_view_file --sub-folder Panel/Admin``

```
P:\MyGitHubWork\CI4>php spark make:view my_view_file --sub-folder Panel/Admin

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-16 03:19:37 UTC-05:00

File created: APPPATH\Views\Panel\Admin\my_view_file.php
```

### دستور ``make:helper``

این دستور به شما کمک میکند که شما یک فایل ``helper`` ایجاد کنید. در این دستور شما میتوانید قبل از ایجاد فایل هر تعداد تابع مد نظر دارید را معرفی کنید تا فایل با توابع معرفی شده ایجاد شود. برای ایجاد فایل  `helper` با چند تابع متفاوت, کافیست از  `&` استفاده کنید. اگر در هنگام ساخت فایل هلپر تابع ای مد نظر ندارید از, `n` استفاده کنید. در این دستور شما همچنین میتوانید فایل هلپر را در زیر پوشه ای خاص ایجاد کنید.(مثال: `mysubfolder1/mysubfolder2`). برای اینکار کافیست از گزینه ``--sub-folder mysubfolder1/mysubfolder2`` استفاده کنید. به این ترتیب فایل هلپر شما در زیر شاخه (``mysubfolder1/mysubfolder2``) ایجاد میشود.
روشهای استفاده از این دستور در زیر آمده است:

1. ``php spark make:helper``
2. ``php spark make:helper helper_file_name``
3. ``php spark make:helper --namespace CodeIgniter``
4. ``php spark make:helper --namespace YourNameSpace``
5. ``php spark make:helper helper_file_name --sub-folder mysubfolder1/mysubfolder2``
6. ``php spark make:helper helper_file_name --sub-folder mysubfolder1/mysubfolder2 --namespace YourNameSpace``

> خروجی دستور ``php spark make:helper --sub-folder my-sub-folder1/my-sub-folder2``

```
P:\MyGitHubWork\CI4>php spark make:helper --sub-folder my-sub-folder1/my-sub-folder2

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-17 10:57:21 UTC-05:00

Please enter your helper name(e.g: my_helper_name)? : my_helper_name

Please enter your methods for helper?
If have multi methods use "&"
If you do not have a method, use "n"

Example:
    function myOneHeleprMethod($par1, $par2)&function myTwoHeleprMethod($data1, $data2)
     : function myOneHeleprMethod($par1, $par2)&function myTwoHeleprMethod($data1, $data2)                              

File created: APPPATH\Helpers\my-sub-folder1\my-sub-folder2\my_helper_name_helper.php

P:\MyGitHubWork\CI4>
```

### دستور ``make:lib``

این دستور به شمادر ایجاد یک فایل `Library` کمک می کند. دراین دستور شما میتوانید قبل از ایجاد فایل مورد نظر متد های خود را معرفی کنید، به این ترتیب فایل با متد های معرفی شده ایجاد خواهد شد. برای ایجاد  `Library` با چند متد از کارکتر`&` استفاده کنید. در صورتی که متدی مد نظر ندارید از کارکتر`n` استفاده کنید. همچنین در صورت نیاز به ایجاد فایل `Library` در زیر شاخه ای خاص(برای مثال: `mysubfolder1/mysubfolder2`)شما میتوانید به صورت  `php spark make:lib mysubfolder1/mysubfolder2/MyLibraryName` از دستور استفاده کنید. به این ترتیب فایل مورد نظر در مسیر (`mysubfolder1/mysubfolder2`) ایجاد میشود.
روشهای استفاده از این دستور در زیر آمده است:

1. ``php spark make:lib``
2. ``php spark make:lib MyLibraryName``
3. ``php spark make:lib --namespace CodeIgniter``
4. ``php spark make:lib --namespace YourNameSpace``
5. ``php spark make:lib mysubfolder1/mysubfolder2/MyLibraryName``
6. ``php spark make:lib mysubfolder1/mysubfolder2/MyLibraryName --namespace YourNameSpace``

> خروجی دستور ``php spark make:lib``

```
P:\MyGitHubWork\CI4>php spark make:lib

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-18 08:44:39 UTC-05:00

Please enter your Library name(e.g: MyLibrary)? : MyLibrary

Please enter your methods for Library?
If have multi methods use "&"
If you do not have a method, use "n".

Example:
    public function myOneLibraryMethod($par1, $par2)&protected function myTwoLibraryMethod($data1, $data2)
     : public function myOneLibraryMethod($par1, $par2)&protected function myTwoLibraryMethod($data1, $data2)


File created: APPPATH\Libraries\MyLibrary.php


P:\MyGitHubWork\CI4>
```

### دستور ``make:trait``

این دستور به شمادر ایجاد یک فایل `trait` کمک می کند. دراین دستور شما میتوانید قبل از ایجاد فایل مورد نظر متد های خود را معرفی کنید، به این ترتیب فایل با متد های معرفی شده ایجاد خواهد شد. برای ایجاد  `trait` با چند متد از کارکتر`&` استفاده کنید. در صورتی که متدی مد نظر ندارید از کارکتر`n` استفاده کنید. همچنین در صورت نیاز به ایجاد فایل `Library` در زیر شاخه ای خاص(برای مثال: `mysubfolder1/mysubfolder2`)شما میتوانید به صورت  `php spark make:trait mysubfolder1/mysubfolder2/MyTrafileName` از دستور استفاده کنید. به این ترتیب فایل مورد نظر در مسیر (`mysubfolder1/mysubfolder2`) ایجاد میشود.
روشهای استفاده از این دستور در زیر آمده است:

1. ``php spark make:trait``
2. ``php spark make:trait MyTrafileName``
3. ``php spark make:trait --namespace CodeIgniter``
4. ``php spark make:trait --namespace YourNameSpace``
5. ``php spark make:trait mysubfolder1/mysubfolder2/MyTrafileName``
6. ``php spark make:trait mysubfolder1/mysubfolder2/MyTrafileName --namespace YourNameSpace``

> خروجی دستور ``php spark make:trait``

```
P:\MyGitHubWork\CI4>php spark make:trait

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-19 06:49:16 UTC-05:00

Please enter your trait name(e.g: MyTrraitName)? : MyTrafileName

Please enter your methods for trait?
If have multi methods use "&"
If you do not have a method, use "n"

Example:
    public function myOneTraitMethod($par1, $par2)&protected function myTwoTraitMethod($data1, $data2)
     : public function myOneTraitMethod($par1, $par2)&protected function myTwoTraitMethod($data1, $data2)


File created: APPPATH\Traits\MyTrafileNameTrait.php

P:\MyGitHubWork\CI4>
```