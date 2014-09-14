<?php
	$pagename="administrator";
	$object=Models::getAdminObject();
?>
<div class="rightpanel">
	<ul class="breadcrumbs">
		<li><a href="<?php echo $adminO::getAdminDir(); ?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
		<li><a href="<?php echo $adminO::getAdminDir().$pagename; ?>">Liste des administrateurs</a></li>
	</ul>
	<div>
		<?php include Functions::getPublicFileURL(PAGE_LIST_SUBFOLDER.$pagename.".php")?>
	</div>
</div>
<script>
		function reload(){
			reloadLastProduct();
			reloadAdministrator();
			reloadHeader();
		}
</script>