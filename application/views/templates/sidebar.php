
<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="<?= base_url('menu') ?>">
          <span class="align-middle">myLibrary Inc.</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
                    <?php if($title == 'Dashboard') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>
						<a class="sidebar-link" href="<?= base_url('menu') ?>">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
                    <?php if($this->session->userdata('role') == 'Users') : ?>
                    
                    <?php if($title == 'Loans Book') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>                        
                    <a class="sidebar-link" href="<?= base_url('menu/loansBook') ?>">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Loans Book</span>
                        </a>
					</li>
                    <?php endif; ?>

					<li class="sidebar-header">
						User
					</li>

                    
                    <?php if($title == 'Profile') : ?>
					    <li class="sidebar-item active">
                    <?php else : ?>
					    <li class="sidebar-item">
                    <?php endif; ?>		
                    <a class="sidebar-link" href="<?= base_url('user/profile') ?>">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
                    </li>

                    <?php if($this->session->userdata('role') == 'Users') : ?>

                    <?php if($title == 'Activity Loans') : ?>
					    <li class="sidebar-item active">
                    <?php else : ?>
					    <li class="sidebar-item">
                    <?php endif; ?>		
                    <a class="sidebar-link" href="<?= base_url('user/activityLoans') ?>">
              <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Activity Loans</span>
            </a>
                    </li>

                    <?php if($title == 'Loans History') : ?>
					    <li class="sidebar-item active">
                    <?php else : ?>
					    <li class="sidebar-item">
                    <?php endif; ?>		
                    <a class="sidebar-link" href="<?= base_url('user/loansHistory') ?>">
              <i class="align-middle" data-feather="save"></i> <span class="align-middle">Loans History</span>
            </a>
                    </li>

                    <?php if($title == 'Personal Collections') : ?>
					    <li class="sidebar-item active">
                    <?php else : ?>
					    <li class="sidebar-item">
                    <?php endif; ?>		
                    <a class="sidebar-link" href="<?= base_url('user/personalCollections') ?>">
              <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Personal Collections</span>
            </a>
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Staff') : ?>
					<li class="sidebar-header">
						Master Data by Admin
					</li>

                    <?php if($title == 'Data Book') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>						
                    <a class="sidebar-link" href="<?= base_url('admin/dataBook') ?>">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Book</span>
            </a>
					</li>

                    <?php if($title == 'Data Categories') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>								
                    <a class="sidebar-link" href="<?= base_url('admin/dataCategories') ?>">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Data Categories</span>
            </a>
					</li>

                    <?php if($this->session->userdata('role') == 'Staff') : ?>
                    <?php else : ?>
                    <?php if($title == 'Data Admin') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>						
                    <a class="sidebar-link" href="<?= base_url('admin/dataAdmin') ?>">
              <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Data Admin</span>
            </a>
					</li>
                    <?php endif; ?>

                    <?php if($title == 'Data Staff') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>								
                    <a class="sidebar-link" href="<?= base_url('admin/dataStaff') ?>">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Staff</span>
            </a>
					</li>

                    <?php if($title == 'Data Users') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>									
                    <a class="sidebar-link" href="<?= base_url('admin/dataUsers') ?>">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Users</span>
            </a>
					</li>

                    <?php endif;  ?>

					<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Staff') : ?>

					<li class="sidebar-header">
						Activity Users
					</li>

					<?php if($title == 'Data Activity Loans') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>									
                    <a class="sidebar-link" href="<?= base_url('admin/dataActivityLoans') ?>">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Activity Loans</span>
            </a>
					</li>

					<?php if($title == 'Report Loans') : ?>
					<li class="sidebar-item active">
                    <?php else : ?>
					<li class="sidebar-item">
                    <?php endif; ?>									
                    <a class="sidebar-link" href="<?= base_url('admin/reportLoans') ?>">
              <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Report Loans </span>
            </a>
					</li>

					<?php endif; ?>
				</ul>

			
			</div>
		</nav>