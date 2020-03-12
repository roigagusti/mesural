<?php session_start();

session_destroy();
echo 'You have successfully logged out. You will be redirected or you can click <a href="../login.php?lang='.$_GET['lang'].'>here</a>';
if(isset($_GET['lang'])){
	header('Location: ../login.php?lang='.$_GET['lang']);
}else{
	header('Location: ../login.php');
}
?>
