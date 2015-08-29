<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 15:19:51
         compiled from "application/views\tentangkpa/list.html" */ ?>
<?php /*%%SmartyHeaderCode:2560255ddbcf746f3d6-55052152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a595cd7bc503dbd8b9738206885e72833ac269a2' => 
    array (
      0 => 'application/views\\tentangkpa/list.html',
      1 => 1440595093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2560255ddbcf746f3d6-55052152',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>Tentang KPA</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Tentang KPA</a></li>
        <li><a href="#">Tentang KPA</a></li>
    </ol>
</section>
<section class="content">
  <!--    -->
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="box">
        <div class="box-header with-border">
            <h5 class="box-title">Seputar KPA<small></small></h5>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('tentangkpa/process_edit');?>
" method="post">
                <input type="hidden" name="kpa_id" value="<?php echo $_smarty_tpl->getVariable('result')->value['pref_id'];?>
">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Deskripsi Tentang KPA</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="8" name="tentangkpa"><?php echo $_smarty_tpl->getVariable('result')->value['pref_value'];?>
</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 pull-right action-right">
                        <input class="btn btn-primary " name="save" type="submit" value="Simpan">
                        <input class="btn btn-danger" name="save" type="reset" value="Reset">
                    </div>
                </div>
            </form>
        </div>
       <!--   -->
    </div>
</section>
