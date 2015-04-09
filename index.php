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
        <div id="ltk-nav-content">
            <ul class="ltk-nav-items">
                <li class="ltk-nav-item"><a href="#">Introduction</a></li>
                <li class="ltk-nav-item"><a href="#">FTP Setup</a></li>
                <li class="ltk-nav-item"><a href="#">Datebase Setup</a></li>
                <li class="ltk-nav-item"><a href="#">File Export Setup</a></li>
                <li class="ltk-nav-item"><a href="#">Complete</a></li>
            </ul>
        </div>
        <?php
            $app = new Bootstrap();
            $app->init();
        ?>
    </section>


<?php
    require_once(__DIR__ . '/templates/footer.php');
?>