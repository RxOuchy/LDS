<?php

/**
 *     Listrak Flat File Instalation Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */
 
 ?>

<div id="ltk-wrapper" class="ltk-main-wrapper">
    <div class="ltk-header">
        <h1>Listrak Flat File Setup Wizard</h1>
    </div>
    <form method="post" action="index.php?step=2">
        <div class="ltk-body">
            <div class="ltk-field">
                <label>Database Server:</label>
                <input type="text" id="host" name="host" />
            </div>
            <div class="ltk-field">
                <label>User Name:</label>
                <input type="text" id="username" name="username" />
            </div>
    		<div class="ltk-field">
                <label>Password:</label>
                <input type="text" id="password" name="password" />
            </div>
            <div class="ltk-field">
                <label>Database:</label>
                <input type="text" id="database" name="database" />
            </div>
        </div>
        <div class="ltk-buttons">
            <input type="submit" class="ltk-btn-right" value="Continue" />
        </div>
    </form>
    <div style="clear:both;"></div>
</div>