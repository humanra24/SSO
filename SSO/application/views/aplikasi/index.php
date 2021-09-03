<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Aplikasi</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- BUTTON AKADEMIK -->
		<div class="col-xl-4 col-md-6 mb-4 my-5">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
							</div>

							<form action="<?= base_url('api/akademik/std'); ?>" target="_blank" method="post">
								<input type="text" hidden name="email" value="<?= $this->session->userdata("email") ?>">
								<input type="text" hidden name="password"
									value="<?= $this->session->userdata("password") ?>">
								<button type="submit" class="h5 mb-0 font-weight-bold text-gray-800">AKADEMIK</button>
							</form>

						</div>
						<div class="col-auto">
							<i class="fas fa-university fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- BUTTON PERPUSTAKAAN -->
		<div class="col-xl-4 col-md-6 mb-4 my-5">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
							</div>

							<form action="<?= base_url('api/perpustakaan/home'); ?>" target="_blank"
								method="post">
								<input type="text" hidden name="email" value="<?= $this->session->userdata("email") ?>">
								<input type="text" hidden name="password"
									value="<?= $this->session->userdata("password") ?>">
								<button class="h5 mb-0 font-weight-bold text-gray-800">PERPUSTAKAAN</button>
							</form>

						</div>
						<div class="col-auto">
							<i class="fas fa-book fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Button E-LEARNING -->
		<div class="col-xl-4 col-md-6 mb-4 my-5">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
							</div>

							<form action="<?= base_url('api/e-learning/home'); ?>" target="_blank"
								method="post">
								<input type="text" hidden name="email" value="<?= $this->session->userdata("email") ?>">
								<input type="text" hidden name="password"
									value="<?= $this->session->userdata("password") ?>">
								<button class="h5 mb-0 font-weight-bold text-gray-800">E-LEARNINNG</button>
							</form>

						</div>
						<div class="col-auto">
							<i class="fab fa-leanpub fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
