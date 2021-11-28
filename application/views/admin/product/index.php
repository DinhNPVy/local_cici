<head>
    <?php $this->load->view('admin/product/head', $this->data); ?>
</head>
<style>
    .pagination1 {
        display: block;
        padding: 5px 10px;
        float: right;
    }

    .pagination1 a {
        background: #f3f3f3;
        border: 1px solid #c4c4c4;
        border-radius: 2px;
        box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
        color: #717171;
        display: inline-block;
        float: left;
        font-weight: 700;
        line-height: 25px;
        margin-right: 4px;
        min-height: 25px;
        padding: 0 10px;
        text-decoration: none;
    }

    .pagination1 strong {
        background: #f3f3f3;
        border: 1px solid #c4c4c4;
        border-radius: 2px;
        box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
        color: maroon;
        display: inline-block;
        float: left;
        font-weight: 700;
        line-height: 25px;
        margin-right: 4px;
        min-height: 25px;
        padding: 0 10px;
        text-decoration: none;
    }
</style>
<div class="col-12 mt-4">
    <?php $this->load->view('admin/message', $this->data) ?>
    <div class="card mb-4">

        <div class="card-header pb-0 p-3">
            <h6 class="mb-1">Product

            </h6>
            <!-- <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck" title="Choose All" style="float: right;"></span> -->
            <p class="text-sm">There are currently <?php echo $total_rows ?> products</p>
            <div class="pagination1">

                <?php echo $this->pagination->create_links() ?>

            </div>

            <div>
                <form method="get" action="<?php echo admin_url('product') ?>">
                    <table class="navbar-nav  justify-content-end" style="display: -webkit-inline-box;">

                        <tr class="nav-item d-flex align-items-center">
                            <td href="#" class="nav-link text-body font-weight-bold px-0">
                                ID
                                <input class="form-control" id="filter_id" value="<?php echo $this->input->get('id') ?>" type="text" name="id" />
                                &nbsp;
                            </td>



                            <td href="#" class="nav-link text-body font-weight-bold px-0">

                                Name
                                <input class="form-control" type="text" value="<?php echo $this->input->get('name') ?>" id="filter_name" name="name" />
                                &nbsp;
                            </td>



                            <td href="#" class="nav-link text-body font-weight-bold px-0">
                                Type
                                <select name="catalog" class="form-control">
                                    <option value="">Choose type</option>
                                    <!-- kiem tra xem co danh muc con hay khong -->
                                    <?php foreach ($catalogs as $row) : ?>
                                        <?php if (count($row->subs) > 1) : ?>
                                            <optgroup label="<?php echo $row->name ?>">
                                                <?php foreach ($row->subs as $sub) : ?>
                                                    <option value="<?php echo $sub->id ?>" <?php echo ($this->input->get('catalog') == $sub->id) ? 'selected' : '' ?>>
                                                        <?php echo $sub->name ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </optgroup>
                                        <?php else : ?>
                                            <option value="<?php echo $row->id ?>" <?php echo ($this->input->get('catalog') == $row->id) ? 'selected' : '' ?>>
                                                <?php echo $row->name ?>
                                            </option>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                </select>
                                &nbsp;
                            </td>

                        </tr>
                        <td class="d-flex align-items-center justify-content">
                            <input type="submit" class="btn btn-outline-primary btn-sm mb-0" value="Search">
                            &nbsp;
                            <input type="reset" onclick="window.location.href = '<?php echo admin_url('product')  ?>'" class="btn btn-outline-primary btn-sm mb-0" value="Reset">
                            <!-- &nbsp;
                            <div class="list_action itemActions">
                                <a url="<? echo admin_url('product/delete_all') ?>" id="submit" href="#submit">
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
                                    <img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">ID: <?php echo $row->id ?></p>
                                <p class="text-gradient text-dark mb-2 text-sm">Created: <?php echo get_date($row->created) ?></p>
                                <a href="">
                                    <h5>
                                        <?php echo $row->name ?>
                                    </h5>
                                    <h6>
                                        <?php if ($row->discount > 0) : ?>
                                            <?php $price_new = $row->price - $row->discount; ?>
                                            <b style="color:crimson;"><?php echo number_format($price_new) ?> VNĐ</b>
                                            <p style="text-decoration:line-through"><?php echo number_format($row->price) ?> VNĐ</p>
                                        <?php else : ?>
                                            <b style="color:crimson;"><?php echo number_format($row->price) ?>VNĐ</b>
                                        <?php endif; ?>
                                    </h6>
                                </a>
                                <p class="mb-4 text-sm">
                                    <?php echo $row->content ?>
                                <div class="d-flex align-items-center justify-content-between">

                                    <!-- <span>
                                        <input type="checkbox" value="<?php echo $row->id ?>" name="id[]" />
                                    </span> -->

                                    <span>Buyed: <?php echo $row->buyed ?></span>

                                    <span>View: <?php echo $row->view ?></span>
                                    <!-- <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button> -->
                                    <div class="avatar-group mt-2">


                                        <a href="<?php echo admin_url('product/edit/' . $row->id) ?>" class="avatar avatar-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                            <img alt="Image placeholder" src="<?php echo public_url('admin/assets') ?>/img/pencil-outline.svg" style="height: 18px;">
                                        </a>
                                        <a href="<?php echo admin_url('product/delete/' . $row->id) ?>" onclick="return confirm('Are you want to delete?')" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                            <img alt="Image placeholder" src="<?php echo public_url('admin/assets') ?>/img/trash-outline.svg" style="height: 18px;">
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
                            <a href="<?php echo admin_url('product/add') ?>">
                                <i class="fa fa-plus text-secondary mb-3"></i>
                                <h5 class=" text-secondary"> New product </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>