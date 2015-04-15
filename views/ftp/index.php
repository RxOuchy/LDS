<!-- FTP View -->

<div id="ltk-wrapper" class="ltk-main-wrapper">
    <div class="ltk-header">
        <h1>Welcome to the Listrak Flat File Setup Wizard</h1>
    </div>
    <div class="ltk-body">
        
        <!-- Left 'Sidebar' Area -->
        <div id="ltk-left-content">
            <ul class="ltk-menu-list">             
            </ul>
            <ul class="ltk-menu-buttons">
                
            </ul>
        </div>
        
        <!-- Right 'Form' Area -->
        <div id="ltk-right-content">
            <form id="ltk-form" method="post" action="<?php echo URL; ?>ftp/PostFormData/">                
                <label for="UsernameTextBox">Username:</label>
                <input type="text" id="UsernameTextBox" name="username" class="ltk-text" tabindex="1" />
                <label for="PasswordTextBox">Password:</label>
                <input type="text" id="PasswordTextBox" name="password" class="ltk-text" tabindex="2" />
                <br />
                <input type="submit" id="SubmitButton" class="ltk-btn" value="Save" />
                <input type="hidden" name="name" value="Listrak" />
                <span class="ltk-save-msg">Saved...</span>
            </form>
        </div>
    </div>
    <div class="ltk-buttons">
        <!--<input type="button" class="ltk-btn-right" value="Continue" onclick="window.location = 'index.php?step=1';" />-->
        <a href="<?php echo URL; ?>database" class="ltk-btn-right">Continue</a> 
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