<body id="page-top">
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('client/dashboard'); ?>">
				<div class="sidebar-brand-text mx-3">BUKA UANG</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" data-toggle="modal" data-target="#logout" id="#myBtn">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Logout</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<div class="version" id="version-ruangadmin"></div>
		</ul>
		<!-- Modal -->
		<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Logout</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Are you sure to Logout?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<a href="<?= base_url('admin/logout'); ?>" class="btn btn-primary">Yes</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Sidebar -->
