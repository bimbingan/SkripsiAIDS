<?php /* Smarty version Smarty-3.0.7, created on 2015-08-23 05:22:54
         compiled from "application/views\tentangaids/list.html" */ ?>
<?php /*%%SmartyHeaderCode:3156955d93c8ebf2b25-71980829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b62607afe9e6dad87d15e08c7424b2ff8b102f3' => 
    array (
      0 => 'application/views\\tentangaids/list.html',
      1 => 1439979828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3156955d93c8ebf2b25-71980829',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>Tentang Aids</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Tentang Aids</a></li>
        <li><a href="#">Tentang Aids</a></li>
    </ol>
</section>
<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="box">
        <div class="box-header with-border">
            <h5 class="box-title">Seputar Aids<small></small></h5>
            <div class="box-tools">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('tentangaids/add');?>
" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
						<th>Tentang Aids</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
						<tr> 
							<td><?php echo $_smarty_tpl->tpl_vars['result']->value['tentang_aids'];?>
</td>
						
						</tr>
					<?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
