<?php
	$object=Models::getAdminObject();
?>
<div class="listecontainer">
	<div class="pageheader">
		<div class="pageicon"><span class="iconfa-group"></span></div>
		<div class="pagetitle "> 
			<h1>Liste des administrateurs</h1>
		</div>
	</div>
	<div class="maincontent">
		<div class="maincontentinner">
			<div class="headtitle">
				<div class="btn-group">
					<button class="btn add" data-url="<?php echo $adminO::getAdminURL().CURRENT_PAGE_NAME; ?>/ajax/add"><span class="iconfa-plus"></span> Ajouter</button>
				</div>
				<h4 class="widgettitle title-primary">Liste des administrateurs</h4>
			</div>
			<?php
				$object->fetchAllAdmins();
				if($object->getCount()>0){
			?>
			<table class="table table-bordered table-infinite" id="dyntable2">
				<colgroup>
					<col class="con0" style="align: center;" />
					<col class="con1" />
					<col class="con0" />
					<col class="con1" />
					<col class="con0" />
					<col class="con1" />
				</colgroup>
				<thead>
					<tr>
						<th class="head1 center">Date d'inscription</th>
						<th class="head0 center">Nom complet</th>
						<th class="head1 center">Login</th>
						<th class="head0 center">Profile</th>
						<th class="head1 center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php do{?>
					<tr class="gradeX">
						<td class="center"><strong><?php echo $object->getDate() ?></strong></td>
						<td><?php echo $object->getName() ?></td>
						<td><?php echo $object->getLogin() ?></td>
						<td class="center">
							<?php $value=$object->getProfile();if(strcmp($value,"super")==0){ ?>super Administrateur<?php }else{?>Utilisateur<?php }?>
						</td>
						<td class="center tools">
							<a href="#" class="edit" data-url="<?php echo $adminO::getAdminURL().CURRENT_PAGE_NAME;?>/ajax/edit/<?php echo $object->getId()?>" title="Modifier"><i class="iconsweets-create"></i></a>
							<a href="#" class="delete" data-url="<?php echo $adminO::getAdminURL().CURRENT_PAGE_NAME;?>/ajax/del/<?php echo $object->getId()?>" title="Supprimer"><i class="iconsweets-trashcan"></i></a>
						</td>
					</tr>
					<?php }while($object->isMore());?>
				</tbody>
			</table>
			<?php
				}else{
			?>
			<div class="alert alert-error" align="center"><strong>Aucune donnée trouvée !</strong></div>
			<?php }?>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo $adminO::getAdminDir(); ?>js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo $adminO::getAdminDir(); ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $adminO::getAdminDir(); ?>js/responsive-tables.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
		jQuery(".tools a").css("margin-right","5px");
        jQuery(".details").click(function(){
			window.location=jQuery(this).attr("data-url");
		});
        jQuery(".add , .edit, .facture").click(function(){
			eventForm="#showEventForm";
			load(jQuery(jQuery(eventForm).attr("href")),jQuery(this).attr("data-url"));
			jQuery(eventForm).click();
		});
        jQuery('.delete').click(function(event){
			url=jQuery(this).attr("data-url");
			jConfirm('Voulez vous supprimer le administrateur ?', 'Confirmation', function(resp) {
				if(resp){
					res=sendAjax(url);
					res.success(function(response){if(response=="1"){
						successDialog("Administrateur supprimé");setTimeout(function(){reload();},1000);}
					});
				}
			});
		});
		jQuery('#dyntable2').dataTable();
    });
	function reloadAdministrator(){
		load(jQuery(".listecontainer").parent(),"<?php echo $adminO::getAdminURL().CURRENT_PAGE_NAME;?>/ajax/list",function(){init();reloadsuccessDialog();});
	}
</script>