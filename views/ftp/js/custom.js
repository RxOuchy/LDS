(function(){
    
    jQuery('#ltk-right-content').css('display','none');
    
    jQuery.get('ftp/getServerList', function(list) { 
        
        if (list.length > 0) {
            jQuery('#btnNew').parent().css({"display":"none","border": "0"});
        }
        
        for(var i = 0; i < list.length; i++ ) {
            jQuery('.ltk-menu-list').append('<li class="ltk-menu-list-item"><a href="#" ltk-item-id="' + list[i].name + '">' + list[i].name + '</a></li>');
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
    
    jQuery('#ltk-form').submit(function(){
        
        var data = jQuery(this).serialize();
        var url = jQuery(this).attr('action');
        jQuery.post(url, data, function(o){
            
        });
        
        return false;
    });
})();