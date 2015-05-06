<!-- BEGIN: MAIN -->

<div class="breadcrumb">{PHP.L.fkbilling_title}</div>

<!-- BEGIN: ERROR -->
	<h4>{FK_TITLE}</h4>
	{FK_ERROR}
	
	
	<!-- IF {FK_REDIRECT_URL} -->
	<br/>
	<p class="small">{FK_REDIRECT_TEXT}</p>
	<script>
		$(function(){
			setTimeout(function () {
				location.href='{FK_REDIRECT_URL}';
			}, 5000);
		});
	</script>
	<!-- ENDIF -->
<!-- END: ERROR -->


<!-- END: MAIN -->