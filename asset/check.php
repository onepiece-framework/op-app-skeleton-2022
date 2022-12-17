<?php
/** op-app-skeleton-2020-nep:/asset/check.php
 *
 * @created   2022-12-17
 * @version   1.0
 * @package   op-app-skeleton-2020-nep
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	Check mbstring installed.
if(!function_exists('mb_language') ){
	define('_OP_APP_BOOTSTRAP_', 'mbstring');
	require(__DIR__.'/bootstrap/php/module.php');
	exit(__LINE__);
}

//	Check openssl installed.
if(!defined('OPENSSL_VERSION_NUMBER') ){
	define('_OP_APP_BOOTSTRAP_', 'openssl');
	require(__DIR__.'/bootstrap/php/module.php');
	exit(__LINE__);
};

//	Checking Shell.
if( Env::isShell() ){
	return;
}

//	Checking rewrite setting.
if( 'app.php' !== basename($_SERVER['SCRIPT_FILENAME']) ){
	//	Has not been setting rewrite.
	require(__DIR__.'/bootstrap/op/rewrite.php');
	exit(__LINE__);
}
