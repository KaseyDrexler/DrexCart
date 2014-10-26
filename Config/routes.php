<?php
Router::connect('/DrexCartProducts/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartProducts'));
Router::connect('/DrexCartCarts/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartCarts'));
Router::connect('/DrexCartInstall/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartInstall'));
Router::connect('/DrexCartAdmin/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartAdmin'));

Router::connect('/DrexCartCheckout/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartCheckout'));
Router::connect('/DrexCartUsers/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartUsers'));

//Router::connect('/dcimg/*', array('plugin'=>'DrexCart', ''));