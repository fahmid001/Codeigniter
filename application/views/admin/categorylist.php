<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Category List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Category List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <form role="form" action="<?php echo site_url('admin/admin/addcategory'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body" style="margin-top: 10px;">                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Category Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="category" id="category" required="required">                                
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
                        <h3 class="box-title">Category List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (sizeof($categorylist) > 0):
                                    foreach ($categorylist as $datarow):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $datarow->category_name; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($datarow->date)); ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/admin/deletecategory/' . $datarow->id); ?>" onclick="return confirm('Are you age agree to delete ?');"><i class="fa fa-trash-o"></i> Delete</a>
                                                <a class="btn btn-primary btn-xs" href="#" onclick="editcategory('<?php echo $datarow->id . ',' . $datarow->category_name ?>')" data-toggle="modal"><i class="fa fa-edit-o"></i> Edit</a>
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
<div class="modal fade" id="editcategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div style="background-color: #FFF" class="modal-body">
                <div class="panel-body">
                    <form role="form" action="<?php echo site_url('admin/admin/editcategory'); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="catid" id="catid"/>
                                    <input class="form-control" type="text" name="categoryname" id="category_name" required="required">                                
                                </div>
                            </div> 
                        </div>
                        <div class="box-footer">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function editcategory(id) {
        $("#editcategoryModal").modal('show');
        var curr = id.split(',');
        $("#catid").val(curr[0]);
        $("#category_name").val(curr[1]);
    }
</script>