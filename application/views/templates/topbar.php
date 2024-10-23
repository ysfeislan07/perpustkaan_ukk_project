

<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
					<li class="nav-item dropdown">
						<?php if($this->session->userdata('role') == 'Users'): ?>
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator"><?= $loansInProgress + $loansAcc  ?></span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									<?= $loansInProgress + $loansAcc ?> New Notification
								</div>
								<?php if($loansInProgress + $loansAcc == 0): ?>
									<p class="m-2">Not have notifications yet.</p>
								<?php endif; ?>
								<div class="list-group">
									<?php foreach($dataLoansUser as $dap) : ?>
										<?php if($dap->status == 'Accepted') : ?>
											<a href="#" class="list-group-item">
												<div class="row g-0 align-items-center">
													<div class="col-2">
														<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->image ?>" style="width: 50pxpx; height: 70px;" alt="">
													</div>
													<div class="col-7 ms-2">
														<div class="text-dark"><?= $dap->title ?></div>
														<div class="text-muted small mt-1">Book in your progress already accepted by Admin<i data-feather="check-circle"></i> in page <strong>Activity loans </strong></div>
														<!-- <div class="text-muted small mt-1">30m ago</div> -->
													</div>
													<div class="col-2 text-end">
														<i class="text-primary" data-feather="bell"></i>
													</div>
												</div>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>

									<?php foreach($dataLoansUser as $dap) : ?>
										<?php if($dap->status == 'In Loans' ) : ?>
											<a href="#" class="list-group-item">
												<div class="row g-0 align-items-center">
													<div class="col-2">
														<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->image ?>" style="width: 50pxpx; height: 70px;" alt="">
													</div>
													<div class="col-7 ms-2">
														<div class="text-dark"><?= $dap->title ?></div>
														<div class="text-muted small mt-1">Book already you taken and you loans</div>
														<!-- <div class="text-muted small mt-1">30m ago</div> -->
													</div>
													<div class="col-2 text-end">
														<i class="text-danger" data-feather="alert-circle"></i>
													</div>
												</div>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>

				
								</div>
								<div class="dropdown-menu-footer">
									<!-- <a href="#" class="text-muted">Show all notifications</a> -->
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
			  <?php endif; ?>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="<?= base_url() ?>assets-template/static/img/avatars/user.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?= $users['name'] ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?= base_url('user/profile') ?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=  base_url('auth/logout') ?>">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>