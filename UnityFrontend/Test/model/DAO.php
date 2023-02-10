<?php
$path=$_SERVER['DOCUMENT_ROOT']  .'/quasartest/Test';
include $path."/model/conection.php";
function insert_user(){
    $name = $_POST['_name'];
    $lastName = $_POST['_lastName'];
    $email = $_POST['_email'];
    $password = $_POST['_password'];

    $sql = "INSERT INTO usuariotest (name, lastName, email, password) VALUES ('$name', '$lastName', '$email', '$password')";

    $conexion = connect::conn();
    $res = mysqli_query($conexion, $sql);
    connect::close($conexion);
    return $res;
}

function get_user(){
    $email = $_POST['_email'];
    $password = $_POST['_password'];

    $sql = "SELECT * FROM usuariotest WHERE email = '$email' AND password = '$password'";

    $conexion = connect::conn();
    $res = mysqli_query($conexion, $sql);
    
    if($res){
        $data = array();
        while($obj = $res->fetch_object())
            $data[] = $obj;
    }
    connect::close($conexion);
    return $data;
}

