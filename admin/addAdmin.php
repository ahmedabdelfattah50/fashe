<?php 
    session_start();

    if(isset($_SESSION['username']) && is_numeric($_GET['admin'])){
        include '../init.php';
        $adminDegree = $_GET['admin'];
    ?>
    
    <div class="container">
        <div id='insertingResult' style='display: none;'></div>
        <br><h2>Add New <?php echo ($adminDegree == 1 ? "Admin 1" : "Admin 2") ?></h2><br> 
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control name_add" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control password_add" placeholder="Password" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control username_add" placeholder="Userame" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control email_add" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="tel" class="form-control phone_add" placeholder="Phone" required>
                </div>
                <?php if($adminDegree == 1){?>
                        <input type="text" class="form-control status_add d-none" value='1'>
                <?php } else {?>
                        <input type="text" class="form-control status_add d-none" value='2'>
                <?php }?>
            </div>
            <button class="btn btn-primary adminSignIn">Sign in</button>
        </form>
    </div>

    <script>    
        $(document).ready(function(){
            $('.adminSignIn').on('click',function(e){
                e.preventDefault();
                var name_add = $('.name_add').val(),
                    password_add = $('.password_add').val(),
                    username_add = $('.username_add').val(),
                    email_add = $('.email_add').val(),
                    phone_add = $('.phone_add').val(),
                    status_add = $('.status_add').val(),
                    insertingResult = $('#insertingResult');
                $.ajax({
                    url:'includes/functions/insertAdmin.php',
                    method:'POST',
                    cashe:false,
                    data:{
                        name_add:name_add,
                        password_add:password_add,
                        username_add:username_add,
                        email_add:email_add,
                        phone_add:phone_add,
                        status_add:status_add
                    },
                    success:function(resultData){
                        if( resultData == 'success'){
                            insertingResult.show();
                            insertingResult.html("<br><h2 class='alert alert-success'>The Admin has been added successfuly<h2>");
                        } else {
                            insertingResult.show();
                            insertingResult.html("<br><h2 class='alert alert-danger'>" + resultData + "<h2>");
                        }
                    }
                });	
            });
        });
    </script>

    <?php
    } else {
        header("Location:index.php");
        exit();
    }
