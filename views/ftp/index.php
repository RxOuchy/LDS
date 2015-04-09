<div id="ltk-wrapper" class="ltk-main-wrapper">
    <div class="ltk-header">
        <h1>Welcome to the Listrak Flat File Setup Wizard</h1>
    </div>
    <div class="ltk-body">
        
        <!-- Left 'Sidebar' Area -->
        <div id="ltk-left-content">
            <ul class="ltk-menu-list">
                <li class="ltk-menu-list-item selected" ltk-item-id="GhostSector">GhostSector</li>
                <li class="ltk-menu-list-item" ltk-item-id="Listrak">Listrak</li>                
            </ul>
        </div>
        
        <!-- Right 'Form' Area -->
        <div id="ltk-right-content">
            <form id="ltk-form" method="post" action="#">
                <label for="NameTextBox">Name:</label>
                <input type="text" id="NameTextBox" class="ltk-text" tabindex="1" value="GhostSector" />
                <label for="HostTextBox">Host:</label>
                <input type="text" id="HostTextBox" class="ltk-text" tabindex="2" value="ftp.ghostsector.com" />
                <label for="UsernameTextBox">Username:</label>
                <input type="text" id="UsernameTextBox" class="ltk-text" tabindex="3" value="listrak" />
                <label for="PasswordTextBox">Password:</label>
                <input type="text" id="PasswordTextBox" class="ltk-text" tabindex="4" value="listrak" />
                <br />
                <input type="submit" id="SubmitButton" class="ltk-btn" value="Save" />
            </form>
        </div>
    </div>
    <div class="ltk-buttons">
        <!--<input type="button" class="ltk-btn-right" value="Continue" onclick="window.location = 'index.php?step=1';" />-->
        <a href="<?php echo URL; ?>ftp" class="ltk-btn-right">Continue</a> 
    </div>
    <div style="clear:both;"></div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.ltk-nav-item').each(function(index){
            if(index === 1) {
                jQuery(this).addClass('ltk-active-item');
            } else {
                jQuery(this).removeClass('ltk-active-item');
            }
        });        
    });
</script>