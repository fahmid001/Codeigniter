<div class="content-wrapper">   
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
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
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Setting Info</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('admin/admin/updatesetting'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body" style="margin-top: 10px;"> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Site Title</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="site_title" id="site_title" value="<?php echo $settingdata->site_title; ?>" required="required">                                
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Keyword</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="keyword" id="keyword" value="<?php echo $settingdata->keyword; ?>" required="required">                                
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Copy Right</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="copy_right" id="copy_right" value="<?php echo $settingdata->copy_right; ?>" required="required">                                
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Company Email</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="company_email" id="company_email" value="<?php echo $settingdata->company_email; ?>" required="required">                                
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Logo Image</label>
                                <div class="col-sm-6">
                                    <input type="file" name="userfile1" id="logo_image" value="<?php echo $settingdata->logo_image; ?>" required="required">                                
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Favicon</label>
                                <div class="col-sm-6">
                                    <input type="file" name="userfile2" id="favicon" value="<?php echo $settingdata->fave_icon; ?>" required="required">                                
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
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Setting Info</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('admin/admin/updatesetting2'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body" style="margin-top: 10px;"> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Quick Link</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" type="text" name="quick_link" id="quick_link" required="required"><?php echo $settingdata->quick_link; ?></textarea>                              
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Getting Touch</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" type="text" name="getting_touch" id="getting_touch" required="required"><?php echo $settingdata->getting_touch; ?></textarea>                                
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Company Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" type="text" name="company_description" id="company_description" required="required"><?php echo $settingdata->company_description; ?></textarea>                                
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
        </div>
    </section>
</div>

