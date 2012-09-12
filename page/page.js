// <![CDATA[
   document.observe('dom:loaded', function () {
		var newsCat = document.getElementsByClassName('newsCat');
		for (var i = 0; i < newsCat.length; i++) {
			$(newsCat[i].id).onclick = function () {
				getCatPage(this.id);
			}
		}
	});
	
	function getCatPage(id) {
		var url = 'load-content.php';
		var rand   = Math.random(9999);
		var pars   = 'id=' + id + '&rand=' + rand;
		var myAjax = new Ajax.Request( url, {method: 'get', parameters: pars, onLoading: showLoad, onComplete: showResponse} );
	}
	
	function showLoad () {
		$('newsContent').style.display = 'none';
		$('newsLoading').style.display = 'block';
	}
	
	function showResponse (originalRequest) {
		var newData = originalRequest.responseText;
		$('newsLoading').style.display = 'none';
		$('newsContent').style.display = 'block';		
		$('newsContent').innerHTML = newData;
	}
	// ]]>