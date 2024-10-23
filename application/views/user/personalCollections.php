<main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Collections</strong> Book</h1>

				<div class="row">
					<div class="col">
						<?= $this->session->flashdata('message') ?>
					</div>
				</div>
					<div class="row pinjam-buku" >
						<?php if(empty($dataCollections)) : ?>
							<p>Not collections book</p>
						<?php endif; ?>
						<?php foreach($dataCollections as $dc) : ?>
						<div class="col-4">
							<div class="card">
								<div class="row">
									<div class="col-8">
										<div class="card-header">
											<h5 class="card-title mb-0"><?= $dc->title ?></h5>
										</div>
										<div class="card-body mt-5">
											<div class="row">
												<div class="col-3">
													<a href="<?= base_url() ?>user/deleteCollections/<?= $dc->collections_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa-solid fa-heart-circle-minus"></i></a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-4">
										<img src="<?= base_url() ?>assets-template/gambar/<?= $dc->image ?>" style="width: 155px; height: 210px;" alt="" class="rounded">
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</main>   