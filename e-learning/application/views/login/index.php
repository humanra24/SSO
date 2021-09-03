<body class="bg-gradient-primary">

	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block">
								<img src="<?= base_url(); ?>assets/img/elearning.png" alt="">
							</div>
							<div class="col-lg-6">
								<br><br><br>
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><strong>Login Sistem E-learning</strong></h1>
									</div>
									<form action="<?= base_url('login/aksi_login');?>" method="post">
										<div class="form-group">
											<input type="email" name="email" class="form-control form-control-user"
												id="exampleInputEmail" aria-describedby="emailHelp"
												placeholder="Enter Email Address...">
										</div>
										<div class="form-group">
											<input type="password" name="password"
												class="form-control form-control-user" id="exampleInputPassword"
												placeholder="Password">
										</div>
										<div class="form-group">
											<!-- <div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember
													Me</label>
											</div> -->
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Login
										</button>


									</form>
									<hr>
									<!-- <div class="text-center">
										<a class="small" href="<?= base_url('login/lupa_pass'); ?>">Forgot Password?</a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<?php if ($this->session->flashdata('flash')) : ?>
	<script type='text/javascript'>
		alert('Email atau Password Anda Salah!');
		history.back(self);
	</script>";
	<?php endif; ?>
