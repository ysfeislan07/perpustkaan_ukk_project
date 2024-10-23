<main class="content">
				<div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>Activity</strong> Loans</h1>

                <div class="row">
                    <div class="col">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                </div>
					<div class="row">
						<div class="col-12">
							<div class="card" style="min-height: 700px;">
								<div class="card-header">
                                    <div class="row">
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
                                                            <th class="d-none d-xl-table-cell">Username / Email</th>
                                                            <th class="d-none d-xl-table-cell">Author Acc</th>
                                                            <th>Loan Date</th>
                                                            <th>Return Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach($dataLoansUser as $dlu) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $dlu->title ?></td>
                                                            <td><?= $dlu->username ?> / <?= $dlu->email ?></td>
                                                            <td>
                                                                <?= $dlu->author_id ?>
                                                            </td>
                                                            <td><?= $dlu->loan_date ?></td>
                                                            <td><?= $dlu->return_date ?></td>
                                                            <td>
                                                                <?php if($dlu->status == 'In Progress')  : ?>
                                                                    <span class="badge bg-warning"><?= $dlu->status ?></span>
                                                                <?php elseif($dlu->status == 'Accepted')  : ?>
                                                                    <span class="badge bg-success"><?= $dlu->status ?></span>
                                                                <?php elseif($dlu->status == 'In Loans')  : ?>
                                                                    <span class="badge bg-danger"><?= $dlu->status ?></span>
                                                                <?php elseif($dlu->status == 'Finished')  : ?>
                                                                    <span class="badge bg-success"><?= $dlu->status ?></span>
                                                                <?php elseif($dlu->status == 'Assessed')  : ?>
                                                                    <span class="badge bg-info"><?= $dlu->status ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if($dlu->status == 'In Loans' && $dlu->extensions_id == 0) : ?>
                                                                    <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addExtensions<?= $dlu->loans_id ?>"><i class="fa-solid fa-clock-rotate-left"></i></a>
                                                                        <div class="modal fade" id="addExtensions<?= $dlu->loans_id ?>" tabindex="-1" aria-labelledby="addExtensionsLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="addExtensionsLabel">Add Extensions Day</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" action="<?= base_url() ?>user/addExtension/<?= $dlu->loans_id ?>/<?= $dlu->book_id ?>/<?= $dlu->users_id ?> ?>">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                                                                                    <input type="text" name="nama_lengkap" class="form-control" id="recipient-name" placeholder="Masukkan nama lengkap" value="<?= $dlu->title ?>" readonly>
                                                                                                    <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="recipient-name" class="col-form-label">Select day:</label>
                                                                                                    <select name="extensions" id="" class="form-control form-select">
                                                                                                        <option value="">Select day</option>
                                                                                                        <option value="1" <?= set_select('extensions','1') ?>>1 day</option>
                                                                                                        <option value="2" <?= set_select('extensions','2') ?>>2 day</option>
                                                                                                        <option value="3" <?= set_select('extensions','3') ?>>3 day</option>
                                                                                                        <option value="4" <?= set_select('extensions','4') ?>>4 day</option>
                                                                                                        <option value="5" <?= set_select('extensions','5') ?>>5 day</option>
                                                                                                    </select>
                                                                                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                                                                </div>
                                                                                            </div>																		
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Completed</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                            </div>
                                                                            </div>  
                                                                <?php endif; ?> 

                                                                <?php if($dlu->status == 'Finished' && $dlu->confirm_rate == 0) : ?>
                                                                    <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#rateBook<?= $dlu->loans_id ?>"><i class="fa-solid fa-star"></i></a>
                                                                        <div class="modal fade" id="rateBook<?= $dlu->loans_id ?>" tabindex="-1" aria-labelledby="rateBookLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="rateBookLabel">Rate Book</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" action="<?= base_url() ?>user/rateBook/<?= $dlu->loans_id ?>/<?= $dlu->book_id ?>/<?= $dlu->users_id ?> ?>">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                                                                                    <input type="text" name="nama_lengkap" class="form-control" id="recipient-name" placeholder="Masukkan nama lengkap" value="<?= $dlu->title ?>" readonly>
                                                                                                    <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="recipient-name" class="col-form-label">Select rate:</label>
                                                                                                    <select name="rate" id="" class="form-control form-select">
                                                                                                        <option value="">Select star</option>
                                                                                                        <option value="1" <?= set_select('rate','1') ?>>1</option>
                                                                                                        <option value="2" <?= set_select('rate','2') ?>>2</option>
                                                                                                        <option value="3" <?= set_select('rate','3') ?>>3</option>
                                                                                                        <option value="4" <?= set_select('rate','4') ?>>4</option>
                                                                                                        <option value="5" <?= set_select('rate','5') ?>>5</option>
                                                                                                    </select>
                                                                                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                                                                </div>
                                                                                            </div>	
                                                                                            <div class="col-12">
                                                                                            <div class="mb-3">
                                                                                                <label for="recipient-name" class="col-form-label">Text:</label>
                                                                                                <textarea name="text" id="" class="form-control"></textarea>
                                                                                                <?= form_error('text', '<small class="text-danger">', '</small>'); ?>
                                                                                            </div>
                                                                                        </div>																	
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Completed</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                            </div>
                                                                            </div>  
                                                                <?php endif; ?> 
                                                                <?php if($dlu->status == 'In Progress' || $dlu->status == 'Assessed') : ?>
                                                                <a href="<?= base_url() ?>user/deleteActivityLoans/<?= $dlu->loans_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i data-feather="trash"></i></a>
                                                                <?php endif; ?>
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