<h1>DrexCart v0.0.1</h1>

Initial project creation.

**NOTE: This project is in the early stages of development. Development schedule is listed below the Installation instructions.


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
	
	
	

	
Current Todo List 10/22/2014:
Checkout Pages and My Account are being worked on now. Estimated complete date for those two items is 11/5/2014.



Checkout Pages
* collect Billing Info (inc cc)
* collect shipping info if needed
* confirm order
* place/success
* sign in/create account
* Payment Gateway Integration
* Shipping Integration

My Account
* Addresses
* Orders
* Change email address
* change password

Categories
* Edit categories
* Assign Products
* Front side category navigation
* Category images?

Reviews
* build review widget to products page
* My account list of reviews
* Admin control of reviews

Discounts
* Coupon codes support
* Gift card support

Sitewide
* Forgot password
* Register
* Layout and theming of site
* Internationization - add other languages support

Admin
* login authentication

