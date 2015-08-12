<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 16:21:04
         compiled from "application/views\indikator/indikator1/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1419255cb565025d0b6-89935214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b10f05179353fc2d6df93c42182c92d1898dd309' => 
    array (
      0 => 'application/views\\indikator/indikator1/list.html',
      1 => 1439389261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1419255cb565025d0b6-89935214',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>Indikator 1</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Indikator</a></li>
        <li><a href="#">Indikator 1</a></li>
    </ol>
</section>
<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="box">
        <div class="box-header with-border">
            <h5 class="box-title">Data Indikator 1<small></small></h5>
            <div class="box-tools">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('indikator/indikator1/add');?>
" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                       	<th>Kode Indikator</th>
						<th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
						<tr> 
						
							<td><?php echo $_smarty_tpl->tpl_vars['result']->value['kode_indikator1'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['result']->value['ket_indikator1'];?>
</td>
						
						</tr>
					<?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
