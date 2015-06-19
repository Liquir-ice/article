# Set up a localhost server port 8080 and directory is public
$ php -S localhost:8080 -t public

$ php artisan serv


# generate a PagesController by command line
# --plain Generate an empty controller class.
php artisan make:controller PagesController --plain

# check make:controller property
$ php aritisan make:controller --help
$ php artisan help make:controller

# set up schema
$ php artisan migrate
# rollback schema
$ php artisan migrate:rollback
# create an artisan migration
$ php artisan make:migration create_articles_table --create="articles"
# create an artisan migration on which table
$ php artisan make:migration add_excerpt_to_articles_table --table="articles"

# if dont have doctrine\dbal package, migration:rollback will crash, so just install the package by composer
$ composer require doctrine/dbal
