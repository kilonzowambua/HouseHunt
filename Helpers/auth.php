
<?php
# Sign Up in Normal way

if (isset($_POST['sign_up'])) {
    // Declare and initialize variables
$user_id = mysqli_real_escape_string($mysqli, $ID);
$user_name = mysqli_real_escape_string( $mysqli, $_POST['user_name']);
$user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
$user_password = $_POST['user_password'];
$confirm_password = $_POST['confirm_password'];
$user_passwordhash = mysqli_real_escape_string($mysqli,password_hash($user_password,PASSWORD_DEFAULT));

$stmt = $mysqli->prepare("CALL SignUpUser(?, ?, ?, ?, ?, ?, @errorMessage)");
$stmt->bind_param("ssssss", $user_id, $user_name, $user_email, $user_password, $confirm_password,$user_passwordhash);
$stmt->execute();

$selectErr = $mysqli->query('SELECT @errorMessage')->fetch_assoc();
$errorMessage = $selectErr['@errorMessage'];

if (empty($errorMessage)) {
            // Store user data and send onboarding email
           // include('../Mailers/onboarding_mail.php');

            $_SESSION['success'] = "Sign up is Done";
    header('Location: sign_in.php?page=Sign Up');
    exit();
} else {
    $err = $errorMessage;
}
$stmt->close();

}



#Login Normal Way

if (isset($_POST['sign_in'])) {
    // Declare and initialize variables
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($mysqli, $_POST['user_password']);
    $err = "";

    // Check user existence
    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($user_password, $user['user_password'])) {
            // User type check
            if ($user['user_type'] == '') {
                $_SESSION['success'] = "Set Up Account";
                $_SESSION['user_id'] = $user['user_id'];
                header('Location: onboarding_user');
                exit();
            } else {
                $_SESSION['success'] = "Login Successful";
                header('Location: dashboard');
                exit();
            }
        } else {
            $err = "Failed! Please try again.";
        }
    } else {
        $err = "Failed! Please try again.";
    }
}


#Onboarding settings
if (isset($_POST['setup'])) {
    // Declare and initialize variables
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_phone_no = mysqli_real_escape_string($mysqli, $_POST['user_phone_no']);
    $user_location = mysqli_real_escape_string($mysqli, $_POST['user_location']);
    $user_type = mysqli_real_escape_string($mysqli, $_POST['user_type']);

    // Update the info
$stmt = $mysqli->prepare("CALL UpdateUserAccount(?, ?, ?, ?,@errorMessage)");
$stmt->bind_param("ssss", $user_id, $user_phone_no, $user_location, $user_type);
$stmt->execute();

$selectErr = $mysqli->query('SELECT @errorMessage')->fetch_assoc();
$errorMessage = $selectErr['@errorMessage']; 
  
        if(!empty($errorMessage)){

                $_SESSION['success'] = $errorMessage;
                header('Location: dashboard');
                exit();
            
        } else {
            $err = "Failed! Please try again.";
        }
    
}