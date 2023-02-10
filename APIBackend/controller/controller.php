<?php
include "../model/DAO.php";
switch($_GET['page']) {
    case 'login':
        try{
            if($_POST){
                $_POST['_password'] = sha1($_POST['_password']);
                $data = get_user();
                echo json_encode($data);
            }
        }catch(Exception $e){
            echo $e;
        } 
        break;
    case 'register':
        try{
            if($_POST){
                $validate = validate_email($_POST['_email']);
                $_POST['_password'] = sha1($_POST['_password']);
                if($validate == TRUE){
                    $data = insert_user();
                    return json_encode($data);
                }
            }
        }catch(Exception $e){
            return $e;
        }
        break;
}

function validate_email($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return TRUE;
    }else{
        return FALSE;
    }
}
?>