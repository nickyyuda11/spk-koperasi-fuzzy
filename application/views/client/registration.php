<div class="container">
	<div class="col-lg-7 mx-auto">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
							</div>
							<?php echo form_open('client/registration'); ?>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
							</div>
							<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
							<div class="form-group">
								<input type="username" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
								<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" name="password1" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
									<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>
							<?php echo form_close(); ?>
							<hr>
							<div class="text-center">
								<a class="small" href="<?= base_url('client/login') ?>">Already have an account? Login!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
