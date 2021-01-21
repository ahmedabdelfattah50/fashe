<?php

// this the timer to return to main page after do any action like (add - delete - update)
function timer($seconds,$page) {
    echo "<p class='alert alert-warning'>Your will leave this page after " . $seconds . "s</p>";
    header("Refresh:" . $seconds . ";url=" . $page);
}

// the counter to calculate the number of Admins
function totalAdmins(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(*) FROM hosters");
    $stmt->execute();
    return $stmt->fetchColumn();
} 

// select Custom Admin
function selectCustomAdmin($status){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM hosters WHERE trust_status = $status");
    $stmt->execute();
    return $stmt->fetchAll();
}

// check User Existing
function checkAdminExisting($username,$email){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM hosters WHERE username = :username OR email = :email");
    $stmt->execute(array(
        ':username' => $username,
        ':email' => $email
    ));
    return $stmt->fetchColumn();
}