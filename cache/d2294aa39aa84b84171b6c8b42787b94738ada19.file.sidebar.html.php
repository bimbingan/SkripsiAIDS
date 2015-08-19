<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 13:27:42
         compiled from "application/views\base/admin/sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:2236555d1c52e69ee01-66900293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2294aa39aa84b84171b6c8b42787b94738ada19' => 
    array (
      0 => 'application/views\\base/admin/sidebar.html',
      1 => 1439306532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2236555d1c52e69ee01-66900293',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="side-info">
    <p><b><?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['operator_name'])===null||$tmp==='' ? '' : $tmp);?>
</b></p>
    <p><?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['role_nm'])===null||$tmp==='' ? '' : $tmp);?>
</p>
    <div class="clear"></div>
</div>
<?php echo (($tmp = @$_smarty_tpl->getVariable('list_sidebar_nav')->value)===null||$tmp==='' ? '' : $tmp);?>

<div class="side-menu">
    <h3><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/adminlogin/logout_process');?>
" class="logout">Logout</a></h3>
</div>