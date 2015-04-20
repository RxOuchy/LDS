(function(){
    
    jQuery('#ltk-right-content').css('display','none');
    
    var getFileList = function() {
        jQuery.get('files/getFileList', function(list) { 

            jQuery('.ltk-menu-list').empty();

            for(var i = 0; i < list.length; i++ ) {
                jQuery('.ltk-menu-list').append('<li class="ltk-menu-list-item"><a href="javascript:void;" ltk-item-id="' + list[i].name + '">' + list[i].name + '</a></li>');
            }

            jQuery('.ltk-menu-list-item a').on('click', function(){

                //Show the delete button
                jQuery('#btnDelete').css('display','inline-block');
                
                //Hide the Save Text Just incase the click the item again after saving
                jQuery('.ltk-save-msg').css('display','none');

                var name = $(this).attr('ltk-item-id');

                //Show the Right Side on click
                jQuery('#ltk-right-content').css('display','table-cell');

                //Append the selected style
                jQuery('.ltk-menu-list-item a').parent().removeClass('selected');
                jQuery(this).parent().addClass('selected');

                //Get the form data from the selected item
                jQuery.post('files/getDataByName', {'name': name }, function(data) {

                    jQuery('form input[type=text]').each(function() {
                       var id = jQuery(this).attr('name');
                       jQuery(this).val(data[id]);
                    });

                }, 'json');

                //Delete the item
                jQuery('#btnDelete').click(function(){
                    jQuery.post('files/deleteNodeByName', name, function(o){
                        alert(name);
                    });
                });

            });

        }, 'json');
    };
    
    var getServerList = function() {
        jQuery('#ServerSelect').empty();
        jQuery('#ServerSelect').append('<option value="">Select a Server...</option>');
        jQuery.get('files/getServerList', function(data){
            for(var i = 0; i < data.length; i++) {
                jQuery('#ServerSelect').append('<option value="' + data[i].host + '">' + data[i].host + '</option>');
            }
        },'json');
        
    };
    
    var getDatabaseList = function(host) {
     
        jQuery('#DatabaseSelect').empty();
        jQuery('#DatabaseSelect').append('<option value="">Select a Database...</option>');
        jQuery.post('files/getDatabaseList', { 'host': host } , function(data) {
            for(var i = 0; i < data.length; i++) {
                jQuery('#DatabaseSelect').append('<option value="' + data[i].database + '">' + data[i].database + '</option>');
            }
        },'json');
        
    };
    
    var getTableListList = function(host, database) {
     
        jQuery('#TableSelect').empty();
        jQuery('#TableSelect').append('<option value="">Select a Table...</option>');
        jQuery.post('files/getTableList', { 'host': host, 'database': database } , function(data) {
            for(var i = 0; i < data.length; i++) {
                jQuery('#TableSelect').append('<option value="' + data[i].table + '">' + data[i].table + '</option>');
            }
        },'json');
        
    };
    
    var getFieldList = function(host,db,table) {
        
        jQuery('#IncrementalSelect').empty();
        jQuery('#IncrementalSelect').append('<option value="">Select an incremental data field...</option>');
        jQuery.post('files/getFieldList', { 'host': host, 'database': db, 'table': table }, function(data){
            jQuery('#LabelFieldList').show();
            jQuery('#TableFieldList').show();
            jQuery('#LabelIncrementalSelect').show();
            jQuery('#IncrementalSelect').show();
            for(var i = 0; i < data.length; i++) {
                jQuery('#FieldList').append('\
                                    <tr>\
                                        <td width="34px"><input type="checkbox" id="' + data[i].COLUMN_NAME + '" name="select" value="' + data[i].COLUMN_NAME + '" checked /></td>\
                                        <td width="125px">' + data[i].COLUMN_NAME + '</td>\
                                        <td>' + data[i].COLUMN_TYPE + '</td>\
                                    </tr>\
                                ');
                
                jQuery('#IncrementalSelect').append('<option value="' + data[i].COLUMN_NAME + '">' + data[i].COLUMN_NAME + '</option>');
            }
        },'json');
    };
    
    jQuery(document).ready(function(){
        getFileList();
        getServerList();
    });
    
    //New Server Logic
    jQuery('#btnNew').click(function(){
        jQuery('form').append('<input type="hidden" id="isNew" name="isNew" value="1" />');
        jQuery('#ltk-right-content').show();
        jQuery('#ltk-form')[0].reset();
        jQuery('#LabelFieldList').hide();
        jQuery('#TableFieldList').hide();
        jQuery('#LabelIncrementalSelect').hide();
        jQuery('#IncrementalSelect').hide();
    });
    
    jQuery('#ltk-form').submit(function(){
        
        var data = jQuery(this).serialize();
        var url = jQuery(this).attr('action');
        jQuery.post(url, data, function(o){
            
            //Show that we did save the form
            jQuery('.ltk-save-msg').css('display','inline-block');
            
            //Update the List
            getFileList();
            
            //The list item is now deselected so we need to hide the right side and delete button
            jQuery('#btnDelete').css('display','none');
            jQuery('#ltk-right-content').fadeOut(1500);
            
        }, 'json');
        
        return false;
    });
    
    //On Server Select Change
    jQuery('#ServerSelect').change(function() {
        var host = jQuery(this).val();
        getDatabaseList(host);
    });
    
    jQuery('#DatabaseSelect').change(function() {
        var host = jQuery('#ServerSelect').val();
        var db = jQuery(this).val();
        getTableListList(host, db);
    });
    
    jQuery('#TableSelect').change(function() {
        var host = jQuery('#ServerSelect').val();
        var db = jQuery('#DatabaseSelect').val();
        var table = jQuery(this).val();
        
        getFieldList(host,db,table);
    });
    
})();