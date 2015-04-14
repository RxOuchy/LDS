<?php

/**
 *     Listrak Flat File Setup Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */

define('URL', 'http://localhost/LDS/');
define('LIBS', 'libs/');

//Bootstrap
require '/libs/Bootstrap.php';

//XML Class
require '/libs/Xml.php';

//Controller Framework
require '/libs/Controller.php';

//Model Framework
require '/libs/Model.php';

//View Framework
require '/libs/View.php';

//Database Information
require 'includes/db.include.php';


?>