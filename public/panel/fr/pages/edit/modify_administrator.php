	<div class="widgetbox box-inverse modal blue" id="modalparent">
		<form action="javascript:;" id="addform">
			<div class="row-fluid">
				<div class="span12">
					<div class="widgetbox">
						<h4 class="widgettitle">Modification de fiche administrateur <a class="close" hidden>&times;</a> <a class="minimize" hidden>&#8211;</a></h4>
						<?php if(isset($request["error"])){ ?>
							<div class="alert alert-error" align="center"><strong><?php echo $request["error"]; ?></strong></div>
						<?php } ?>
						<?php if(isset($request["noerror"]) && $request["noerror"]){  ?>
							<script>jQuery("#close").click();successDialog("Modification est efféctué avec succés");setTimeout(function(){reload();},2000);</script>
						<?php } ?>
						<div class="widgetcontent">
							<table class="table responsive">
								<tbody>
									<tr class="gradeA">
									<td><label>Nom complet<span class="oblg">(*)</span> :</label></td>
									<td><span class="field"><input type="text" name="<?php echo $value="name"?>" class="input-xlarge" placeholder="Nom" value="<?php if(isset($_REQUEST[$value])) echo $_REQUEST[$value]; ?>" /></span></td>
									<td><label>Profile <span class="oblg">(*)</span> :</label></td>
									<td>
										<span class="field">
											<select name="<?php echo $value="profile"?>" class="input-xlarge">
												<option value="<?php $label="Utilisateur";echo $option="admin"; ?>" <?php if(isset($_REQUEST[$value]) && strcmp($_REQUEST[$value],$option)==0) echo "selected"; ?>><?php echo $label ?></option>
												<option value="<?php $label="Super Administrateur";echo $option="super"; ?>" <?php if(isset($_REQUEST[$value]) && strcmp($_REQUEST[$value],$option)==0) echo "selected"; ?>><?php echo $label ?></option>
											</select>
										</span>
									</td>
								</tr>
								<tr class="gradeA">
									<td><label>Login <span class="oblg">(*)</span> :</label></td>
									<td><span class="field"><input type="text" name="<?php echo $value="login"?>" id="" class="input-xlarge" placeholder="login" value="<?php if(isset($_REQUEST[$value])) echo $_REQUEST[$value]; ?>" /></span></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="gradeA">
									<td><label>Ancien Mot de passe :</label></td>
									<td><span class="field"><input type="password" name="<?php echo $value="oldpass"?>" class="input-xlarge" value="<?php if(isset($_REQUEST[$value])) echo $_REQUEST[$value]; ?>" /></span></td>
									<td><label>Nouveau Mot de passe :</label></td>
									<td><span class="field"><input type="password" name="<?php echo $value="pass"?>" class="input-xlarge" value="<?php if(isset($_REQUEST[$value])) echo $_REQUEST[$value]; ?>" /></span></td>
								</tr>
									<tr class="gradeA">
										<td></td>
										<td></td>
										<td></td>
										<td style="text-align:right;" >
											<input type="hidden" name="submit" value="edit" />
											<button class="btn" id="close" data-dismiss="modal" aria-hidden="true">Annuler</button>
											<button type="submit" class="btn btn-primary edit">Modifier</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script>
		jQuery('#modalparent').css({"left":"40%","top":"15%"});
		jQuery("#addform").submit(function(){
			jQuery('#modalparent').parent().load('<?php echo $adminO::getAdminURL().CURRENT_PAGE_NAME;?>/ajax/edit/<?php echo $request["ID"] ?>',jQuery("#addform").serialize());
		});
	</script>