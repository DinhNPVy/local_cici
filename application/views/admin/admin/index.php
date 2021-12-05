<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data) ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php $this->load->view('admin/message', $this->data) ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Admin table</h6>
                            <p>Total: <?php echo   $total; ?></p>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Join Date</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Permissions</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $row) : ?>
                                            <tr>

                                                <td>
                                                    <div>
                                                        <?php echo $row->id ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="<?php echo public_url('admin/assets') ?> /img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> <?php echo $row->name ?></h6>
                                                            <p class="text-xs text-secondary mb-0"> <?php echo $row->email ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"> <?php echo $row->phone ?></p>

                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success"> <?php echo $row->status ?></span>
                                                </td>


                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"> <?php echo $row->permissions ?></p>

                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"> <?php echo $row->date ?></span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="<?php echo admin_url('admin/edit/' . $row->id) ?>" class="text-secondary font-weight-bold text-xs" title="Edit admin">
                                                        <img src="<?php echo public_url('admin/assets') ?>/img/pencil-outline.svg" style="height: 18px;">
                                                    </a>
                                                    <a onclick="return confirm('Are you want to delete?')" href="<?php echo admin_url('admin/delete/' . $row->id) ?>" class="text-secondary font-weight-bold text-xs" title="Delete admin">
                                                        <img src="<?php echo public_url('admin/assets') ?>/img/trash-outline.svg" style="height: 18px;">
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>