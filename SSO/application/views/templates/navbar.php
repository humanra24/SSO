<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>aplikasi">
				<div class="sidebar-brand-icon mt-5">
				<img src="http:\\localhost\sso\assets\img\sso.png" height="30" width="50" alt="">
				</div>
				<div class="sidebar-brand-text mx-3 mt-5"> SISTEM SSO</div>
			</a>
			

			<!-- Divider -->
			<hr class="sidebar-divider my-0 mt-5">

			<!-- Nav Item - Aplikasi -->
			<?php if ($this->session->userdata("level") == "Mahasiswa") : ?>
			<li class="nav-item <?php if ($judul == "Aplikasi | SSO") { echo "active"; } ?>">
				<a class="nav-link" href="<?= base_url(); ?>aplikasi">
					<i class="fas fa-fw  fa-tablet-alt"></i>
					<span>Aplikasi</span></a>
			</li>
			<?php endif; ?>
			<?php if ($this->session->userdata("level") == "Admin") : ?>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Data
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if ($judul == "Pengguna | SSO") { echo "active"; } ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
					aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-user"></i>
					<span>Pengguna</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Pengguna:</h6>
						<a class="collapse-item" href="<?= base_url(); ?>pengguna/index/Pegawai">Pegawai</a>
						<!-- <a class="collapse-item" href="<?= base_url(); ?>pengguna/index/Dosen">Dosen</a> -->
						<a class="collapse-item" href="<?= base_url(); ?>pengguna/index/Mahasiswa">Mahasiswa</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Mahasiswa
			</div>

			<!-- Nav Item - Charts -->
			<li class="nav-item <?php if ($judul == "Matkul | SSO") { echo "active"; } ?>">
				<a class="nav-link" href="<?= base_url('matkul'); ?>">
					<i class="fas fa-fw fa-folder"></i>
					<span>MataKuliah</span></a>
			</li>

			<!-- <li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-folder"></i>
					<span>Nilai</span></a>
			</li> -->

			<?php endif; ?>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<!-- <form
						class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form> -->

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->

						<!-- <li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a> -->

						<!-- Dropdown - Messages -->

						<!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Search for..." aria-label="Search"
											aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li> -->

						<!-- Nav Item - Alerts -->

						<!-- <li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bell fa-fw"></i> -->

						<!-- Counter - Alerts -->

						<!-- <span class="badge badge-danger badge-counter">3+</span>
							</a> -->

						<!-- Dropdown - Alerts -->

						<!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Alerts Center
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-file-alt text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 12, 2019</div>
										<span class="font-weight-bold">A new monthly report is ready to download!</span>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-success">
											<i class="fas fa-donate text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 7, 2019</div>
										$290.29 has been deposited into your account!
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 2, 2019</div>
										Spending Alert: We've noticed unusually high spending for your account.
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
							</div>
						</li> -->

						<!-- Nav Item - Messages -->

						<!-- <li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i> -->

						<!-- Counter - Messages -->

						<!-- <span class="badge badge-danger badge-counter">7</span>
							</a> -->

						<!-- Dropdown - Messages -->

						<!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Message Center
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
											alt="">
										<div class="status-indicator bg-success"></div>
									</div>
									<div class="font-weight-bold">
										<div class="text-truncate">Hi there! I am wondering if you can help me with a
											problem I've been having.</div>
										<div class="small text-gray-500">Emily Fowler · 58m</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
											alt="">
										<div class="status-indicator"></div>
									</div>
									<div>
										<div class="text-truncate">I have the photos that you ordered last month, how
											would you like them sent to you?</div>
										<div class="small text-gray-500">Jae Chun · 1d</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
											alt="">
										<div class="status-indicator bg-warning"></div>
									</div>
									<div>
										<div class="text-truncate">Last month's report looks great, I am very happy with
											the progress so far, keep up the good work!</div>
										<div class="small text-gray-500">Morgan Alvarez · 2d</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
											alt="">
										<div class="status-indicator bg-success"></div>
									</div>
									<div>
										<div class="text-truncate">Am I a good boy? The reason I ask is because someone
											told me that people say this to all dogs, even if they aren't good...</div>
										<div class="small text-gray-500">Chicken the Dog · 2w</div>
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
							</div>
						</li> -->

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
								<span
									class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata("nama") ?>
									<i class="fas fa-caret-down text-gray-400"></i>
								</span>

							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<!-- <a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Settings
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
									Activity Log
								</a>
								<div class="dropdown-divider"></div> -->

								<div class="dropdown-item" href="#">
								<?php
								date_default_timezone_set('Asia/Jakarta');
									$a = date ("H");
									if (($a>=6) && ($a<=11)){
									echo "<b>Selamat Pagi</b>";
									}
									else if(($a>11) && ($a<=15))
									{
									echo "<b> Selamat Siang </b>";}
									else if (($a>15) && ($a<=18)){
									echo "<b> Selamat Sore </b>";}
									else { echo "<b> Selamat Malam </b>";}
									?>
									<br>
									<br>
									<?= date('d-m-Y').' || ' ?>
									
									<span id="jamServer">
									<?php
									date_default_timezone_set('Asia/Jakarta');
									echo date('H:i:s');
									?>
									</span>
								</div>

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ingin Logout?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Tekan tombol "Logout" jika ingin keluar</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">
								Logout
								</a>								
							</div>
						</div>
					</div>
				</div>
				<!-- End Logout Modal-->

				<script>
				
					var serverClock = jQuery("#jamServer");
					if (serverClock.length > 0) {
						showServerTime(serverClock, serverClock.text());
					}

					function showServerTime(obj, time) {
						var parts = time.split(":"),
							newTime = new Date();

						newTime.setHours(parseInt(parts[0], 10));
						newTime.setMinutes(parseInt(parts[1], 10));
						newTime.setSeconds(parseInt(parts[2], 10));

						var timeDifference = new Date().getTime() - newTime.getTime();

						var methods = {
							displayTime: function () {
								var now = new Date(new Date().getTime() - timeDifference);
								obj.text([
									methods.leadZeros(now.getHours(), 2),
									methods.leadZeros(now.getMinutes(), 2),
									methods.leadZeros(now.getSeconds(), 2)
								].join(":"));
								setTimeout(methods.displayTime, 500);
							},

							leadZeros: function (time, width) {
								while (String(time).length < width) {
									time = "0" + time;
								}
								return time;
							}
						}
						methods.displayTime();
					}

				</script>
