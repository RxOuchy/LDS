<div id="ltk-wrapper" class="ltk-main-wrapper">
    <div class="ltk-header">
        <h1>Welcome to the Listrak Flat File Setup Wizard</h1>
    </div>
    <div class="ltk-body">
		<p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam faucibus ligula urna, in luctus purus convallis at. 
            Duis maximus magna et velit commodo, vitae vestibulum dui pulvinar. Etiam rhoncus metus ut convallis convallis. 
            Suspendisse quis ex vitae velit porta tempus. Pellentesque a purus erat. Etiam suscipit condimentum ex ut commodo. 
            Vivamus fringilla massa purus. Maecenas eu eros lorem. Cras at semper metus. Nunc condimentum venenatis metus, ac vulputate eros porta et. 
            Sed eros dolor, maximus eu hendrerit ut, dictum at sapien. Donec placerat augue non tellus convallis, nec lacinia orci lobortis. 
            Praesent eleifend purus tortor, quis tristique metus volutpat sit amet. Nulla ultrices, leo non faucibus mollis, 
            orci sapien molestie dui, eget aliquam felis nulla ac velit.
        </p>
        <p>
            Phasellus vehicula rutrum libero, vitae eleifend nunc mattis eget. Quisque luctus eros quis ipsum cursus, in imperdiet nisl ultricies. 
            Vivamus quam nulla, suscipit et justo quis, eleifend egestas felis. Praesent ut diam arcu. Duis magna nunc, dapibus vitae mi ut, sagittis mollis nunc. 
            In rhoncus, odio a pretium pulvinar, nunc velit bibendum libero, at varius urna felis sit amet tellus. Suspendisse quis vulputate augue. 
            Nullam et sapien sit amet est pretium varius eu at dui. Donec a mauris fringilla, placerat sem id, placerat quam. Sed at finibus nulla. 
            Etiam non augue sit amet diam sodales maximus quis vel purus.
        </p>
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
            if(index == 0) {
                jQuery(this).addClass('ltk-active-item');
            } else {
                jQuery(this).removeClass('ltk-active-item');
            }
        });        
    });
</script>