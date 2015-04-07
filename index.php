<?php

/**
 *     Listrak Flat File Setup Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */
 
    ini_set('display_errors', '1');
    error_reporting(-1);
    require_once(__DIR__ . '/templates/header.php');
    require_once(__DIR__ . '/includes/include.index.php');
    
    //initDB();
    
?>

    <section id="ltk-content">
        <?php
            $app = new Bootstrap();
        ?>
    </section>


<?php
    require_once(__DIR__ . '/templates/footer.php');
?>