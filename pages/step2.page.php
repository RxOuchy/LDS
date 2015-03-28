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
    <div class="ltk-body">
		<div class="ltk-field">
            <label>File Type:</label>
            <select id="filetype" name="filetype">
                <option value="">( Select One ... )</option>
                <option value="products">Product</option>
                <option value="orders">Order</option>
                <option value="orderitems">Order Item</option>
                <option value="customers">Customer</option>
                <option value="other">Other...</option>
            </select>
        </div>
        <div class="ltk-field">
            <label>Other:</label>
            <input type="text" id="other_desc" name="other_desc" />
        </div>
        <div class="ltk-field">
            <label>Table:</label>
            <select id="table" name="table">
                <option value="">( Select One ... )</option>
                <option value="products">Product</option>
                <option value="orders">Order</option>
                <option value="orderitems">Order Item</option>
                <option value="customers">Customer</option>
                <option value="other">Other...</option>
            </select>
        </div>
        <div class="ltk-field">
            <label>Select All:</label>
            <input type="checkbox" id="select_all" name="select_all" checked="true" />
        </div>
    </div>
    <div class="ltk-buttons">
        <input type="button" class="ltk-btn-right" value="Continue" onclick="window.location = 'index.php?step=3';" />
    </div>
    <div style="clear:both;"></div>
</div>