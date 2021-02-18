<?php 
    session_start();
    if(isset($_SESSION['username']) && ($_GET['do'] == 'Edit') && is_numeric($_GET['adminDegree']) && is_numeric($_GET['ID']) ){
        include '../init.php';
        $adminDegree = $_GET['adminDegree'];
        $adminEditID = $_GET['ID'];

        $adminRow = selectPersonalAdmin($adminEditID);
    ?>
    
    <div class="container">
        <div id='updateResult' style='display: none;'></div>
        <?php 
            if($_SESSION['ID'] == $adminEditID ){?>
                <br><h2>Edit your data</h2><br> 
            <?php } else {?>
                <br><h2>Edit <?php echo ($adminDegree == 1 ? "Admin 1" : "Admin 2") ?></h2><br> 
            <?php }
        ?>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="text" value='<?php echo $adminRow['ID']?>' class='form-control ID_edit d-none'>
                    <label>Name</label>
                    <input type="text" class="form-control name_edit" placeholder="Name" value='<?php echo $adminRow['name']?>' required>
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control password_edit" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control username_edit" placeholder="Userame" value='<?php echo $adminRow['username']?>' required>
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control email_edit" placeholder="Email" value='<?php echo $adminRow['email']?>' required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="tel" class="form-control phone_edit" placeholder="Phone" value='0<?php echo $adminRow['phone']?>' required>
                </div>

                <div class="form-group col-md-6">
                    <?php if($adminDegree == 1){?>
                        <label>Admin Degree</label>
                        <select class='form-control status_edit'>
                            <option value="1" selected>Admin 1</option>
                            <option value="2">Admin 2</option>
                        </select>
                    <?php } else if($_SESSION['trust_status'] == 1 && $adminDegree == 2){?>
                        <label>Admin Degree</label>
                        <select class='form-control status_edit'>
                            <option value="1">Admin 1</option>
                            <option value="2" selected>Admin 2</option>
                        </select> 
                    <?php } else if($_SESSION['trust_status'] == 2){?>
                        <input type="text" class="form-control status_edit d-none" placeholder="Admin Degree" value='2' readonly>
                    <?php }?> 
                </div>

            </div>
            <button class="btn btn-primary adminUpdate">Update</button>
        </form>
    </div>

    <script>    
        $(document).ready(function(){
            $('.adminUpdate').on('click',function(e){
                e.preventDefault();
                var ID_edit = $('.ID_edit').val(),
                    name_edit = $('.name_edit').val(),
                    password_edit = $('.password_edit').val(),
                    username_edit = $('.username_edit').val(),
                    email_edit = $('.email_edit').val(),
                    phone_edit = $('.phone_edit').val(),
                    status_edit = $('.status_edit').val(),
                    updateResult = $('#updateResult');
                $.ajax({
                    url:'includes/functions/updateAdmin.php',
                    method:'POST',
                    cashe:false,
                    data:{
                        ID_edit:ID_edit,
                        name_edit:name_edit,
                        password_edit:password_edit,
                        username_edit:username_edit,
                        email_edit:email_edit,
                        phone_edit:phone_edit,
                        status_edit:status_edit
                    },
                    success:function(resultData){
                        if( resultData == 'success'){
                            updateResult.show();
                            updateResult.html("<br><h2 class='alert alert-success'>The Admin data has been Updated successfuly<h2>");
                        } else {
                            updateResult.show();
                            updateResult.html("<br><h2 class='alert alert-danger'>" + resultData + "<h2>");
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
