<head>
    <?php $this->load->view('admin/news/head', $this->data); ?>
</head>
<div class="col-12 mt-4">
    <?php $this->load->view('admin/message', $this->data) ?>
    <div class="card mb-4">

        <div class="card-header pb-0 p-3">
            <h6 class="mb-1">News

            </h6>

            <!-- <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck" title="Choose All" style="float: right;"></span> -->
            <p class="text-sm">There are currently <?php echo $total_rows ?> news</p>
            <div class="pagination-sm pagination-primary page-item" style="float: right;">

                <?php echo $this->pagination->create_links() ?>

            </div>

            <div>
                <form method="get" action="<?php echo admin_url('news') ?>">
                    <table class="navbar-nav  justify-content-end" style="display: -webkit-inline-box;">

                        <tr class="nav-item d-flex align-items-center">
                            <td href="#" class="nav-link text-body font-weight-bold px-0">
                                ID
                                <input class="form-control" id="filter_id" value="<?php echo $this->input->get('id') ?>" type="text" name="id" />
                                &nbsp;
                            </td>



                            <td href="#" class="nav-link text-body font-weight-bold px-0">

                                Title
                                <input class="form-control" type="text" value="<?php echo $this->input->get('title') ?>" id="filter_title" name="title" />
                                &nbsp;
                            </td>


                        </tr>
                        <td class="d-flex align-items-center justify-content">
                            <input type="submit" class="btn btn-outline-primary btn-sm mb-0" value="Search">
                            &nbsp;
                            <input type="reset" onclick="window.location.href = '<?php echo admin_url('news')  ?>'" class="btn btn-outline-primary btn-sm mb-0" value="Reset">
                            <!-- &nbsp;
                            <div class="list_action itemActions">
                                <a url="<? echo admin_url('news/delete_all') ?>" id="submit" href="#submit">
                                    <input type="submit" class="btn btn-outline-primary btn-sm mb-0" value="Delete All">
                                </a>

                            </div> -->
                        </td>

                    </table>

                </form>
            </div>


        </div>


        <div class="card-body p-3 list_item">

            <div class="row">
                <?php foreach ($list as $row) : ?>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 <?php echo $row->id ?>">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="<?php echo base_url('upload/news/' . $row->image_link) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">ID: <?php echo $row->id ?></p>
                                <p class="text-gradient text-dark mb-2 text-sm">Created: <?php echo get_date($row->created) ?></p>
                                <a href="">
                                    <h5>
                                        <?php echo $row->title ?>
                                    </h5>

                                </a>

                                <div class="d-flex align-items-center justify-content-between">

                                    <!-- <span>
                                        <input type="checkbox" value="<?php echo $row->id ?>" name="id[]" />
                                    </span> -->

                                    &nbsp;

                                    <span>View: <?php echo $row->count_view ?></span>

                                    <div class="avatar-group mt-2">



                                        <a href="<?php echo admin_url('news/edit/' . $row->id) ?>" class="avatar avatar-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                            <img alt="Image placeholder" src="<?php echo public_url('admin/assets') ?>/img/pencil-outline.svg" style="height: 18px;">
                                        </a>
                                        <a href="<?php echo admin_url('news/delete/' . $row->id) ?>" onclick="return confirm('Are you want to delete?')" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                            <img alt="Image placeholder" src="<?php echo public_url('admin/assets') ?>/img/trash-outline.svg" style="height: 18px;">
                                        </a>
                                        <a href="<?php echo $row->link ?>" title="View Article Details">
                                            <span class="btn btn-outline-primary btn-sm mb-0">View Article Details</span>
                                        </a>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card h-100 card-plain border">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                            <a href="<?php echo admin_url('news/add') ?>">
                                <i class="fa fa-plus text-secondary mb-3"></i>
                                <h5 class=" text-secondary"> New Post </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>