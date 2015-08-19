<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 15:03:44
         compiled from "application/views\tentangkpa/list.html" */ ?>
<?php /*%%SmartyHeaderCode:2097155d47eb05ff064-02063092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a595cd7bc503dbd8b9738206885e72833ac269a2' => 
    array (
      0 => 'application/views\\tentangkpa/list.html',
      1 => 1439988721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2097155d47eb05ff064-02063092',
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
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="box">
        <div class="box-header with-border">
            <h5 class="box-title">Seputar KPA<small></small></h5>
            <div class="box-tools">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('tentangkpa/add');?>
" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
						<th>Tentang KPA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
						<tr> 
							<td><?php echo $_smarty_tpl->tpl_vars['result']->value['tentang_kpa'];?>
</td>
						
						</tr>
					<?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
