<main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Data</strong> Book</h1>
                <div class="row">
					<div class="col">
						<?= $this->session->flashdata('message') ?>
					</div>
                    <form action="<?= base_url('admin/dataBook') ?>" method="post">
                        <div class="row mb-3">
                        	<div class="col-3">
                                <select name="sortir" id="" class="form-control form-select">
                                    <option value="">Select Categories</option>
									<?php foreach ($categories as $c) : ?>
                                    	<option value="<?= $c['name_categories'] ?>"><?= $c['name_categories'] ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-success">Apply</button>
                            </div>
                        </div>
                    </form>
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
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Book Add</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <?php echo form_open_multipart('admin/addBook'); ?>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Title:</label>
                                                                            <input type="text" name="title" class="form-control" id="recipient-name" placeholder="Enter title book">
                                                                            <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Categoires:</label>
                                                                            <select name="categories" id="" class="form-control form-select">
                                                                                <option value="">Select Categories</option>
                                                                                <?php foreach($categories as $c) : ?>
                                                                                    <option value="<?= $c['categories_id'] ?>"><?= $c['name_categories'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <?= form_error('categories' , '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Image:</label>
																	        <input type="file" name="image" class="form-control" size="20">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Writer:</label>
                                                                            <input type="text" name="writer" class="form-control" id="recipient-name" placeholder="Enter writer book">
                                                                            <?= form_error('writer', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Publisher:</label>
                                                                            <input type="text" name="publisher" class="form-control" id="recipient-name" placeholder="Enter publisher book">
                                                                            <?= form_error('publisher', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Publication Year:</label>
                                                                            <input type="text" name="publication_year" class="form-control" id="recipient-name" placeholder="Enter publication year book">
                                                                            <?= form_error('publication_year', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label">Stok:</label>
                                                                            <input type="text" name="stok" class="form-control" id="recipient-name" placeholder="Enter stok book">
                                                                            <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="message-text" class="col-form-label">Describe Book:</label>
                                                                            <textarea class="form-control" name="describe_book" id="message-text" placeholder="Enter describe book"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add New Book</button>
                                                            </div>
                                                            <?php echo form_close(); ?>
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
                                                            <th>Title</th>
                                                            <th class="d-none d-xl-table-cell">Categories</th>
                                                            <th class="d-none d-xl-table-cell">Writer</th>
                                                            <th>Publisher</th>
                                                            <th class="d-none d-md-table-cell">Publication Years</th>
                                                            <th class="d-none d-md-table-cell">Stok</th>
                                                            <th class="d-none d-md-table-cell">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;  ?>
                                                        <?php foreach($dataBook as $db) : ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $db->title ?></td>
                                                            <td><?= $db->name_categories ?></td>
                                                            <td><?= $db->writer ?></td>
                                                            <td><?= $db->publisher ?></td>
                                                            <td><?= $db->publication_year ?></td>
                                                            <td><?= $db->stok ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBook<?= $db->book_id ?>"><i data-feather="edit"></i></a>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="editBook<?= $db->book_id ?>" tabindex="-1" aria-labelledby="editBookLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="editBookLabel">Edite Book</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <?php echo form_open_multipart('admin/editeBook/' . $db->book_id . '/' . $db->book_categories_id); ?>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Title:</label>
                                                                                            <input type="text" name="title" class="form-control" id="recipient-name" placeholder="Enter title book" value="<?= set_value('title', $db->title) ?>">
                                                                                            <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Categoires:</label>
                                                                                            <select name="categories" id="" class="form-control form-select">
                                                                                                <option value="">Select Categories</option>
                                                                                                <?php foreach($categories as $c) : ?>
                                                                                                    <option value="<?= $c['categories_id'] ?>" <?= ($c['name_categories'] == $db->name_categories) ? 'selected' : '' ?>><?= $c['name_categories'] ?></option>
                                                                                                <?php endforeach; ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <?= form_error('categories'), '<small class="text-danger">', '</small>' ?>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Image:</label>
                                                                                            <input type="file" name="image" class="form-control" size="20">
                                                                                            <input type="text" class="form-control" value="<?= $db->image ?>" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Writer:</label>
                                                                                            <input type="text" name="writer" class="form-control" id="recipient-name" placeholder="Enter writer book" value="<?= set_value('writer', $db->writer) ?>">
                                                                                            <?= form_error('writer', '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Publisher:</label>
                                                                                            <input type="text" name="publisher" class="form-control" id="recipient-name" placeholder="Enter publisher book" value="<?= set_value('publisher', $db->publisher) ?>">
                                                                                            <?= form_error('publisher', '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Publication Year:</label>
                                                                                            <input type="text" name="publication_year" class="form-control" id="recipient-name" placeholder="Enter publication year book" value="<?= set_value('publication_year', $db->publication_year) ?>">
                                                                                            <?= form_error('publication_year', '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="recipient-name" class="col-form-label">Stok:</label>
                                                                                            <input type="text" name="stok" class="form-control" id="recipient-name" placeholder="Enter stok book" value="<?= set_value('stok', $db->stok) ?>">
                                                                                            <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="message-text" class="col-form-label">Describe Book:</label>
                                                                                            <textarea class="form-control" name="describe_book" id="message-text" placeholder="Enter describe book"><?= $db->describe_book ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Edite Book</button>
                                                                            </div>
                                                                            <?php echo form_close(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            <a href="<?= base_url() ?>admin/deleteBook/<?= $db->book_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i data-feather="trash"></i></a>
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