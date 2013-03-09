#varg

##Introduction
This is a work in progress OOP PHP IRC Bot and web interface.  Using some real coding standards and modular plugins to make it easy for developers to add features to the bot.

## Requirements
 - PHP 5.4 or higher
 - [Zend Framework 2](http://www.github.com/zendframework/zf2)
 - [Doctrine Module](https://www.github.com/doctrine/DoctrineModule)
 - [Doctrine ORM Module](https://github.com/doctrine/DoctrineModule)

##Installation
###Using Composer (recommended)
The recommended way to get a working copy of this project is to clone the repository

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:
```bash
cd my/project/dir
git clone git://github.com/kwamaking/varg.git
cd varg
php composer.phar self-update
php composer.phar install
```
#Virtual Host
Afterwards, set up a virtual host to point to the public/ directory of the
project and you should be ready to go!
