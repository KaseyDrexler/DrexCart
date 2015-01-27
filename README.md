<h1>DrexCart v0.0.1</h1>

@author: Kasey Drexler
@website: drexdesign.com


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
UPDATED: 1/26/2015 Had a couple months off, but starting back up again. Shooting for an updated completion date of March 2015.  
Need to finish more root functionality and then come back around and pretty it up.



Checkout Pages
* collect Billing Info (inc cc)
  [DONE]
* collect shipping info if needed
  [DONE]
* confirm order
  [DONE]
* place/success
  [DONE]
* sign in/create account
  [DONE]
* Payment Gateway Integration
  [Authorize.net Integration Complete]
* Shipping Integration
  [Flat shipping rate only right now]

My Account
* Addresses
  [DONE]
* Orders
  [DONE]
* Change email address
  [DONE]
* change password
  [DONE]

Categories
* Edit categories
  [DONE]
* Assign Products
  [DONE]
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

