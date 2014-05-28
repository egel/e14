# E14 exam - example webside
This is very simple example of PHP + SQL webside with MySQL database support and OOP technique.


## Features

  * Simple full OOP Project
  * Auto-class loader
  * Ad-hoc connection with exsisting local database
  * Built-in example of usage


## Requirements

  * Running server (ex: Apache, Nginx,... etc.).
  * Installed and running MySQL server.
  * Installed PHP interpreter (< v5.3).


## Install project

  * Clone it using git

```bash
$ cd ~/public_html
$ git clone git@github.com:egel/e14.git
```

  * Or download it directly to your machine in one zipped file.


### Create database
```
$ mysql -u root -p
mysql > CREATE database `e14-database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
mysql > use e14-database;
mysql > source ~/public_html/e14/sql-database/e14-database.sql;
```

Happy hacking :)


## Trivial problems with launch project

### File owner or file rights
If shows you somthing similar to this error that presents below, the problem is probably with files owners or files rights.

```
Warning: include_once(/home/user/public_html/e14/methods.php): failed to open stream: Permission denied in /home/user/public_html/e14/index.php on line 14 Warning: include_once(): Failed opening 'methods.php' for inclusion (include_path='.:/usr/share/php:/usr/share/pear') in /home/user/public_html/e14/index.php on line 14 Fatal error: Call to undefined function connect_db() in /home/user/public_html/e14/index.php on line 30
```

**Solution**

  * Check by `ls -al` program owners and rights for files.
  * Files should be for example with 664 and folders with 775 rights.

```bash
$ find ~/public_html/php-sql-sandbox -type d -exec chmod 755 {} \;
$ find ~/public_html/php-sql-sandbox -type f -exec chmod 644 {} \;
```

### Database error connection
If similar problem to this present below appears then try to solve it by solution also present below this code.

```
Warning: mysqli::mysqli(): (42000/1049): Unknown database 'e14-database' in /home/maciek/public_html/e14/methods.php on line 20 Blad: Polaczenie z baza danych nie powiodlo sie.
MySQLi connect error: Unknown database 'e14-database'
MySQLi connect errno: 1049
```

####Solution
This problem is caused by wrong database name or missing database.

  * Check `DB_USER`, `DB_PASS` and `DB_NAME` global variables located in `config.php` file.
  * If variables are correct then reload the database schema, then reload website [http://localhost/e14/](http://localhost/e14/)


## TODO List

  * Add bootstrap 3 as main front-end framework


## License
Software under [GNU AGPLv3](http://www.gnu.org/licenses/agpl-3.0.html) license.
