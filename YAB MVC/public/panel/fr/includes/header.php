	<div class="mainwrapper">
		<div class="header">
			<div class="logo">
				<a href="<?php echo $this::getAdminURL();?>" style="color:#ffffff">
					<div><h3>TITIRE ICI !</h3></div>
					<div><h5>LOGO ICI !</h5></div>
				</a>
			</div>
			<div class="headerinner">
				<ul class="headmenu">
					<li class="<?php if(!isset($request["REQUEST_URI"][0]) || isset($request["REQUEST_URI"][0]) && strcmp($request["REQUEST_URI"][0],"administrator")==0)echo "odd" ?>">
						<a href="<?php echo $this::getAdminURL();?>administrator" class="dropdown-toggle" data-toggle="" data-target="#">
							<span class="count patientcount"><?php $object=Models::getAdminObject();echo $object->getCount(); ?></span>
							<span class="head-icon head-users"></span>
							<span class="headmenu-label">Administrateur</span>
						</a>
					</li>
					<li class="right">
						<div class="userloggedinfo">
							<img src="<?php echo Functions::getDefaultURL(); ?>/upload/panel/images/admin-m.png" alt="" />
							<div class="userinfo">
								<h5 class="adminname"><?php $admin=Models::getAdminObject();echo $admin->getNameFromId($admin->getConnectedId()); ?></h5>
								<ul>
									<li><a href="<?php echo $this::getAdminURL(); ?>administrator">Profile</a></li>
									<li><a href="<?php echo $this::getAdminURL(); ?>login/logout">Déconnecter</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul><!--headmenu-->
			</div>
		</div>
		<a href="#myModal" data-toggle="modal" id="showEventForm" hidden></a>