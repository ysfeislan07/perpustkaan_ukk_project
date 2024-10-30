<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Loans</strong> Book</h1>

		<div class="row">
			<div class="col">
				<?= $this->session->flashdata('message') ?>
			</div>
		</div>
		<form action="<?= base_url('menu/loansBook') ?>" method="post">
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
		<div class="row pinjam-buku">
			<?php foreach ($dataBook as $db) : ?>
				<div class="col-4">
					<a href="" class="move icon-move-right" data-bs-toggle="modal" data-bs-target="#modalDetailBuku<?= $db->book_id ?>">
						<div class="card">
							<div class="row">
								<div class="col-8">
									<div class="card-header">
										<h5 class="card-title mb-0"><?= $db->title ?></h5>
										<h5 class="card-text"><?= $db->name_categories ?></h5>
									</div>
									<div class="card-body">
										<p class="card-text text-black" style="font-size: 15px;">Tekan untuk melihat detail buku <?= $db->title ?></p>
									</div>
								</div>

								<div class="col-4">
									<img src="<?= base_url() ?>assets-template/gambar/<?= $db->image ?>" style="width: 155px; height: 210px;" alt="" class="rounded">
								</div>
							</div>
						</div>
					</a>
					<!-- modal -->
					<div class="modal fade" id="modalDetailBuku<?= $db->book_id ?>" tabindex="-1" aria-labelledby="modalDetailBukuLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalDetailBukuLabel"><?= $db->title ?></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-4">
											<img src="<?= base_url() ?>assets-template/gambar/<?= $db->image ?>" style="width: 260px; height: 370px;" alt="" class="rounded">
										</div>
										<div class="col-7 ms-3">
											<h4><b><?= $db->title ?></b></h4>
											<h5 class="text-muted">Tersedia : <b><?= $db->stok ?> Buku</b></h5>
											<h5>Categories : <b><?= $db->name_categories ?></b></h5>
											<h5>Writer : <b><?= $db->writer ?></b></h5>
											<h5>Publisher : <b><?= $db->publisher ?></b></h5>
											<h5>Publication Year : <b><?= $db->publication_year ?></b></h5>
											<h5>Describe : <b><?= $db->describe_book ?></b></h5>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
									<a href="<?= base_url() ?>user/addCollections/<?= $db->book_id ?>" class="btn btn-info" onclick="showSwalCollections(event)"><i data-feather="heart"></i></a>
									<a href="<?= base_url() ?>user/loansBook/<?= $db->book_id ?>/<?= $this->session->userdata('users_id') ?>"
										class="btn btn-primary"
										onclick="showSwalLoans(event)">
										Pinjam Buku
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- end modal -->
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</main>