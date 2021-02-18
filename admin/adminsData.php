<?php
    session_start();

    if(isset($_SESSION['username']) && ($_SESSION['trust_status'] == 1 || $_SESSION['trust_status'] == 2) && is_numeric($_GET['admin']) ) {
        include "../init.php";
        
        echo "<div class='container'>";
            $adminStatus = $_SESSION['trust_status'];
            $adminDegree = $_GET['admin'];
            $rows = selectCustomAdmin($adminDegree);
        
            echo "<br><h2>Table of " . ($adminDegree == 1 ? 'Admin 1' : 'Admin 2') . "</h2><br>";
            echo "<div class='total_table'>";
            echo "<table class='table table-striped table-dark'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th scope='col'>#</th>";
                        echo "<th scope='col'>Name</th>";
                        echo "<th scope='col'>username</th>";
                        echo "<th scope='col'>Email</th>";
                        echo "<th scope='col'>Register Date</th>";
                        echo "<th scope='col'>Options</th>";
                    echo "</tr>";
                echo "</thead>";
            foreach($rows as $row) {    
                echo "<tbody>";
                    if ($_SESSION['ID'] == $row['ID']) {
                        echo "<tr style='background:#303960;'>";
                    } else {
                        echo "<tr>";
                    }                   
                        echo "<th scope='row'>" . $row['ID'] . "</th>";
                        if ($_SESSION['ID'] == $row['ID']) {
                            echo "<td>" . $row['name'] . " <i class='fas fa-star'></i></td>";
                        } else {
                            echo "<td>" . $row['name'] . "</td>";
                        }
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";

                        if($_SESSION['username'] == $row['username']){
                            echo "<td>
                            <a href='editAdmin.php?do=Edit&adminDegree=" . $adminDegree . "&ID=" . $row['ID']  . "'> <button style='border:none; padding: 0 10px; font-size:18px;' class='btn btn-info'>Edit</button></a>
                            <a href='?do=Delete&ID=" . $row['ID']  . "'><button style='border:none; padding: 0 10px; font-size:18px;' class='btn btn-danger'>Delete</button></a>
                            </td>";
                        } else {
                            if(($adminStatus == 1) && ($adminDegree == 2)) {
                                echo "<td>
                                <a href='editAdmin.php?do=Edit&adminDegree=" . $adminDegree . "&ID=" . $row['ID']  . "'> <button style='border:none; padding: 0 10px; font-size:18px;' class='btn btn-info'>Edit</button></a>
                                <a href='?do=Delete&ID=" . $row['ID']  . "'><button style='border:none; padding: 0 10px; font-size:18px;' class='btn btn-danger'>Delete</button></a>
                                </td>";
                            } else {
                                echo "<td>
                                <a href='?do=View&ID=" . $row['ID']  . "'> <button style='border:none; padding: 0 10px; font-size:18px;' class='btn btn-warning'>View Data</button></a>
                                </td>";
                            }
                        }
                            echo "</tr>";
                echo "</tbody>";
            } 
            echo "</table>";
            echo "</div>";
            
            if( $adminStatus == 1 ){
                echo "<a href='addAdmin.php?admin=1'><button style='border:none; padding: 5px 10px; font-size:18px; margin: 10px 30px 30px 0;' class='btn btn-success'>Add Admin 1  <i class='fas fa-user-plus'></i></button></a>";
                echo "<a href='addAdmin.php?admin=2'><button style='border:none; padding: 5px 10px; font-size:18px; margin: 10px 30px 30px 0;' class='btn btn-primary'>Add Admin 2  <i class='fas fa-user-plus'></i></button></a>";
                
                if($adminDegree == 1){
                    echo "<a href='adminsData.php?admin=2'><button style='border:none; padding: 5px 10px; font-size:18px; margin: 10px 30px 30px 0;' class='btn btn-warning'>View Admins 2 <i class='fas fa-users'></i></button></a>";
                } else {
                    echo "<a href='adminsData.php?admin=1'><button style='border:none; padding: 5px 10px; font-size:18px; margin: 10px 30px 30px 0;' class='btn btn-warning'>View Admins 1 <i class='fas fa-users'></i></button></a>";
                }
                
                echo "<a href=''><button style='border:none; padding: 5px 10px; font-size:18px; margin: 10px 30px 30px 0;' class='btn btn-secondary'>View User <i class='fas fa-users'></i></button></a>";
            } else {
                echo "<a href='?do=Add'><button style='border:none; padding: 5px 10px; font-size:18px; margin-bottom: 30px;' class='btn btn-warning'>View User <i class='fas fa-users'></i></button></a>";
            }
        echo "</div>";
    } else {
        header("Location:index.php");
        exit();
    }