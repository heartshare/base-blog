Base Blog
================================

This is simple blog application built with Twitter Bootstrap and Yii2 Framework's basic template.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      migrations/         contains database migrations
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources
	  widgets/            contains widgets used in view files    


REQUIREMENTS
------------

The minimum requirement by this application is that your Web server supports PHP 5.4.0.


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` to connect with your database, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Data is stored in relational database (MySQL). You can set up the database by executing `yii migrate` console command.


WIP
---

- admin section
- design

