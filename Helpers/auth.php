
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
         Include('../Mailers/onboarding_mail.php');
   
#SQL
$sql="INSERT INTO users(user_id,user_name,user_email,user_password) VALUE('$user_id','$user_name','$user_email','$user_password')";
if (mysqli_query($mysqli,$sql)&& $mail->send()) {
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


#Login Normal Way

if(isset($_POST['sign_in'])){

    #Declare same variables

    $user_email= mysqli_real_escape_string($mysqli,$_POST['user_email']);
    $user_password= mysqli_real_escape_string($mysqli,$_POST['user_password']);

    #Check user type
$sql="SELECT * FROM users WHERE user_email='$user_email'";
if (mysqli_num_rows(mysqli_query($mysqli, $sql)) > 0) {
    while ($user = mysqli_fetch_array(mysqli_query($mysqli, $sql))) {
       
if ($user['user_type'] = '') {
        #if user Type is not Defined
$_SESSION['success'] = "Set Up Account";
    header('Location: onboarding_user');
} else {

    $_SESSION['success'] = "Login Successively";
    header('Location: dashboard');
}


}}}