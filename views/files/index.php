<!-- File View -->

<div id="ltk-wrapper" class="ltk-main-wrapper">
    <div class="ltk-header">
        <h1>Welcome to the Listrak Flat File Setup Wizard</h1>
    </div>
    <div class="ltk-body">
        
        <!-- Left 'Sidebar' Area -->
        <div id="ltk-left-content">
            <ul class="ltk-menu-list">
                <li class="ltk-menu-list-item selected" ltk-item-id="products">Products</li>
                <li class="ltk-menu-list-item" ltk-item-id="orders">Orders</li>
                <li class="ltk-menu-list-item" ltk-item-id="orderitems">Orderitems</li>
            </ul>
            <ul class="ltk-menu-buttons">
                <li class="ltk-menu-button">
                    <input type="button" id="btnNew" class="ltk-menu-btn" value="New" />
                </li>
                <li class="ltk-menu-button">
                    <input type="button" id="btnDelete" class="ltk-menu-btn ltk-del-button" value="Delete" />
                </li>
            </ul>
        </div>
        
        <!-- Right 'Form' Area -->
        <div id="ltk-right-content">
            
        </div>
    </div>
    <div class="ltk-buttons">
        <!--<input type="button" class="ltk-btn-right" value="Continue" onclick="window.location = 'index.php?step=1';" />-->
        <a href="<?php echo URL; ?>complete" class="ltk-btn-right">Continue</a> 
    </div>
    <div style="clear:both;"></div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.ltk-nav-item').each(function(index){
            if(index == 3) {
                jQuery(this).addClass('ltk-active-item');
            } else {
                jQuery(this).removeClass('ltk-active-item');
            }
        });        
    });
</script>