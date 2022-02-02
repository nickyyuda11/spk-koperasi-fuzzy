<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		<!-- TopBar -->
		<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
			<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="ml-2 d-none d-lg-inline text-white small"><?= $user['nama_lengkap']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('client/myaccount'); ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" data-toggle="modal" data-target="#logout" id="#myBtn">
							<i class="fas fa-fw fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							<span>Logout</span>
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- Topbar -->
