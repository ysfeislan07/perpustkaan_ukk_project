<main class="content">
				<div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>Data</strong> Staff</h1>
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
                                            <!-- Button trigger modal -->

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Staff Add</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="<?= base_url('admin/addStaff') ?>" method="post">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter name staff">
                                                                            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Username:</label>
                                                                            <input type="text" name="username" class="form-control" id="recipient-name" placeholder="Enter username staff">
                                                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                                                            <input type="email" name="email" class="form-control" id="recipient-name" placeholder="Enter email staff">
                                                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Password:</label>
                                                                            <input type="password" name="password" class="form-control" id="recipient-name" placeholder="Enter password staff">
                                                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add New Staff</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                        <?php foreach($dataStaff as $ds) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $ds['name'] ?></td>
                                                            <td><?= $ds['username'] ?></td>
                                                            <td><?= $ds['email'] ?></td>
                                                            <td><span class="badge bg-success"><?= $ds['role'] ?></span></td>
                                                            <td>
                                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAdmin<?= $ds['users_id'] ?>"><i data-feather="edit"></i></a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="editAdmin<?= $ds['users_id'] ?>" tabindex="-1" aria-labelledby="editAdminlabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="editAdminlabel">Edite Staff</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="<?= base_url() ?>admin/editeStaff/<?= $ds['users_id'] ?>" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                                                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter name staff" value="<?= $ds['name'] ?>">
                                                                                            <?= form_error('name' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Username:</label>
                                                                                            <input type="text" name="username" class="form-control" id="recipient-name" placeholder="Enter name staff" value="<?= $ds['username'] ?>">
                                                                                            <?= form_error('username' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                                                                            <input type="email" name="email" class="form-control" id="recipient-name" placeholder="Enter email staff" value="<?= $ds['email'] ?>">
                                                                                            <?= form_error('email' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Password:</label>
                                                                                            <input type="password" name="password" class="form-control" id="recipient-name" placeholder="Enter password staff" value="<?= $ds['password'] ?>">
                                                                                            <?= form_error('password' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Edite Staff</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->                                                                
                                                                <a href="<?= base_url() ?>admin/deleteStaff/<?= $ds['users_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i data-feather="trash"></i></a>
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