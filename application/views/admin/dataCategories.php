<main class="content">
				<div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>Data</strong> Categories</h1>
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
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Categories Add</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="<?= base_url('admin/addCategories') ?>" method="post">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Name Categories:</label>
                                                                            <input type="text" name="categories" class="form-control" id="recipient-name" placeholder="Enter name categories">
                                                                            <?= form_error('categories', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
    
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add New Categories</button>
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
                                                            <th class="d-none d-xl-table-cell">Name Categories</th>
                                                            <th class="d-none d-md-table-cell">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach($dataCategories as $dc) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $dc['name_categories'] ?></td>
                                                            <td>
                                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCategories<?= $dc['categories_id'] ?>"><i data-feather="edit"></i></a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="editCategories<?= $dc['categories_id'] ?>" tabindex="-1" aria-labelledby="editCategorieslabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="editCategorieslabel">Edite Categories</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form action="<?= base_url() ?>admin/editeCategories/<?= $dc['categories_id'] ?>" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Name Categories:</label>
                                                                                            <input type="text" name="categories" class="form-control" id="recipient-name" placeholder="Enter name staff" value="<?= $dc['name_categories'] ?>">
                                                                                            <?= form_error('categories' , '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                        
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Edite Categories</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->                                                                 
                                                                <a href="<?= base_url() ?>admin/deleteCategories/<?= $dc['categories_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i data-feather="trash"></i></a>
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