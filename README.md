zencb0
======

zen subtheme for CB ITS Ltd's site

This is a copy of a drupal 7 installation, the whole document root with subdirectories. I am including 
custom modules at /sites/all/modules/custom and there is a custom zen subtheme named 'myzen.'

All that is missing is the MySQL Database which I may add later. All you need is a fresh installation 
of Drupal 7, then you will have a database connection in your settings.php and a working database.

- Then copy the contents of the drupal root directory folder into the document root, taking care not
to lose your existing settings.php file. 

- The myzen subtheme includes maintenance page templates which will display if either your site
is placed into maintenance mode OR your lose the database connection, which is usually an 
unplanned scenario. Of course you might like to test the scenario out to see what your maintenance
page is going to look like. And you will certainly want to substitute your own logo image file
and change the value of the site name display if either your site
is placed into maintenance mode OR your lose the database connection, which is usually an 
unplanned scenario. Of course you might like to test the scenario out to see what your maintenance
page is going to look like. And you will certainly want to substitute your own logo image file
and change the value of the site name display if either your site
is placed into maintenance mode OR your lose the database connection, which is usually an 
unplanned scenario. Of course you might like to test the scenario out to see what your maintenance
page is going to look like. And you will certainly want to substitute your own logo image file
and change the value of the site name.

- I have created a custom images directory in the myzen theme containing my logo. When the site
database connection is down, the maintenance-page--offline.tpl.php will display and it will
retrieve the logo from the my-build... folder.

- The template is coded so as not to display system messages which might contain security sensitive
information such as your database name. You should however, also ensure that if your site is production
that you have configured your php.ini file to suppress PHP error messages, too.
