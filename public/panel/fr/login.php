<body class="loginpage">
	<div class="loginpanel">
		<div class="loginpanelinner">
			<div class="logo animate0 bounceIn">
				<div style="color:#ffffff">
					<div><h3>Sté ARENALUB S.A.R.L</h3></div>
					<div><h5>Bois & matériaux</h5></div>
				</div>
			</div>
			<form id="login" action="javascript:;" method="post" style="text-align:center">
				<div class="inputwrapper login-alert" style="display:none">
					<div class="alert alert-error">Nom d'utilisateur ou mot de passe non valide !</div>
				</div>
				<div class="inputwrapper login-success" style="display:none">
					<div class="alert alert-success">Vous serez rediriger <br />vers l'administration dans 3 seconds ......</div>
				</div>
				<div class="inputwrapper animate1 bounceIn">
					<input type="text" name="login" id="username" placeholder="Nom d'utilisateur" />
				</div>
				<div class="inputwrapper animate2 bounceIn">
					<input type="password" name="pass" id="password" placeholder="Mot de passe" />
				</div>
				<div class="inputwrapper animate3 bounceIn">
					<input type="hidden" name="action" value="login" />
					<button type="submit" name="submit">Se connecter</button>
				</div>
				
			</form>
		</div><!--loginpanelinner-->
	</div><!--loginpanel-->

	<div class="loginfooter">
		<p>&copy; 2014. <a href="https://www.facebook.com/xper.group" target="__blank" style="color:#222">XPER Group</a> All Right reserved</p>
	</div>
	<script type="text/javascript">
			jQuery("[class*='login-']").hide();
			jQuery("#login").submit(function(){
				jQuery("[class*='login-']").hide();
				var u = jQuery('#username').val();
				var p = jQuery('#password').val();
				if(u == '' || p == '') {
					jQuery('.login-alert').fadeIn();
					return false;
				}else{
					jQuery.ajax({
						type:'POST',
						url:'<?php echo $adminO::getAdminURL(); ?>login/ajax',
						data:jQuery("#login").serialize(),
						success:function(response){
									switch(response){
										case "1":jQuery(".login-alert").fadeIn();break;
										case "-1":jQuery(".login-alert").fadeIn();break;
										case "0":jQuery(".login-success").fadeIn();setTimeout(function(){window.location="<?php echo $adminO::getAdminURL(); ?>";},3000);break;
										default:jQuery("#error-technic").removeClass("hidden");
									}
								}
					});
				}
				return true;
			});
	</script>
</body>