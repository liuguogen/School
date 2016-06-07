<?php $this->load->view('admin/public') ?>
<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/uploadify/uploadify.css" />
<!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="/">系统</a>
                            </li>
                            <li>学校管理</li>
                            <li class="active">添加学校</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <h1 class="h1">添加学校</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">添加学校</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">

                                <form class="form-horizontal form-border" id="form">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">学校名称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="school_name" id="school_name" required="" placeholder="请输入学校名称">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                    
                                        <label class="col-sm-3 control-label">学校Logo</label>
                                        <div class="col-sm-6">
                                            <div id="school_logo" class=""></div>
                                            <input type='file' id="file_upload" name="file_upload" multiple="true">

                                            <input type="hidden" name="school_logo" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">学费</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="tuition" id="tuition" required="" placeholder="学费" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">住宿费</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="accomm" id="accomm" required="" placeholder="住宿费" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">排序</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="order_by" id="order_by" required="" placeholder="数值越大越靠前" value="0">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-8 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="submit_data">提交</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </section>
        <!--main content end-->
    
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/application.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/icheck/js/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/validation/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/validation/js/jquery.validate.min.js"></script>

        <script>
        $(document).ready(function() {
            <?php $timestamp=time() ?>
            $("#file_upload").uploadify({
                'fileTypeExts' :'*.gif;*.jpg;*.png',
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                },
                'swf'      : '<?php echo base_url() ?>assets/uploadify/uploadify.swf',
                'uploader' : '<?php echo base_url() ?>index.php/school_controller/upload',
                'onUploadSuccess' : function(file,data,response){
                    
                    if(response && data!='error'){

                        var logo_len=$('#school_logo a img').length;
                        
                        if(logo_len<1){
                            $("input[name='school_logo']").val(data);
                            $('#school_logo').append('<a><img src="'+data+'" style="height: 120px;width: 120px;margin-bottom:5px;margin-left:38px;" /></a>');
                        }else{
                            alert('只能上传1张图片');
                        }
                        
                    }
                }
            });
            
        });



    </script>