<head>
    <?php $this->load->view('admin/catalog/head', $this->data); ?>
</head>

<div class="row">
    <div class="col-12">
        <?php $this->load->view('admin/message', $this->data) ?>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Catalog table <a href="<?php echo admin_url('catalog/add') ?>" style="cursor:pointer;"> <img src="<?php echo public_url('admin/assets') ?>/img/add-circle-outline.svg" alt="" style="height: 25px; background-color:greenyellow; border-radius:20%; float:right"> </a></h6>

                <p>Total: <?php echo count($list); ?></p>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>


                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DisplayOrther</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Catalog</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <!-- <td>
                                        <input type="checkbox" name="id[]">
                                    </td> -->
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm"><?php echo $row->id ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row->sort_order ?></p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold"><?php echo $row->name ?></span>
                                    </td>
                                    <!-- <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td> -->
                                    <td class="align-middle">
                                        <a href="<?php echo admin_url('catalog/edit/' . $row->id) ?>" class="text-secondary font-weight-bold text-xs" title="Edit admin">
                                            <img src="<?php echo public_url('admin/assets') ?>/img/pencil-outline.svg" style="height: 18px;">
                                        </a>
                                        <a onclick="return confirm('Are you want to delete?')" href="<?php echo admin_url('catalog/delete/' . $row->id) ?>" class="text-secondary font-weight-bold text-xs" title="Delete admin">
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
<!-- <footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                    for a better web.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer> -->