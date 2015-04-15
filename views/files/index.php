<!-- File View -->

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
            <form id="ltk-form" method="post" action="<?php echo URL; ?>files/PostFormData">
                <label for="ServerSelect">Server:</label>
                <select id="ServerSelect" name="server" tabindex="1">
                    <option value="">Select a Server...</option>
                </select>
                <label for="DatabaseSelect">Database:</label>
                <select id="DatabaseSelect" name="database" tabindex="2">
                    <option value="">Select a Database...</option>
                </select>
                <label for="TableSelect">Table:</label>
                <select id="TableSelect" name="table" tabindex="3">
                    <option value="">Select a Table...</option>
                </select>
                <label for="FieldSelect">Fields:</label>
                <table border="1" cellpadding="0" cellspacing="0" width="71%">
                    <tr style="background-color: grey;">
                        <td width="30px">
                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                        </td>
                        <td width="125px">
                            Field
                        </td>
                        <td>
                            Data Type
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="height: 133px; overflow: auto; width: 100%;">
                                <table border="1" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="30px">
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td width="125px">
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="chkAll" name="select" value="all" checked />
                                        </td>
                                        <td>
                                            Field
                                        </td>
                                        <td>
                                            Data Type
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <label for="IncrementalSelect">Incremental Field:</label>
                <select id="IncrementalSelect" name="key" tabindex="5">
                    <option value="">Select an incremental data field...</option>
                    <option value="modifiedDate">modifiedDate</option>
                    <option value="autoIncrement">Auto Incrementing Primary Key</option>
                </select>
                <br />
                <input type="submit" id="SubmitButton" class="ltk-btn" value="Save" />
                <span class="ltk-save-msg">Saved...</span>
            </form> 
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