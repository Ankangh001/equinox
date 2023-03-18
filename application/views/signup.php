    <div class='content-layout'>
        <div class='row row-cols-1 row-cols-md-3 g-4'>
            <div class='col c1'>
                <div class='my-cards card'>
                    <div class='custom-card card-body'></div>
                </div>
            </div>
            <div class='col c2'>
                <div class='my-cards card'>
                <?php $this->load->view('partials/messages'); ?>
                    <div class=' custom-card card-body'>
                        <h2 style="text-align: center;">Sign Up </h2>
                        <hr style=' margin: 0 0 1rem 0;  '>

                        <div id='container-content'>
                            <form class='c-form-control custom-pad2' action="<?=base_url('signup')?>" method="POST">
                                <h5>Create New Account</h5>
                                <div class='form-group  c-form-group'>
                                    <label class='custom-label'>Enter Your Name:</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.5rem;' class='fas fa-user form-u-name'></i>
                                        <input type='text' name="name" class='form-control ' placeholder='Name' required>
                                    </div>
                                </div>

                                <div class='form-group c-form-group'>
                                    <label class='custom-label'>Enter Your Email:</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.4rem;' class='fas fa-envelope  form-u-name'></i>
                                        <input type='email' name="email" class='form-control ' placeholder='example@gmail.com' required>
                                    </div>
                                </div>

                                <div class='form-group c-form-group'>
                                    <label class='custom-label'>Enter Your Password:</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.4rem;' class='fas fa-lock  form-u-name'></i>
                                        <input type='password' name="password" class='form-control ' required>
                                    </div>
                                </div>

                                <div class='form-group c-form-group'>
                                    <label class='custom-label'>Confirm Password:</label>
                                    <div class='c-flex'>
                                        <i style='margin-right: 0.4rem;' class='fas fa-lock  form-u-name'></i>
                                        <input type='password' name="cpass" class='form-control ' required>
                                    </div>
                                </div>
                                <div style='border-bottom: none;' class='form-group c-form-group'>
                                    <input type='submit' name="submit"  class='btn btn-primary' value="Submit">
                                    <i style="float: right;color: #707173; ">Already have a account?<a style="text-decoration: underline;color: #4a80ce;" href="login">Login</a></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col c3'>
                <div style='border: none;' class='my-cards card'></div>
            </div>
        </div>
    </div>
    </div>