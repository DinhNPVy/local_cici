<head>
    <?php $this->load->view('admin/catalog/head', $this->data); ?>
</head>
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?php echo public_url('admin/assets') ?>/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    <p class="text-lead text-white">Use these awesome forms to add catalog in your project for free.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Add Catalog</h5>
                    </div>


                    <div class="mt-2 position-relative text-center">
                        <p class="text-sm font-weight-bold mb-1 text-secondary text-border d-inline z-index-2 bg-white px-3">
                            New
                        </p>
                    </div>


                    <div class="card-body">
                        <form role="form text-left" method="post" action="">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="CatalogName" name="name">
                                <div>
                                    <?php echo form_error('name') ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <select type="text" class="form-control" name="parent_id">
                                    <option value="0">Click Parent directory</option>
                                    <?php foreach ($list as $row) : ?>
                                        <option value=<?php echo $row->id ?>>
                                            <?php echo $row->name ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <div>
                                    <?php echo form_error('parent_id') ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="DisplayOrther" name="sort_order">
                                <div>
                                    <?php echo form_error('sort_order') ?>
                                </div>
                            </div>



                            <div class="text-center">
                                <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>