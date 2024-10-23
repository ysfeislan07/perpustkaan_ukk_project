<main class="content">
				<div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>Data</strong> Users</h1>

                <div class="row">
                    <div class="col">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                </div>
                <form action="<?= base_url('admin/dataActivityLoans') ?>" method="post">
                        <div class="row mb-3">
                        	<div class="col-3">
                                <select name="sortir" id="" class="form-control form-select">
                                    <option value="">Select Status</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="In Loans">In Loans</option>
                                    <option value="Finished">Finished</option>
                                    <option value="Assessed">Assessed</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-success">Apply</button>
                            </div>
                        </div>
                    </form>
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
                                                            <th class="d-none d-md-table-cell">Action</th>
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
                                                                <?php if($dlu->status == 'In Progress')  : ?>
                                                                    <a href="<?= base_url() ?>admin/accLoans/<?= $dlu->loans_id ?>/<?= $dlu->book_id ?>" class="btn btn-warning" onclick="return confirm('Are you sure to acc this loans?')"><i data-feather="check-square"></i></a>
                                                                <?php elseif($dlu->status == 'Accepted')  : ?>
                                                                    <a href="<?= base_url() ?>admin/accAlreadyLoans/<?= $dlu->loans_id ?>/<?= $dlu->book_id ?>" class="btn btn-success" onclick="return confirm('Are you sure to acc this loans?')"><i data-feather="check-circle"></i></a>
                                                                <?php elseif($dlu->status == 'In Loans')  : ?>
                                                                    <a href="<?= base_url() ?>admin/accFinishLoans/<?= $dlu->loans_id ?>/<?= $dlu->book_id ?>" class="btn btn-success" onclick="return confirm('Are you sure to acc this loans?')"><i data-feather="check-circle"></i></a>
                                                                <?php endif; ?>
                                                                <a href="<?= base_url() ?>admin/deleteLoans/<?= $dlu->loans_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i data-feather="trash"></i></a>
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