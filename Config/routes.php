<?php
Router::connect('/DrexCartProducts/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartProducts'));
Router::connect('/DrexCartInstall/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartInstall'));
Router::connect('/DrexCartAdmin/:action/*', array('plugin'=>'DrexCart', 'controller' => 'DrexCartAdmin'));
