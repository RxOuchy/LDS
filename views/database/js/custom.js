(function(){
    
    jQuery('#ltk-right-content').css('display','none');
    
    jQuery.get('database/getServerList', function(list) { 
                
        for(var i = 0; i < list.length; i++ ) {
            jQuery('.ltk-menu-list').append('<li class="ltk-menu-list-item"><a href="#" ltk-item-id="' + list[i].database + '">' + list[i].database + '</a></li>');
        }
        
        jQuery('.ltk-menu-list-item a').on('click', function(){
            
            //Show the delete button
            if (list.length > 0) {
                jQuery('#btnDelete').css('display','inline-block');
            }
            
            var name = $(this).attr('ltk-item-id');
            
            //Show the Right Side on click
            jQuery('#ltk-right-content').css('display','table-cell');
            
            //Append the selected style
            jQuery('.ltk-menu-list-item a').parent().removeClass('selected');
            jQuery(this).parent().addClass('selected');
            
            //Get the form data from the selected item
            jQuery.post('database/getDataByDatabase', {'database': name }, function(data) {
                
                jQuery('form input[type=text]').each(function() {
                   var id = jQuery(this).attr('name');
                   jQuery(this).val(data[id]);
                });
                
            }, 'json');
            
            //Delete the item
            jQuery('#btnDelete').click(function(){
                jQuery.post('database/deleteNodeByName', name, function(o){
                    alert(name);
                });
            });
            
        });
        
    }, 'json');
    
    
    //Submit the form Data
    jQuery('#ltk-form').submit(function(){
        
        var data = jQuery(this).serialize();
        var url = jQuery(this).attr('action');
        jQuery.post(url, data, function(o){
            
        });
        
        return false;
    });
    
})();