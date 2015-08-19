<?php /* Smarty version Smarty-3.0.7, created on 2015-08-18 09:28:47
         compiled from "application/views\solusi/solusi1/list.html" */ ?>
<?php /*%%SmartyHeaderCode:295955d2deaf76f3b5-08724131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b43502afc753a46f50441909cf39c49d69d621e8' => 
    array (
      0 => 'application/views\\solusi/solusi1/list.html',
      1 => 1439882842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295955d2deaf76f3b5-08724131',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>Solusi 1</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Solusi</a></li>
        <li><a href="#">Solusi 1</a></li>
    </ol>
</section>
<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="box">
        <div class="box-header with-border">
            <h5 class="box-title">Data Solusi 1<small></small></h5>
            <div class="box-tools">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('solusi/solusi1/add');?>
" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                       	<th>Kode Solusi 1</th>
						<th>Keterangan Solusi 1</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
						<tr> 
						
							<td><?php echo $_smarty_tpl->tpl_vars['result']->value['kode_solusi1'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['result']->value['ket_solusi1'];?>
</td>
						
						</tr>
					<?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
