(function($) { $(document).ready(function() {

var arr = new Array("gf","df", "ef", "nf", "sf", "hp", "lc", "veg", "ve", "pal", "ket", "30", "qm", "org", "soy", "corn", "pesc", "lf", "mediterranean");

// HIDE ICONS NO LOAD DEPENDING ON STYLE 
	if ($('input[name=rk-css-style]:checked').val() == "4" || $('input[name=rk-css-style]:checked').val() == "5" || $('input[name=rk-css-style]:checked').val() == "6") {
		$(".rk-column-icon").hide();
		$(".recipe-key-icon").hide();
	}

// HIDE ICONS ON CLICK LOAD DEPENDING ON STYLE 
	$("input[name$='rk-css-style']").click(function() {
		if ($(this).val() === '4' || $(this).val() === '5' || $(this).val() === '6') {
			$(".rk-column-icon").hide();
			$(".recipe-key-icon").hide();
			$("[class^=recipe-key-icon-style3]").addClass('recipe-key-icon-style2');		
		} else {
			$(".rk-column-icon").show();
			$(".recipe-key-icon").show();
		}
    });

   // PAINT WPCOLORPICKER IN ADMIN DASH
   var arrdiet = new Array("gf","df", "ef", "nf", "sf", "hp", "lc", "veg", "ve", "pal", "ket", "30", "qm", "org", "soy", "corn", "pescetarian", "lf", "mediterranean");
   $.each(arrdiet,function(_i,value){
	   $('#rk-'+value+'-colorbk').wpColorPicker(); $('#rk-'+value+'-colorbkhv').wpColorPicker(); 
	   $('#rk-'+value+'-colorfont').wpColorPicker(); $('#rk-'+value+'-colorfonthv').wpColorPicker();
	   $('#rk-'+value+'-iconcolor').wpColorPicker();
   });

(function(e){e.fn.replaceTagName=function(t){var n=[],r=this.length;while(r--){var i=document.createElement(t),s=this[r],o=s.attributes;for(var u=o.length-1;u>=0;u--){var a=o[u];i.setAttribute(a.name,a.value)}i.innerHTML=s.innerHTML;e(s).after(i).remove();n[r]=i}return e(n)}})(window.jQuery);


}); //document.ready()

})(jQuery);