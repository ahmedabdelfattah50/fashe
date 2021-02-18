<?php
    include '../../../conection.php';
    require_once 'functions.php';
        $ID_edit                 = $_POST['ID_edit'];
        $name_edit               = $_POST['name_edit'];
        $password_edit           = $_POST['password_edit'];
        // get the data of the user by his ID from the database
        $adminData               = selectPersonalAdmin($ID_edit);
        if(empty($password_edit)) {
            $password_edit_hased = $adminData['password'];
        } else {
            $password_edit_hased = password_hash($password_edit, PASSWORD_DEFAULT);
        }
        $username_edit           = $_POST['username_edit'];
        $email_edit              = $_POST['email_edit'];
        $phone_edit              = $_POST['phone_edit'];
        $status_edit             = $_POST['status_edit'];

        if(!empty($name_edit && $username_edit && $email_edit && $phone_edit && $status_edit)){
            if (!($status_edit == 1) && !($status_edit == 2)){
                $status_edit = 2; 
            }
            $checkAdminExisting = checkAdminExisting($username_edit , $email_edit);
            if($checkAdminExisting){
                $stmt = $con->prepare("UPDATE hosters SET name = ?,username = ?, password = ?,email = ?,phone = ?,trust_status = ? WHERE ID = ?");
                
                $stmt->execute(array(
                    $name_edit,                    
                    $username_edit,
                    $password_edit_hased,
                    $email_edit,
                    $phone_edit,
                    $status_edit,
                    $ID_edit
                ));
                echo 'success';
            } else {
                echo "Sorry this Admin is not existed";
            }
        } else {
            echo 'Error to Update the Admin, please check the admin data ' . $ID_edit . " " . $status_edit;
        }