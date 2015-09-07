<?php /* Smarty version Smarty-3.0.7, created on 2015-09-07 13:52:51
         compiled from "application/views\tentangaids/list.html" */ ?>
<?php /*%%SmartyHeaderCode:3192755ed7a93428903-62840441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b62607afe9e6dad87d15e08c7424b2ff8b102f3' => 
    array (
      0 => 'application/views\\tentangaids/list.html',
      1 => 1441626526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3192755ed7a93428903-62840441',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    CKEDITOR.replace( 'tentangaids' );
});
</script>
<section class="content-header">
    <h1>Tentang AIDS</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Tentang AIDS</a></li>
        <li><a href="#">Tentang AIDS</a></li>
    </ol>
</section>
<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="box">
        <div class="box-header with-border">
            <h5 class="box-title">Seputar AIDS<small></small></h5>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('tentangaids/process_edit');?>
" method="post">
                <input type="hidden" name="aids_id" value="<?php echo $_smarty_tpl->getVariable('result')->value['pref_id'];?>
">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Deskripsi Tentang AIDS</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="tentangaids" rows="17" name="tentangaids"><?php echo $_smarty_tpl->getVariable('result')->value['pref_value'];?>
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
    </div>
</section>
