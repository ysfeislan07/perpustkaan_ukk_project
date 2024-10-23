<main class="content">
				<div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>Data</strong> Users</h1>
                <div class="row">
					<div class="col">
						<?= $this->session->flashdata('message') ?>
					</div>
				</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                    <div class="row">
                                        <div class="col-3">
                                            <button class="btn btn-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Users Add</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="<?= base_url('admin/addUsers') ?>" method="post">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter name users">
                                                                            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Users:</label>
                                                                            <input type="text" name="username" class="form-control" id="recipient-name" placeholder="Enter username users">
                                                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                                                            <input type="email" name="email" class="form-control" id="recipient-name" placeholder="Enter email users">
                                                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Password:</label>
                                                                            <input type="password" name="password" class="form-control" id="recipient-name" placeholder="Enter password users">
                                                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add New Users</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end -->
                                        </div>
                                    </div>
								</div>
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-12 d-flex">
                                            <div class=" flex-fill">
                                                <table class="table table-hover my-0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th class="d-none d-xl-table-cell">Username</th>
                                                            <th class="d-none d-xl-table-cell">Email</th>
                                                            <th>Role</th>
                                                            <th class="d-none d-md-table-cell">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach($dataUsers as $du) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $du['name'] ?></td>
                                                            <td><?= $du['username'] ?></td>
                                                            <td><?= $du['email'] ?></td>
                                                            <td><span class="badge bg-success"><?= $du['role'] ?></span></td>
                                                            <td>
                                                                <a href="" class="btn btn-warning" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUsers<?= $du['users_id'] ?>"><i data-feather="edit"></i></a>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="editUsers<?= $du['users_id'] ?>" tabindex="-1" aria-labelledby="editUsers" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="editUsers">Edite Users</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="<?= base_url() ?>admin/editeUsers/<?= $du['users_id'] ?>" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                                                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter name users" value="<?= $du['name'] ?>">
                                                                                            <?= form_error('name' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Username:</label>
                                                                                            <input type="text" name="username" class="form-control" id="recipient-name" placeholder="Enter name users" value="<?= $du['username'] ?>">
                                                                                            <?= form_error('username' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                                                                            <input type="email" name="email" class="form-control" id="recipient-name" placeholder="Enter email users" value="<?= $du['email'] ?>">
                                                                                            <?= form_error('email' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Password:</label>
                                                                                            <input type="password" name="password" class="form-control" id="recipient-name" placeholder="Enter password users" value="<?= $du['password'] ?>">
                                                                                            <?= form_error('password' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Edite Users</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->
                                                                <a href="<?= base_url() ?>admin/deleteUsers/<?= $du['users_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i data-feather="trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>