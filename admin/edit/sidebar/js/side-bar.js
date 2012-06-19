var isExtended = 0;

$(document).ready(function(){
	$("#sideBarTab").click(function(){
			$("#sideBarContents").animate({
				"width":"toggle"},{duration:1500,queue:true,easing:'swing'}
			);
			
			if(isExtended==0){
				$('#sideBarTab').html($('#sideBarTab').html().replace(/(\.[^.]+)$/, '-active$1'));
				isExtended++;
			}
			else{
				$('#sideBarTab').html($('#sideBarTab').html().replace(/-active(\.[^.]+)$/, '$1'));
				isExtended=0;
			}
		}
	);
});