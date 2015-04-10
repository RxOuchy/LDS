<!-- Database View -->

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
            <form id="ltk-form" method="post" action="<?php echo URL; ?>database/PostFormData">
                <label for="ServerTextBox">Server:</label>
                <input type="text" id="ServerTextBox" name="host" class="ltk-text" tabindex="1"  />
                <label for="UsernameTextBox">Username:</label>
                <input type="text" id="UsernameTextBox" name="username" class="ltk-text" tabindex="2" />
                <label for="PasswordTextBox">Password:</label>
                <input type="text" id="PasswordTextBox" name="password" class="ltk-text" tabindex="3" />
                <label for="PortTextBox">Port:</label>
                <input type="text" id="PortTextBox" name="port" class="ltk-text" tabindex="4" value="3306" />
                <label for="DatabaseSelect">Database:</label>
                <select id="DatabaseSelect" name="database" tabindex="5" >
                    <option value="">Select your database...</option>
                    <option value="ee11410" selected>ee11410</option>
                    <option value="magento">magento</option>
                </select>
                <br />
                <input type="submit" id="SubmitButton" class="ltk-btn" value="Save" />
                <span class="ltk-save-msg">Saved...</span>
            </form>            
        </div>
    </div>
    <div class="ltk-buttons">
        <!--<input type="button" class="ltk-btn-right" value="Continue" onclick="window.location = 'index.php?step=1';" />-->
        <a href="<?php echo URL; ?>files" class="ltk-btn-right">Continue</a> 
    </div>
    <div style="clear:both;"></div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.ltk-nav-item').each(function(index){
            if(index == 2) {
                jQuery(this).addClass('ltk-active-item');
            } else {
                jQuery(this).removeClass('ltk-active-item');
            }
        });        
    });
</script>