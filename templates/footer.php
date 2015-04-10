<?php

/**
 *     Listrak Flat File Setup Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */

?>
    </section>
    <div style="clear:both"></div>
    <div class="bottom-footer">
        <div class="bottom-footer-inner">
            <p>&copy; 2015 Listrak. All rights reserved.</p>
        <div style="clear:both"></div>
    </div>
    </div>

    <?php
        if (isset($this->js)) {
            foreach ( $this->js as $js ) {
                echo '<script src="' . URL . 'views/' . $js . '"></script>';
            }
        }
    ?>
</body>
</html>