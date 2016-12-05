<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Slider List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Slider List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Slide</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('admin/admin/uoloadsliding'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body" style="margin-top: 10px;">  
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Slider Title</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="slider_title" id="slider_title" required="required">                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Slide Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="userfile" id="exampleInputFile" required="required">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                            </div>                            
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <?php
                    if ($this->session->userdata('successfull')):
                        echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $this->session->userdata('successfull') . '</div>';
                        $this->session->unset_userdata('successfull');
                    endif;
                    if ($this->session->userdata('failed')):
                        echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $this->session->userdata('failed') . '</div>';
                        $this->session->unset_userdata('failed');
                    endif;
                    ?>
                    <div class="box-header">
                        <h3 class="box-title">Sliding List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Title</th>
                                    <th>Slid Image</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (sizeof($slidinglist) > 0):
                                    foreach ($slidinglist as $datarow):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $datarow->slider_title; ?></td>
                                            <td><img src="<?php echo $baseurl; ?>assets/uploads/<?php echo $datarow->slider_name; ?>" width="150" height="100"/></td>
                                            <td><?php echo date('Y-m-d', strtotime($datarow->date)); ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/admin/delete_slider/' . $datarow->id); ?>" onclick="return confirm('Are you age agree to delete ?');"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                        </tr>  

                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>
