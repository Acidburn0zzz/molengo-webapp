Molengo WebApp
==============

Molengo WebApp Skeleton


## Installation

After you install Composer, run this command from the directory in which you want to install your new web application.

    composer create-project odan/molengo-webapp ./


* Ensure `log/`, `tmp/`, `cache/` and are web writeable.

* Create a local MySQL database e.g. "molengo_webapp" and run app/Schema/master.sql and master_fixture.sql

* Open app/App.php and customize "db.dsn" database connection string (e.g. dbname, username and password)

* In app/App.php change app.secret to a random string

* Open the browser: http://localhost/molengo-webapp

* Login with admin/admin or user/user
