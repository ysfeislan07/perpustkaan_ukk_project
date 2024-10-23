<main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Loans</strong> History</h1>

				<div class="row">
					<div class="col">
						<?= $this->session->flashdata('message') ?>
					</div>
				</div>
					<div class="row pinjam-buku" >
						<?php if(empty($dataLoansHistory)) : ?>
							<p>Not history loans book</p>
							<div class="col-4">
								<a href="<?= base_url('menu/loansBook') ?>" class="btn btn-success">Loans Now!</a>
							</div>
						<?php endif; ?>
						<?php foreach($dataLoansHistory as $dlh) : ?>
						<div class="col-4">
							<a href="" class="not-hover" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $dlh->rate_id ?>">
							<style>
								.not-hover:hover {
									text-decoration: none;
								}

								.not-hover {
									color: black;
								}
							</style>
							<div class="card">
								<div class="row">
									<div class="col-8">
										<div class="card-header">
											<h5 class="card-title mb-0"><?= $dlh->title ?></h5>
										</div>
										<div class="card-body mt-5">
										<?php if( $dlh->rate == 1) : ?>
											<span><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
										<?php elseif( $dlh->rate == 2) : ?>
											<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
										<?php elseif( $dlh->rate == 3) : ?>
											<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
										<?php elseif( $dlh->rate == 4) : ?>
											<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
										<?php elseif( $dlh->rate == 5) : ?>
											<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></span>
										<?php endif; ?>										
									</div>
									</div>

									<div class="col-4">
										<img src="<?= base_url() ?>assets-template/gambar/<?= $dlh->image ?>" style="width: 155px; height: 210px;" alt="" class="rounded">
									</div>
								</div>
							</div>
							<div class="modal fade" id="exampleModal<?= $dlh->rate_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Rate Book</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-6">
												<img src="<?= base_url() ?>assets-template/gambar/<?= $dlh->image ?>" alt="" style="width: 230px ;">
											</div>
											<div class="col-6">
												<h5>Title Book : <span class="text-primary"><?= $dlh->title ?></span></h5>
												<h5>Rate Book : 
												<?php if( $dlh->rate == 1) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif( $dlh->rate == 2) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif( $dlh->rate == 3) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif( $dlh->rate == 4) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif( $dlh->rate == 5) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></span>
												<?php endif; ?>	
												</h5>
												<h5>Text : <span class="text-primary"><?= $dlh->text ?></span></h5>
												<h5>Rate Date : <span class="text-primary"><?= $dlh->date ?></span></h5>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div>
									</div>
								</div>
								</div>
							</a>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</main>   