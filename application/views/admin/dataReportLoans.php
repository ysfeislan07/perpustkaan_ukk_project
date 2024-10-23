<main class="content">
				<div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>Report</strong> Loans</h1>

                <div class="row">
                    <div class="col">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                </div>
                    <form action="<?= base_url('admin/reportLoans') ?>" method="post">
                        <div class="row">
                            <div class="col-3 mb-3">
                                <select name="report" id="" class="form-control form-select">
                                    <option value="">Select</option>
                                    <option value="Today">Today</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
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
                                
                                    
								</div>
								<div class="card-body">
                                <div class="row">
                                        <div class="col">
                                            <h4 class="btn btn-secondary">Count Data : <?= $count ?></h4>
                                        </div>
                                    </div>
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
                                                        <?php foreach($dataHistoryLoans as $dlu) : ?>
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