<?php
    require("connection.php");
    session_start();

    // #Log-In
    if(isset($_POST['login']))
    {
        $query_l="SELECT * FROM `users` WHERE `email`='$_POST[username_email]' OR `username`='$_POST[username_email]'";
        $result_l=mysqli_query($con,$query_l);
        if($result_l){
            if(mysqli_num_rows($result_l)==1){
                $result_fetch_l=mysqli_fetch_assoc($result_l);
                if(password_verify($_POST['password'],$result_fetch_l['password'])){
                    #if password matches

                    $_SESSION['logged_in']=true;
                    $_SESSION['username']=$result_fetch_l['username'];
                    if(isset($_POST['remember_me'])){
                        setcookie('username_email',$_POST['username_email'],time()+60);
                        setcookie('password',$_POST['password'],time()+60);
                    }
                    header("location: index.php");
                }
                else{
                    
                echo"<script>
                alert('Incorrect Password');
                window.location.href='index.php';
            </script>"; 
                }

            }
            else{
                echo"<script>
                    alert('cannot execute query');
                    window.location.href='index.php';
                </script>";  
            }
        }
        else{
            echo"<script>
            alert('User/Email not Registered');
            window.location.href='index.php';
            </script>";
        }
    }

    // #Registration
    if(isset($_POST['register'])){
        $user_exist_query="SELECT * FROM `users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
        $result=mysqli_query($con,$user_exist_query);

        if($result){
            if(mysqli_num_rows($result)>0){
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['username']=$_POST['username']){
                    echo"<script>
                    alert('$result_fetch[username] - Username already taken');
                    window.location.href='index.php';
                    </script>";
                }
                else{
                    echo"<script>
                    alert('$result_fetch[email] - Email already in use');
                    window.location.href='index.php';
                    </script>";
                }
            }
            else{#Usrname or email is not taken
                $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                $query="INSERT INTO `users`(`fullname`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
                if(mysqli_query($con,$query)){
                    echo"<script>
                        alert('REGISTRATION SUCCESSFULL');
                        window.location.href='index.php';
                    </script>";
                }
                else{
                    echo"<script>
                        alert('Cannot Execute Query');
                        window.location.href='index.php';
                    </script>";

                }
            }
        }
        else{
            echo"<script>
            alert('Cannot Execute Query');
            window.location.href='index.php';
            </script>";
        }

    }

?>