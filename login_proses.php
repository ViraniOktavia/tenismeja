<?php
$username   = $_POST['username'];
$pass       = $_POST['password'];

include 'config.php';

$user = pg_query($db,"select * from login where username='$username' and password='$pass'");
$chek = pg_num_rows($user);
if($chek>0)
{
    header("location:welcome.php");
}else
{
    header("location:login.php");

}
?>