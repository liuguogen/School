<?php $this->load->view('admin/public') ?>
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
                            <li class="active"><a href="<?php echo base_url() ?>school_controller/type">添加学校</a></li>
                        </ul>
                        <!--breadcrumbs end -->
                        <h1 class="h1">学校列表</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">学校列表</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>学校名称</th>
                                            <th>学校LOGO</th>
                                            <th>学费</th>
                                            <th>住宿费</th>
                                            <th>排序</th>
                                            <th>操作</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(!empty($row)) {
                                    	foreach ($row as $key => $value) {

                                    	?>

                                        <tr>
                                            <td><?php echo $value['school_name'] ?></td>
                                            <td><img src="<?php echo $value['school_logo'] ?>"  height="40"/></td>
                                            <td><?php echo $value['tuition'] ?></td>
                                            <td><?php echo $value['accomm'] ?></td>
                                            <td><?php echo $value['order_by'] ?></td>
                                            <td><a href="<?php echo base_url()?>index.php/school_controller/edit?school_id=<?php echo $value['school_id']?>"><i class="fa fa-pencil"></i></a></td>
                                            
                                        </tr>
                                        <?php }
                                    }else{
                                        ?>


                                        <tr><td colspan='6'>暂无数据</td></tr>
                                    <?php }?>
                                    <?php if ($page_links){?>
                                            <tr>
                                            <td colspan="6" class="page" align="center"><?php echo $page_links?></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </section>
        <!--main content end-->
        </body>
        </html>