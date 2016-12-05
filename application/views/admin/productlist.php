<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Product List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">           
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('admin/admin/addproduct'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body"> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="productname" id="productname" required="required">                                
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Select Menu</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="menuname" id="menuname" required="required" autocomplete="off">
                                        <option value=''>Select Menu</option>
                                        <?php
                                        if (count($menulist) > 0):
                                            foreach ($menulist as $menu):
                                                ?>
                                                <option value="<?php echo $menu->id ?>"><?php echo $menu->menu_name ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>                                   
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Select Category</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="categoryname" id="categoryname" required="required" autocomplete="off">
                                        <option value=''>Select Menu</option>
                                        <?php
                                        if (count($categorylist) > 0):
                                            foreach ($categorylist as $category):
                                                ?>
                                                <option value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>                                   
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" type="text" name="productdescription" id="productdescription" required="required"></textarea>                              
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Image</label>
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
            <div class="col-sm-12">
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
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Menu</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th style="width: 25%">Description</th>
                                    <th>image</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (sizeof($productlist) > 0):
                                    foreach ($productlist as $datarow):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $datarow->menu_id; ?></td>
                                            <td><?php echo $datarow->category_id; ?></td>
                                            <td><?php echo $datarow->product_name; ?></td>
                                            <td><?php echo $datarow->product_description; ?></td>
                                            <td><img src="<?php echo $baseurl; ?>assets/uploads/<?php echo $datarow->product_image; ?>" width="150" height="100"/></td>
                                            <td><?php echo date('Y-m-d', strtotime($datarow->date)); ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/admin/deleteproduct/' . $datarow->id); ?>" onclick="return confirm('Are you age agree to delete ?');"><i class="fa fa-trash-o"></i> Delete</a>
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
                                <div class="col-sm-9">
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
