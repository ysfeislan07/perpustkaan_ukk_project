
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome!</h1>
							<p class="lead">
								Input your email & password to acces your session
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<?= $this->session->flashdata('message') ?>
								<div class="m-sm-3">
									<form action="<?= base_url('auth') ?>" method="post">
										<div class="mb-3">
											<label class="form-label">Full name</label>
											<input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your email" value="<?= set_value('email') ?>" />
                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit"class="btn btn-lg btn-primary">Sign In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Dont have an account? <a href="<?= base_url('auth/register') ?>">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>