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
    require_once('includes/include.index.php');
    
    initDB();
    
?>

    <section id="content">
        
        <?php
            
            $sql = "select TABLE_NAME,COLUMN_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
                        from information_schema.key_column_usage
                        where constraint_schema = 'ee11410'
                        and REFERENCED_COLUMN_NAME IS NOT NULL";
            $res = $conn->query($sql);
            echo "<pre>";
            print_r($res->fetch_row());
            
            
            if(is_object($conn)) {
                echo 'Yes';
            } else {
                echo 'No';
            }
            
        ?>

    </section>


<?php
    require_once('templates/footer.php');
?>