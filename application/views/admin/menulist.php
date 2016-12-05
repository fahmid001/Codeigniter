<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Menu List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Menu List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Menu</h3>
                    </div>
                    <form role="form" action="<?php echo site_url('admin/admin/addmenu'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body" style="margin-top: 10px;"> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center">Menu Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="menuname" id="menuname" required="required">                                
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
                        <h3 class="box-title">Menu List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Menu</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (sizeof($menulist) > 0):
                                    foreach ($menulist as $datarow):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $datarow->menu_name; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($datarow->date)); ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/admin/deletemenu/' . $datarow->id); ?>" onclick="return confirm('Are you age agree to delete ?');"><i class="fa fa-trash-o"></i> Delete</a>
                                                <a class="btn btn-primary btn-xs" href="#" onclick="editmenu('<?php echo $datarow->id . ',' . $datarow->menu_name ?>')" data-toggle="modal"><i class="fa fa-edit-o"></i> Edit</a>
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
<div class="modal fade" id="editmenuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Menu</h4>
            </div>
            <div style="background-color: #FFF" class="modal-body">
                <div class="panel-body">
                    <form role="form" action="<?php echo site_url('admin/admin/editmenu'); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Menu Name</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="menuid" id="menu_id"/>
                                    <input class="form-control" type="text" name="menuname" id="menu_name" required="required">                                
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
    function editmenu(id) {
        $("#editmenuModal").modal('show');
        var curr = id.split(',');
        $("#menu_id").val(curr[0]);
        $("#menu_name").val(curr[1]);
    }
</script>
