		<script>
			init();
			function init(){
				jQuery(".reload").click(function(){reload();});
				jQuery("a").each(function(){if(jQuery(this).attr("href")=="#")jQuery(this).attr("href","javascript:;");});
			}reloadHeader(){
			}
		</script>
	</div>
</body>
</html>