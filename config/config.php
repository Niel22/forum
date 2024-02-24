<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    
    header("location:../index.html");
    die;
}

define("HOST", "localhost");
define("DBNAME", "forum");
define("USERNAME", "root");
define("PASSWORD", "");

$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";", USERNAME, PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($conn){
    // echo "Connected Successfully";
}else{
    echo $e->getMessage;
}

?>