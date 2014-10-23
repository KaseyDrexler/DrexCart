<h1>DrexCart v0.0.1</h1>

Initial project creation.

10/14/2014
* finished initial image upload - will need to layout the add product screen better
* Products can be viewed by /DrexCartProducts/index
* Admin at /DrexCartAdmin/index
* Install wizard will be brought up on fresh server install.

10/15/2014
Install instructions
* Copy to DrexCart to app/Plugin directory
* modify your app/Config/bootstrap.php file
	Put this line somewhere in that file:  CakePlugin::load('DrexCart', array('routes'=>true, 'database'=>true));
* edit app/Plugin/DrexCart/Config/database 
	Modify the drexCart database to point to a blank database you should have already created. The database must be empty though. You will run this as an addition database outside of your $default database for your cakephp structure.
* Open web browser and navigate to http://mysite.com/DrexCartProducts/index  You will be taken to an install page where the database
	can be setup. Sorry, install is not really user friendly at this time. If you get to step 2 right now, that is far enough. The database is installed and you 
	can browse the products (http://mysite.com/DrexCartProducts/index) or administer the site (http://mysite.com/DrexCartAdmin/index)