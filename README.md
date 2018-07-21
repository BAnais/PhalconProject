# Phalcon Project

Into this project, I had to build a php website using Phalcon Framework.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

To build this project on Windows 10, you need : 

 * MYSQL Workbench 6.3 CE
 * Phalcon 3.3
 * PHP 7.2.7 (You need at least PHP 5.5.x)

### Installing
Step 1 : Download & Install PHP 7 and Composer
  
  You can follow this [tuto](http://kizu514.com/blog/install-php7-and-composer-on-windows-10/).

Step 2 : Download & Install Phalcon 3.3

[Phalcon 3.3](https://phalconphp.com/fr/) on the official web site.

To use Phalcon on Windows, you will need to install the phalcon.dll. They have compiled several DLLs depending on the target platform. The DLLs can be found in their [download](https://phalconphp.com/en/download/windows) page.

If you download the wrong DLL, Phalcon will not work, phpinfo() contains this information.
To see examples and how we can install Phalcon on another OS, see their [installation page](https://docs.phalconphp.com/en/3.2/installation).

Now that you downloaded the right Phalcon version depending on your computer, next step is to edit the php.ini file of Phalcon by adding `extension=php_phalcon.dll`

## Deployment

First of all, change the DB configuration of `config.php` into `<your_project>/app/config/config.php` according to your database's settings. Please note that you can use another kind of database than MySQL. Refer to the official Phalcon doc.

Then run the migration into your Database which is already create (without tables). To do that, open a CMD, move into your project folder and run `phalcon migration run`. Now your Database contains tables ! Congratulations !

Finally, do `phalcon serve` to start the Phalcon server.
Default address is `localhost:<your port>/homepage`, i.e `localhost:8000/homepage`

  
## Built With

* [Phalcon](https://phalconphp.com/fr/) - The web framework used
* [MYSQL](https://dev.mysql.com/downloads/workbench/) - Database

