(function(){
    
    jQuery('#ltk-right-content').css('display','none');
    
    var getServerList = function() {
        jQuery.get('database/getServerList', function(list) { 
            
            jQuery('.ltk-menu-list').empty();

            for(var i = 0; i < list.length; i++ ) {
                jQuery('.ltk-menu-list').append('<li class="ltk-menu-list-item"><a href="javascript:void();" ltk-item-id="' + list[i].database + '">' + list[i].database + '</a></li>');
            }

            jQuery('.ltk-menu-list-item a').on('click', function(){

                //Show the delete button
                jQuery('#btnDelete').css('display','inline-block');
                
                //Hide the Save Text Just incase the click the item again after saving
                jQuery('.ltk-save-msg').css('display','none');
                
                //Remove the isNew hidden element
                jQuery('#isNew').remove();

                var name = $(this).attr('ltk-item-id');

                //Show the Right Side on click
                jQuery('#ltk-right-content').css('display','table-cell');

                //Append the selected style
                jQuery('.ltk-menu-list-item a').parent().removeClass('selected');
                jQuery(this).parent().addClass('selected');

                //Get the form data from the selected item
                jQuery.post('database/getDataByDatabase', {'database': name }, function(data) {

                    jQuery('form input[type=text], form select').each(function() {
                       var id = jQuery(this).attr('name');
                       jQuery(this).val(data[id]);
                    });

                }, 'json');

                //Delete the item
                jQuery('#btnDelete').click(function(){
                    jQuery.post('database/deleteElement', { 'database': name }, function(o){
                        getServerList();
                    });
                    return false;
                });

            });

        }, 'json');
    
    };
    
    //Call the serverList after the page loads;
    jQuery(document).ready(function(){
        getServerList();
    });
    
    //New Server Logic
    jQuery('#btnNew').click(function(){
        jQuery('form').append('<input type="hidden" id="isNew" name="isNew" value="1" />');
        jQuery('#ltk-right-content').show();
        jQuery('#ltk-form')[0].reset();
    });
    
    //Submit the form Data
    jQuery('#ltk-form').submit(function(){
        
        
        var data = jQuery(this).serialize();
        var url = jQuery(this).attr('action');
        
        jQuery.post(url, data, function(o){
            //Show that we did save the form
            jQuery('.ltk-save-msg').css('display','inline-block');
            
            //Update the List
            getServerList();
            
            //The list item is now deselected so we need to hide the right side and delete button
            jQuery('#btnDelete').css('display','none');
            jQuery('#ltk-right-content').fadeOut(1500);
        });
        
        return false;
    });
    
})();