<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<div class="row">
				<div class="col-3">
					<h1 class="h3 mb-3"><strong>Profile</strong> Users</h1>
				</div>
				<div class="col-5 ">

				</div>
			</div>
			<!-- <div class="row">
				<div class="col text-center">
					<?= $this->session->flashdata('message') ?>
				</div>
			</div> -->

		</div>
		<div class="row">
			<div class="col-3">
				<div class="card mb-3" style="min-height: 40px;">
					<div class="card-header">
						<h5 class="card-title mb-0">Profil Detail</h5>
					</div>
					<div class="card-body text-center">
						<img src="<?= base_url() ?>assets-template/static/img/avatars/user.png" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
						<form action="">
							<div class="form-edit">

							</div>
						</form>
						<h5 class="card-title mb-2"><?= $users['name'] ?></h5>
					</div>
					<hr class="my-0" />

					<hr class="my-0" />
					<div class="card-body">
						<h5 class="h6 card-title text-center">About</h5>
						<ul class="list-unstyled mb-0">
							<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Address <a href="#"><?= $users['address'] ?></a></li>
							<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> No. Telp <a href="#"><?= $users['telp'] ?></a></li>
							<li class="mb-1"><span data-feather="mail" class="feather-sm me-1"></span> Email <a href="#"><?= $users['email'] ?></a></li>
						</ul>
					</div>
					<hr class="my-0" />

				</div>
			</div>

			<div class="col-9">
				<div class="card ">
					<div class="card-header">
						<div class="row">
							<div class="col-5">
								<h5 class="card-title mb-0">Biodata</h5>
							</div>

						</div>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>user/editProfile/<?= $users['users_id'] ?>" method="post">
							<div class="row">
								<div class="col-6 mb-2">
									<label for="recipient-name" class="col-form-label">Name:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter your name #" value="<?= set_value('name', $users['name']) ?>">
									<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="col-6 mb-2">
									<label for="recipient-name" class="col-form-label">Username:</label>
									<input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?= set_value('username', $users['username']) ?>">
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="col-6 mb-2">
									<label for="recipient-name" class="col-form-label">Email:</label>
									<input type="text" class="form-control" placeholder="Enter your email" value="<?= $users['email'] ?>" readonly>
								</div>
								<div class="col-6 mb-2">
									<label for="recipient-name" class="col-form-label">Telp:</label>
									<input type="text" name="telp" class="form-control" placeholder="Enter your number telp" value="<?= set_value('telp', $users['telp']) ?>">
									<?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="col-12 mb-2">
									<label for="recipient-name" class="col-form-label">Address:</label>
									<textarea name="address" id="" class="form-control" cols="10" rows="3" value="<?= $users['address'] ?>"><?= $users['address'] ?></textarea>
									<?= form_error('address', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="row mt-4">
									<div class="col-3">
										<button type="submit" class="btn btn-success px-4">Edit Profil</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>