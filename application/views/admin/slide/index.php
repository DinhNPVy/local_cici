<head>
    <?php $this->load->view('admin/slide/head', $this->data); ?>
</head>
<div class="col-12 mt-4">
    <?php $this->load->view('admin/message', $this->data) ?>
    <div class="card mb-4">

        <div class="card-header pb-0 p-3">
            <h6 class="mb-1">Slide List

            </h6>

            <!-- <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck" title="Choose All" style="float: right;"></span> -->
            <p class="text-sm">There are currently <?php echo $total_rows ?> slide</p>


        </div>


        <div class="card-body p-3 list_item">

            <div class="row">
                <?php foreach ($list as $row) : ?>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 <?php echo $row->id ?>">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="<?php echo base_url('upload/slide/' . $row->image_link) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">ID: <?php echo $row->id ?></p>

                                <a href="">
                                    <h5>
                                        <?php echo $row->name ?>
                                    </h5>

                                </a>

                                <div class="d-flex align-items-center justify-content-between">


                                    <div class="avatar-group mt-2">



                                        <a href="<?php echo admin_url('slide/edit/' . $row->id) ?>" class="avatar avatar-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                            <img alt="Image placeholder" src="<?php echo public_url('admin/assets') ?>/img/pencil-outline.svg" style="height: 18px;">
                                        </a>
                                        <a href="<?php echo admin_url('slide/delete/' . $row->id) ?>" onclick="return confirm('Are you want to delete?')" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                            <img alt="Image placeholder" src="<?php echo public_url('admin/assets') ?>/img/trash-outline.svg" style="height: 18px;">
                                        </a>
                                        <a href="<?php echo $row->link  ?>" title="View Link Details">
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
                            <a href="<?php echo admin_url('slide/add') ?>">
                                <i class="fa fa-plus text-secondary mb-3"></i>
                                <h5 class=" text-secondary"> New Slide </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>