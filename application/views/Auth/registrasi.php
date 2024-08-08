<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-10">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="fade-up">
                            <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" class="img-fluid" alt="Login Image" style="max-width: 85%; height: auto;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('Auth/register'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                                        <?= form_error('password_confirm', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form>
                                <hr>
                                <!-- <div class="text-center mb-1">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <p class="small">Already have an account? <a href="<?= base_url('Auth') ?>">Login!</a></p>
                                    <a class="small" style="color: gray;" href="<?= base_url('Cindex'); ?>"><i class="fa-solid fa-house-chimney ps-2"></i><span> </span>Back to Home Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>