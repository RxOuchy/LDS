(function(){
    
    jQuery('#ltk-right-content').css('display','none');
    
    var getServerList = function() {
        jQuery.get('ftp/getServerList', function(list) { 

            if (list.length > 0) {
                jQuery('#btnNew').parent().css({"display":"none","border": "0"});
            }

            jQuery('.ltk-menu-list').empty();

            for(var i = 0; i < list.length; i++ ) {
                jQuery('.ltk-menu-list').append('<li class="ltk-menu-list-item"><a href="javascript:void();" ltk-item-id="' + list[i].name + '">' + list[i].name + '</a></li>');
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
                jQuery.post('ftp/getDataByName', {'name': name }, function(data) {

                    jQuery('form input[type=text]').each(function() {
                       var id = jQuery(this).attr('name');
                       jQuery(this).val(data[id]);
                    });

                }, 'json');

                //Delete the item
                jQuery('#btnDelete').click(function(){
                    jQuery.post('ftp/deleteNodeByName', name, function(o){
                        alert(name);
                    });
                });

            });

        }, 'json');
    };
    
    jQuery(document).ready(function(){
        getServerList();
    });
    
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
            
        }, 'json');
        
        return false;
    });
})();