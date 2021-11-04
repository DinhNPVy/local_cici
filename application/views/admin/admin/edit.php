<style>
    input {
        position: relative;
    }

    img {
        position: absolute;
        float: left;
        left: 88%;
        top: 31.01%;
        cursor: pointer;
    }
</style>
<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data) ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php $this->load->view('admin/message', $this->data) ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-9">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Edit Admin Information</h6>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="card-body">
                                    <form role="form text-left" method="post" action="">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="UserName" name="username" value="<?php echo $info->username ?>">
                                            <div>
                                                <?php echo form_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password" id="pass" name="password" value="<?php echo $info->password ?>">
                                            <div>
                                                <img onclick="showpass()" src="<?php echo public_url('admin/assets') ?>/img/eye-outline.svg" alt="" style="height:18px;">
                                                <?php echo form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $info->name ?>">
                                            <div>
                                                <?php echo form_error('name') ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $info->email ?>">
                                            <div>
                                                <?php echo form_error('email') ?>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <input type="phone" class="form-control" placeholder="Phone" name="phone" value="<?php echo $info->phone ?>">
                                            <div>
                                                <?php echo form_error('phone') ?>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Update" />
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        var x = true;

        function showpass() {
            if (x) {
                document.getElementById('pass').type = "text";
                x = false;

            } else {
                document.getElementById('pass').type = "password";
                x = true;
            }
        }
    </script>
</body>