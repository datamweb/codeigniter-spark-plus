[Farsi](./README.fa-IR.md) | English
# Codeigniter ``Spark`` Plus

```css
  _________                   _      ____  _
 / ________| _ __   __ _ _ __| | __ |  _ \| |_   _ ___ 
 \________ \| '_ \ / _` | '__| |/ / | |_) | | | | / __|
  ________) | |_) | (_| | |  |   <  |  __/| | |_| \__ \
 |v1.0.0___/| .__/ \__,_|_|  |_|\_\ |_|   |_|\__,_|___/
            | | More commands for CI4 command-line interface!
            |_|
```
__This package is under development. Not usable now.__
This package adds more commands to the Codigniter command line. This package was created due to the lack of some of the commands required by the developers in the list of the default ``php spark`` commands.

# How to install on the Codigniter framework

### The first method: by composer
Installation is best done via Composer. Assuming Composer is installed globally, you may use the following command:

``composer require datamweb/codeIgniter-spark-plus:dev-main``
### The second method: manually
First, download the latest version of the package. Then extract the downloaded zip file in the ``app/ThirdParty`` path. Now go to ``app/Config`` . Add the following to the ``Autoload.php`` file and save the file.

```
public $psr4 = [
        //Add this line
        'Datamweb\SparkPlus' => APPPATH . 'ThirdParty\codeIgniter-spark-plus\src',
 ];
 ```

# Commands List

In this section, we have a list of commands and their explanations. You can also use command `php spark help make:helper` (Or make:lang and ...) for more information. In this way, the description of each command is displayed along with an example.

### ``make:lang``

This command helps you to create a `Language` file. In this command you can create a language file under a specific folder(en,fa,fr ...). You must use option ``--flag`` to create the file in subfolder(Language\en ,Language\fa, Language\fr ...).
The method of using this command is described below:

1. ``php spark make:lang``
2. ``php spark make:lang LangFileName``
3. ``php spark make:lang LangFileName --namespace CodeIgniter``
4. ``php spark make:lang --namespace YourNameSpace``
5. ``php spark make:lang LangFileName --flag fa``
6. ``php spark make:lang LangFileName --flag fa --namespace YourNameSpace``


> OutPut ``php spark make:lang LangFileName --flag fa``

```
PS P:\MyGitHubWork\CI4> php spark make:lang LangFileName --flag fa

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-15 07:20:58 UTC-05:00

File created: APPPATH\Language\fa\LangFileName.php

```

### ``make:view``

This command helps you to create a `view` file. In this command you can create a view file under a specific folder(e.g: mysubfolder1/mysubfolder2). You must use option ``--sub-folder mysubfolder1`` to create the file in subfolder(mysubfolder1).
The method of using this command is described below:

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

### ``make:helper``

This command helps you to create a ``helper`` file. In this command you can also introduce any value of the methods you want. To create several methods in your file `helper`, just use `&`. and If you do not have a method, use  `n`. In this command you can create a helper file under a specific folder(e.g: `mysubfolder1/mysubfolder2`). You must use option ``--sub-folder mysubfolder1/mysubfolder2`` to create the file in subfolder(mysubfolder1/mysubfolder2).
Below is how to use this command:

1. ``php spark make:helper``
2. ``php spark make:helper helper_file_name``
3. ``php spark make:helper --namespace CodeIgniter``
4. ``php spark make:helper --namespace YourNameSpace``
5. ``php spark make:helper helper_file_name --sub-folder mysubfolder1/mysubfolder2``
6. ``php spark make:helper helper_file_name --sub-folder mysubfolder1/mysubfolder2 --namespace YourNameSpace``

> OutPut ``php spark make:helper --sub-folder my-sub-folder1/my-sub-folder2``

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

### ``make:lib``

This command helps you to create a `Library` file. In this command you can also introduce any value of the methods you want. To create several methods in your file `Library`, just use `&`. and If you do not have a method, use  `n`. In this command you can create a `Library` file under a specific folder(e.g: `mysubfolder1/mysubfolder2`). You must use option `php spark make:lib mysubfolder1/mysubfolder2/MyLibraryName` to create the file in sub folder(`mysubfolder1/mysubfolder2`).
Below is how to use this command:

1. ``php spark make:lib``
2. ``php spark make:lib MyLibraryName``
3. ``php spark make:lib --namespace CodeIgniter``
4. ``php spark make:lib --namespace YourNameSpace``
5. ``php spark make:lib mysubfolder1/mysubfolder2/MyLibraryName``
6. ``php spark make:lib mysubfolder1/mysubfolder2/MyLibraryName --namespace YourNameSpace``

> OutPut ``php spark make:lib``

```
C:\Users\ppars\OneDrive\Desktop\CIMC>php spark make:lib

CodeIgniter v4.1.9 Command Line Tool - Server Time: 2022-05-18 08:44:39 UTC-05:00

Please enter your Library name(e.g: MyLibrary)? : MyLibrary

Please enter your methods for Library?
If have multi methods use "&"
If you do not have a method, use "n".

Example:
    public function myOneLibraryMethod($par1, $par2)&protected function myTwoLibraryMethod($data1, $data2)
     : public function myOneLibraryMethod($par1, $par2)&protected function myTwoLibraryMethod($data1, $data2)


File created: APPPATH\Libraries\MyLibrary.php


C:\Users\ppars\OneDrive\Desktop\CIMC>
```
