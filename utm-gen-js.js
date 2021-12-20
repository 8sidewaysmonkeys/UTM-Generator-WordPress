jQuery(function(){
    var thisUrl = jQuery('#thisUrl').html();

    console.log('whatup');

    jQuery('#getUTM').on('click', function(){
        
        if(jQuery('#name').val() == '' && jQuery('#id').val() == ''){
            jQuery('#outputBox').html('<div class="bg-danger text-white p-2">Please fill in either Campaign Name or Campaign ID</div>');
        }else{

            var name = jQuery('#name').val();
            var id = jQuery('#id').val(); 
            var source = jQuery('#source').val(); 
            var medium = jQuery('#medium').val();
            var term = jQuery('#term').val();
            var content = jQuery('#content').val();


            var finalOutput = thisUrl;
            if(finalOutput.indexOf('?') > 0){
                finalOutput += '&';
            }else{
                finalOutput += '?';
            }

            finalOutput += 'utm_source='+encodeURIComponent(source).replace(/%20/g, "+");
            finalOutput += '&utm_medium='+encodeURIComponent(medium).replace(/%20/g, "+");
            if(name != ''){
                finalOutput += '&utm_name='+encodeURIComponent(name).replace(/%20/g, "+");
            }
            if(id != ''){
                finalOutput += '&utm_id='+encodeURIComponent(id).replace(/%20/g, "+");
            }
            if(term != ''){
                finalOutput += '&utm_term='+encodeURIComponent(term).replace(/%20/g, "+");
            }
            if(content != ''){
                finalOutput += '&utm_content='+encodeURIComponent(content).replace(/%20/g, "+");
            }
            jQuery('#outputBox').html(finalOutput.toLowerCase());
        }
    });

    
});