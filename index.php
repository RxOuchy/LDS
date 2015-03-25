<?php
/**
 *     Listrak Flat File Instalation Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */
 
    ini_set('display_errors', '1');
    error_reporting(1);
    require_once('templates/header.php');
    require_once('includes/globals.include.php');
    require_once('includes/db.include.php');
    
    $configStatus = false;
    
    if (file_exists('config/config.xml')){
        $config = 'config/config.xml';
        $configStatus = true;
    }
    
?>

    <section id="content">
        
        <?php 
            $test = new dbConnection();
            
            $t = $test->build('SELECT * FROM core_config_data', 'config_id');
            
            print_r($t);
        ?>

    </section>


<?php
    require_once('templates/footer.php');
?>