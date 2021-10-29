 // Image Uploading js
jQuery('#file').change(function () {
    for (var i=0, len = this.files.length; i < len; i++) {
        (function (j, self) {
            var reader = new FileReader()
            reader.onload = function (e) {
                jQuery('.uploadimages ul').append('<li><img src="' + e.target.result + '" width="100"></li>')
				//alert(self.files[j].name);
            }
            reader.readAsDataURL(self.files[j])
        })(i, this);
    }
});


jQuery('#submit-form').submit(function() {
    jQuery('.ajax-loader').css('display', 'block');
	jQuery('.ajax-loader').css('text-align', 'center');
		jQuery('.ajax-loader').css('color', 'green');
	jQuery('.ajax-loader').css('position', 'absolute');
	jQuery('.ajax-loader').css('left', '40%');
	jQuery('.ajax-loader').css('bottom', '80px');
	jQuery('.jFiler-input-dragDrop').css('pointer-events', 'none');

});

// Tooltip js 

jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();
	 jQuery('.green').css('cursor','pointer');
});


// count form field child add class
var counts = jQuery(".advanced-filter-m form").children().length;
if(counts === 4 || counts === 7 || counts === 10 || counts === 13)
{
	jQuery('.advanced-filter-m form').addClass('button-layout');
}


