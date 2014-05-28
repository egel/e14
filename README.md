# PHP + SQL Sandbox
This is very simple sandbox for PHP + SQL developers who needs quick environment for test classes with MySQL database support.


## Features

  * Simple full OOP Project
  * Auto-class loader
  * Ad-hoc connection with exsisting local database
  * Built-in example of usage


## Requirements

  * Running server (ex: Apache, Nginx,... etc.).
  * Installed and running MySQL server.
  * Installed PHP interpreter.


## Install


## Install project
  * Clone it using git
```bash
$ cd ~/public_html
$ git clone git@github.com:egel/php-sql-sandbox.git
```

  * Or download it directly to your machine in one zipped file.


### Create database
```
$ mysql -u root -p
mysql > CREATE database `private_zoo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
mysql > use private_zoo
mysql > source ~/public_html/php-sql-sandbox/sql-database/private_zoo_database.sql
```

Happy hacking :)


## Trivial problems with launch project

### File owner or file rights
If shows you somthing similar to this error that presents below, the problem is probably with files owners or files rights.

```
Warning: include_once(/home/user/public_html/php-sql-sandbox/methods.php): failed to open stream: Permission denied in /home/user/public_html/php-sql-sandbox/index.php on line 14 Warning: include_once(): Failed opening 'methods.php' for inclusion (include_path='.:/usr/share/php:/usr/share/pear') in /home/user/public_html/php-sql-sandbox/index.php on line 14 Fatal error: Call to undefined function connect_db() in /home/user/public_html/php-sql-sandbox/index.php on line 30
```

**Solution**

  * Check by `ls -al` program owners and rights for files.
  * Files should be for example with 664 and folders with 775 rights.

```bash
$ find ~/public_html/php-sql-sandbox -type d -exec chmod 755 {} \;
$ find ~/public_html/php-sql-sandbox -type f -exec chmod 644 {} \;
```

### Database error connection
```
Warning: mysqli::mysqli(): (42000/1049): Unknown database 'szkola212' in /home/maciek/public_html/php-sql-sandbox/methods.php on line 20 Blad: Polaczenie z baza danych nie powiodlo sie.
MySQLi connect error: Unknown database 'szkola212'
MySQLi connect errno: 1049
```

** Solution **
This problem is caused by wrong database name or missing database.

  * Check `$user`, `$pass` and `$database` variables in `connect_db` method located in `methods.php` file.
  * If variables are correct then reload the database schema, then reload website [http://localhost/php-sql-sandbox](http://localhost/php-sql-sandbox)


## TODO List

  * Add bootstrap 3 as main front-end framework


## License
Software under [GNU AGPLv3](http://www.gnu.org/licenses/agpl-3.0.html) license.
