<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 12:16:42
         compiled from "application/views\base/operator/document-login.html" */ ?>
<?php /*%%SmartyHeaderCode:3145155d1b48a28ce10-38646605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6cd8b9ba3f6d9a741e112e707cb0ab67b6c0d63' => 
    array (
      0 => 'application/views\\base/operator/document-login.html',
      1 => 1439306532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3145155d1b48a28ce10-38646605',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- head -->
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
        <meta name='description' content="<?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['meta_desc'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <meta name='keywords' content="<?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['meta_key'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <meta name='robots' content='index,follow' />
        <title>Login - <?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['site_title'])===null||$tmp==='' ? '' : $tmp);?>
</title>
        <link href="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/logo.png" rel="SHORTCUT ICON" />
        <!-- themes style -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('THEMESPATH')->value;?>
" media="screen" />
        <!-- other style -->
        <?php echo $_smarty_tpl->getVariable('LOAD_STYLE')->value;?>

    </head>
    <!-- body -->
    <body class="common-login">
        <!-- load javascript -->
        <?php echo $_smarty_tpl->getVariable('LOAD_JAVASCRIPT')->value;?>

        <!-- end of javascript	-->
        <div class="page">
            <div class="holder">
                <div class="container">
                    <div class="login-head">
                        <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/user-image.png" alt="LOGO" /></a>
                        <h3>Portal Akademik</h3>
                        <h4>-</h4>
                        <h4></h4>
                    </div>
                    <div class="login-content">
                        <!-- content -->
                        <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('template_content')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                        <!-- end of content -->
                    </div>
                </div>
                <span class="bottom-shadow"></span>
                <div class="footer-copyright">Copyright &copy; Fairuz</div>
            </div>
            <div class="clear"></div>
        </div>
    </body>
    <!-- end body -->
</html>