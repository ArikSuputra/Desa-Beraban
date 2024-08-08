<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-9">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="fade-up">
                            <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" class="img-fluid" alt="Login Image" style="max-width: 85%; height: auto;">
                        </div>
                        <div class="col-lg-6 ">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?php if ($this->session->flashdata('success_register')) : ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        <?= $this->session->flashdata('success_register'); ?>
                                    </div>
                                <?php endif; ?>
                                <?= $this->session->flashdata('error_login'); ?>
                                <form class="user" method="post" action="<?php echo base_url('Auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<sm
                                        all class="text-danger pl-3">', '</sm>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p class="small">Not registered? <a href="<?= base_url('Auth/register') ?>">Create an account!</a></p>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" style="color: gray;" href="<?= base_url('Cindex'); ?>"><i class="fa-solid fa-house-chimney ps-2"></i><span> </span>Back to Home Page</a>
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>