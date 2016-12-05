<div class="content-wrapper">   
    <section class="content-header">
        <h1>
            Create Page
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Create Page</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
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
            <?php
            if ($pageaction == ''):
                ?>
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Page</h3>
                        </div>
                        <form class="form-horizontal" action="<?php echo site_url('admin/admin/savepages'); ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body" style="margin-top: 10px;"> 
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Page Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="pagename" id="pagename" value="" required="required">                                
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Page Description</label>
                                    <div class="col-sm-6">
                                        <textarea class="textarea" placeholder="Message" name="pagedescription" name="pagedescription" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                <?php
            endif;
            if ($pageaction == 'editpage'):
                ?>
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Updated Page</h3>
                        </div>
                        <form class="form-horizontal" action="<?php echo site_url('admin/admin/updatecreatepage'); ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body" style="margin-top: 10px;"> 
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Page Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="pagename" id="pagename" value="<?php echo $pagedata->pagename ?>" required="required">                                
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Page Description</label>
                                    <div class="col-sm-6">
                                        <textarea class="textarea" placeholder="Message" name="pagedescription" name="pagedescription" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pagedata->pagedescription ?></textarea>
                                    </div>
                                </div>                              
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="id" value="<?php echo $pagedata->id ?>">
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
                <?php
            endif;
            ?>
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Page name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (sizeof($pageinfo) > 0):
                                    foreach ($pageinfo as $datarow):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $datarow->pagename; ?></td>
                                            <td><?php echo $datarow->pagedescription; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($datarow->date)); ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/admin/deletepage/' . $datarow->id); ?>" onclick="return confirm('Are you age agree to delete ?');"> Delete</a>
                                                <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/admin/createpages/' . $datarow->id); ?>" > Edit</a>
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
        </div>
    </section>
</div>

