<?php    
    session_start();
    
    if(isset($_SESSION['username'])) {
        include "../init.php";
    ?>
    <div class="container">
        <div class="d-flex justify-content-center" style="border:none; text-align: center; box-shadow: 0 0 40px #ddC; border-radius: 10px; padding: 50px 0; margin-top: 100px">
            <div style="margin:20px;">
                <h2>Admins</h2>
                <?php  
                    if($_SESSION['trust_status'] == 1) {?>
                        <a href="adminsData.php?admin=1"><h3><?php echo totalAdmins()?></h3></a>
                    <?php } else {?>
                        <a href="adminsData.php?admin=2"><h3><?php echo totalAdmins()?></h3></a>
                    <?php }?>
            </div>
            <div style="margin:20px;">
                <h2>Users</h2>
                <a href="#"><h3>50</h3></a>
            </div>
            <div style="margin:20px;">
                <h2>Products</h2>
                <a href="#"><h3>50</h3></a>
            </div>
            <div style="margin:20px;">
                <h2>Products</h2>
                <a href="#"><h3>50</h3></a>
            </div>
            <div style="margin:20px;">
                <h2>Blogs</h2>
                <a href="#"><h3>50</h3></a>
            </div>
        </div>
    </div>
<?php
    } else {
        header("Location:index.php");
        exit();
    }