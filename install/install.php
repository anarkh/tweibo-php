<?php
/**
 * ThinkSNS安装文件，修改自pbdigg。
 */
error_reporting(0);
session_start();
define('THINKSNS_INSTALL', TRUE);
define('THINKSNS_ROOT', str_replace('\\', '/', substr(dirname(__FILE__), 0, -7)));

$_TSVERSION = 'beta';

include 'install_function.php';
include 'install_lang.php';
$v = 3;
$timestamp = time();
$ip = getip();
$installfile = 't_thinksns_com.sql';
$thinksns_config_file = 'config.php';
$_SESSION['thinksns_install'] = $timestamp;
// 判断是否安装过
header('Content-Type: text/html; charset=utf-8');
if(file_exists('install.lock'))
{
	exit($i_message['install_lock']);
}
if(!is_readable($installfile))
{
	exit($i_message['install_dbFile_error']);
}
$quit = false;
$msg = $alert = $link = $sql = $allownext = '';

$PHP_SELF = addslashes(htmlspecialchars($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']));
set_magic_quotes_runtime(0);
if(!get_magic_quotes_gpc())
{
	addS($_POST);
	addS($_GET);
}
@extract($_POST);
@extract($_GET);
?>
<html>
<head>
<title><?php echo $i_message['install_title']; ?></title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link href="images/style.css" rel="stylesheet" type="text/css" />
<body>
<div id='content'>
<div id='pageheader'>
	<div id="logo"><img src="images/tweibo.png" style="margin: 15px;" border="0" alt="tweibo" /></div>
	<div id="version" class="rightheader">Version <?php echo $_TSVERSION; ?></div>
</div>
<div id='innercontent'>
	<h1>tweibo <?php echo $_TSVERSION, ' ', $i_message['install_wizard']; ?></h1>
<?php
if ($v == '3')
{
?>
<!-- <h2><?php echo $i_message['install_setting'];?></h2> -->
<form method="post" action="install.php?v=4" id="install" onSubmit="return check(this);">
<div class="shade">
<div class="settingHead"><?php echo $i_message['install_mysql'];?></div>

<h5><?php echo $i_message['install_mysql_host'];?></h5>
<p><?php echo $i_message['install_mysql_host_intro'];?></p>
<p><input type="text" name="db_host" value="localhost" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_username'];?></h5>
<p><input type="text" name="db_username" value="root" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_password'];?></h5>
<p><input type="password" name="db_password" value="" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_name'];?></h5>
<p><input type="text" name="db_name" value="tweibo" size="40" class='input' />
</p>

<h5><?php echo $i_message['install_mysql_prefix'];?></h5>
<p><?php echo $i_message['install_mysql_prefix_intro'];?></p>
<p><input type="text" name="db_prefix" value="t_" size="40" class='input' /></p>

<h5><?php echo $i_message['site_url'];?></h5>
<p><?php echo $i_message['site_url_intro'];?></p>
<p><input type="text" name="site_url" value="<?php echo "http://".$_SERVER['HTTP_HOST'].rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))),'/');?>" size="40" class='input' /></p>

</div>

<div class="center">
	<input type="button" class="submit" name="prev" value="<?php echo $i_message['install_prev'];?>" onClick="history.go(-1)">&nbsp;
	<input type="submit" class="submit" name="next" value="<?php echo $i_message['install_next'];?>">
</form>
</div>
<script type="text/javascript" language="javascript">
function check(obj)
{
	if (!obj.db_host.value)
	{
		alert('<?php echo $i_message['install_mysql_host_empty'];?>');
		obj.db_host.focus();
		return false;
	}
	else if (!obj.db_username.value)
	{
		alert('<?php echo $i_message['install_mysql_username_empty'];?>');
		obj.db_username.focus();
		return false;
	}
	else if (!obj.db_name.value)
	{
		alert('<?php echo $i_message['install_mysql_name_empty'];?>');
		obj.db_name.focus();
		return false;
	}
	return true;
}
</script>
<?php
}
elseif ($v == '4')
{
	if(empty($db_host) || empty($db_username) || empty($db_name) || empty($db_prefix))
	{
		$msg .= '<p>'.$i_message['mysql_invalid_configure'].'<p>';
		$quit = TRUE;
	}
	elseif (!@mysql_connect($db_host, $db_username, $db_password))
	{
		$msg .= '<p>'.mysql_error().'</p>';
		$quit = TRUE;
	}
	if(strstr($db_prefix, '.'))
	{
		$msg .= '<p>'.$i_message['mysql_invalid_prefix'].'</p>';
		$quit = TRUE;
	}

	else
	{
		$forbiddencharacter = array ("\\","&"," ","'","\"","/","*",",","<",">","\r","\t","\n","#","$","(",")","%","@","+","?",";","^");
		foreach ($forbiddencharacter as $value)
		{
			if (strpos($username, $value) !== FALSE)
			{
				$msg .= '<p>'.$i_message['forbidden_character'].'</p>';
				$quit = TRUE;
				break;
			}
		}
	}

	if ($quit)
	{
		$allownext = 'disabled="disabled"';
		?>
		<div class="error"><?php echo $i_message['error'];?></div>
		<?php
		echo $msg;
	}
	else
	{

		$config_file_content	=	array();
		$config_file_content['db_host']			=	$db_host;
		$config_file_content['db_name']			=	$db_name;
		$config_file_content['db_username']		=	$db_username;
		$config_file_content['db_password']		=	$db_password;
		$config_file_content['db_prefix']		=	$db_prefix;
		$config_file_content['db_pconnect']		=	0;
		$config_file_content['db_charset']		=	'utf8';
		$config_file_content['dbType']			=	'MySQL';
		
		$_SESSION['config_file_content']		=	$config_file_content;
//		$_SESSION['default_manager_account']	=	$default_manager_account;
//		$_SESSION['first_user_id']				=	$first_user_id;
		$_SESSION['site_url']					=	$site_url;

	}
?>
	<div class="botBorder">

<?php
//写配置文件
$randkey = uniqid(rand());
$fp = fopen(THINKSNS_ROOT.'Conf/'.$thinksns_config_file, 'wb');
$configfilecontent = <<<EOT
<?php
//if (!defined('SITE_PATH')) exit();

return array(
	// 数据库常用配置
	'DB_TYPE'			=>	'mysql',			// 数据库类型

	'DB_HOST'			=>	'$db_host',			// 数据库服务器地址
	'DB_NAME'			=>	'$db_name',			// 数据库名
	'DB_USER'			=>	'$db_username',		// 数据库用户名
	'DB_PWD'			=>	'$db_password',		// 数据库密码

	'DB_PORT'			=>	3306,				// 数据库端口
	'DB_PREFIX'			=>	'$db_prefix',		// 数据库表前缀（因为漫游的原因，数据库表前缀必须写在本文件）
);
EOT;
$configfilecontent = str_replace('SECURE_TEST','SECURE'.rand(10000,20000),$configfilecontent);
chmod(THINKSNS_ROOT.'Conf/'.$thinksns_config_file, 0777);
$result_1	=	fwrite($fp, trim($configfilecontent));
@fclose($fp);

if($result_1 && file_exists(THINKSNS_ROOT.'Conf/'.$thinksns_config_file)){
?>
	<p><?php echo $i_message['config_log_success']; ?></p>
<?php
}else{
?>
	<p><?php echo $i_message['config_read_failed']; $quit = TRUE;?></p>
<?php
}
?>
	</div>
	<div class="center">
		<form method="post" action="install.php?v=5">
		<input type="button" class="submit" name="prev" value="<?php echo $i_message['install_prev'];?>" onClick="history.go(-1)">&nbsp;
		<input type="submit" class="submit" name="next" value="<?php echo $i_message['install_next'];?>" <?php echo $allownext;?> >
		</form>
	</div>
<?php
}
elseif ($v == '5')
{
	$db_config	=	$_SESSION['config_file_content'];

	if (!$db_config['db_host'] && !$db_config['db_name'])
	{
		$msg .= '<p>'.$i_message['configure_read_failed'].'</p>';
		$quit = TRUE;
	}
	else
	{
		mysql_connect($db_config['db_host'], $db_config['db_username'], $db_config['db_password']);
		$sqlv = mysql_get_server_info();
		if($sqlv < '4.1')
		{
			$msg .= '<p>'.$i_message['mysql_version_402'].'</p>';
			$quit = TRUE;
		}
		else
		{
			$db_charset	=	$db_config['db_charset'];
			$db_charset = (strpos($db_charset, '-') === FALSE) ? $db_charset : str_replace('-', '', $db_charset);

			mysql_query(" CREATE DATABASE IF NOT EXISTS `{$db_config['db_name']}` DEFAULT CHARACTER SET $db_charset ");

			if (mysql_errno())
			{
				$errormsg = mysql_error();
				$msg .= '<p>'.($errormsg ? $errormsg : $i_message['database_errno']).'</p>';
				$quit = TRUE;
			}
			else
			{
				mysql_select_db($db_config['db_name']);
			}

			//判断是否有用同样的数据库前缀安装过
			$re		=	mysql_query("SELECT COUNT(1) FROM {$db_config['db_prefix']}user");
			$link	=	@mysql_fetch_row($re);

			if( intval($link[0]) > 0 )
			{
				$thinksns_rebuild	=	true;
				$msg .= '<p>'.$i_message['thinksns_rebuild'].'</p>';
				$alert = ' onclick="return confirm(\''.$i_message['thinksns_rebuild'].'\');"';
			}
		}
	}

if ($quit)
{
		$allownext = 'disabled="disabled"';
?>
<div class="error"><?php echo $i_message['error'];?></div>
<?php
	echo $msg;
}
else
{
?>
<div class="botBorder">
<?php
if($thinksns_rebuild){
?>
<p style="color:red;font-size:16px;"><?php echo $i_message['thinksns_rebuild'];?></p>
<?php
}
?>
<p><?php echo $i_message['mysql_import_data'];?></p>
</div>
<?php
}
?>
<div class="center">
	<form method="post" action="install.php?v=6">
	<input type="button" class="submit" name="prev" value="<?php echo $i_message['install_prev'];?>" onClick="history.go(-1)">&nbsp;
	<input type="submit" class="submit" name="next" value="<?php echo $i_message['install_next'];?>" <?php echo $allownext,$alert?>>
	</form>
</div>
<?php
}
elseif ($v == '6')
{
	$db_config	=	$_SESSION['config_file_content'];

	mysql_connect($db_config['db_host'], $db_config['db_username'], $db_config['db_password']);
	if (mysql_get_server_info() > '5.0')
	{
		mysql_query("SET sql_mode = ''");
	}
	$db_config['db_charset'] = (strpos($db_config['db_charset'], '-') === FALSE) ? $db_config['db_charset'] : str_replace('-', '', $db_config['db_charset']);
	mysql_query("SET character_set_connection={$db_config['db_charset']}, character_set_results={$db_config['db_charset']}, character_set_client=binary");
	mysql_select_db($db_config['db_name']);
	$tablenum = 0;

	$fp = fopen($installfile, 'rb');
	$sql = fread($fp, filesize($installfile));
	fclose($fp);
?>
<div class="botBorder">
<h4><?php echo $i_message['import_processing'];?></h4>
<div style="overflow-y:scroll;height:100px;width:715px;padding:5px;border:1px solid #ccc;">
<?php
	$db_charset	=	$db_config['db_charset'];
	$db_prefix	=	$db_config['db_prefix'];
	$sql = str_replace("\r", "\n", str_replace('`'.'ts_', '`'.$db_prefix, $sql));
	foreach(explode(";\n", trim($sql)) as $query)
	{
		$query = trim($query);
		if($query) {
			if(substr($query, 0, 12) == 'CREATE TABLE')
			{
				$name = preg_replace("/CREATE TABLE ([A-Z ]*)`([a-z0-9_]+)` .*/is", "\\2", $query);
				echo '<p>'.$i_message['create_table'].' '.$name.' ... <span class="blue">OK</span></p>';
				@mysql_query(createtable($query, $db_charset));
				$tablenum ++;
			}
			else
			{
				@mysql_query($query);
			}
		}
	}
?>
</div>
</div>
<div class="botBorder">
<h4><?php echo $i_message['create_founder'];?></h4>

<?php

	if(!$quit){
		//锁定安装
		fopen('install.lock', 'w');
		@unlink('../index.html');
	}else{
		echo '请重新安装';
	}
?>
</div>
<div class="botBorder">
<h4><?php echo $i_message['install_success'];?></h4>
<?php echo $i_message['install_success_intro'];?>
</div>
<?php
}
?>
</div>
<div class='copyright'>tweibo <?php echo $_TSVERSION; ?> &#169; copyright 2013-<?php echo date('Y') ?> www.tweibo.com All Rights Reserved</div>
</div>
<div style="display:none;">
<script src="http://s79.cnzz.com/stat.php?id=1702264&web_id=1702264" language="JavaScript" charset="gb2312"></script>
</div>
</body>
</html>