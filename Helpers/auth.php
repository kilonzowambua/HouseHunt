
<?php
# Sign Up in Normal way

if (isset($_POST['sign_up'])) {
    // Declare and initialize variables
    $user_id = mysqli_real_escape_string($mysqli, $ID);
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($mysqli, password_hash($_POST['user_password'], PASSWORD_DEFAULT));
    $confirm_password = mysqli_real_escape_string($mysqli, password_hash($_POST['confirm_password'], PASSWORD_DEFAULT));
    $err = "";

    if ($user_password == $confirm_password) {
        // Check if user already exists
        $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) > 0) {
            $err = "User name already exists";
        } else {
            // Store user data and send onboarding email
            include('../Mailers/onboarding_mail.php');

            $sql = "INSERT INTO users (user_id, user_name, user_email, user_password) VALUES ('$user_id', '$user_name', '$user_email', '$user_password')";

            if (mysqli_query($mysqli, $sql) && $mail->send()) {
                $_SESSION['success'] = "Sign up is Done";
                header('Location: sign_in.php');
                exit();
            } else {
                $err = "Failed! Please try again.";
            }
        }
    } else {
        $err = "Password does not match.";
    }

    
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
