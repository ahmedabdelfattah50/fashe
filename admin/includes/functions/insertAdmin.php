<?php
    include '../../../conection.php';
    require_once 'functions.php';
        $name_add               = $_POST['name_add'];
        $password_add           = $_POST['password_add'];
        $password_add_hased     = password_hash($password_add, PASSWORD_DEFAULT);
        $username_add           = $_POST['username_add'];
        $email_add              = $_POST['email_add'];
        $phone_add              = $_POST['phone_add'];
        $status_add             = $_POST['status_add'];

        if(!empty($name_add && $password_add && $username_add && $email_add && $phone_add && $status_add)){

            $checkAdminExisting = checkAdminExisting($username_add , $email_add);
            if($checkAdminExisting){
                echo "Sorry this Admin is existed";
            } else {
                $stmt = $con->prepare("INSERT INTO hosters(name,username,password,email,phone,date,trust_status) VALUES(:nameInsert,:username,:passwordInsert,:emailInsert,:phoneInsert,now(),:trust_status)");
                
                $stmt->execute(array(
                    ":nameInsert"           => $name_add,                    
                    ":username"             => $username_add,
                    ":passwordInsert"       => $password_add_hased,
                    ":emailInsert"          => $email_add,
                    ":phoneInsert"          => $phone_add,
                    ":trust_status"         => $status_add
                ));
                echo 'success';
            }
        } else {
            echo 'Error to Insert the Admin, please check the admin data';
        }