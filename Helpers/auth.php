
<?php
# Sign Up in Normal way

if (isset($_POST['sign_up'])) {
    #Declare All Post REQUESTS
    $user_id=mysqli_real_escape_string($mysqli,$ID);
    $user_name=mysqli_real_escape_string($mysqli,$_POST['user_name']);
    $user_email=mysqli_real_escape_string($mysqli,$_POST['user_email']);
    $user_password=mysqli_real_escape_string($mysqli,password_hash($_POST['user_password'],PASSWORD_DEFAULT));
    $confirm_password=mysqli_real_escape_string($mysqli,password_hash($_POST['confirm_password'],PASSWORD_DEFAULT));

    if($user_password=$confirm_password){
             #Prevent Double Entries 
     $sql = "SELECT * FROM  users WHERE user_email = '{$user_email}' ";
     $res = mysqli_query($mysqli, $sql);
     if (mysqli_num_rows($res) > 0) {
         $err = "user name already exists";
     } else {
         #Store to Users Table
         //&& $mail->send()
#SQL
$sql="INSERT INTO users(user_id,user_name,user_email,user_password) VALUE('$user_id','$user_name','$user_email','$user_password')";
if (mysqli_query($mysqli,$sql) ) {
    Include('../Mailer/onboarding_mail.php');
    $_SESSION['success'] = "Sign up is Done";
    header('Location: sign_in');
    } else {
        $err = "Failed !Try Again";
    }
}

}
    }else{
        $err="Password is didnot Match.";
    }


