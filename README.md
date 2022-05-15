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