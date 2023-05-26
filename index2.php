<!DOCTYPE html>
<html>
<head>
    <title>Toastify Example</title>
    <!-- Include Toastify CSS using CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        /* Custom styles for the dark theme */
        .custom-alert {
            background-color: #333;
            color: #fff;
        }
        .custom-alert h3 {
            color: #ff4d4d;
        }
    </style>
</head>
<body>

<!-- Sign-up form -->
<form method="POST" action="index2.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Sign Up">
</form>

<!-- Include Toastify JavaScript using CDN -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- JavaScript function for displaying the notification -->
<script>
    function displayNotification(message,variant) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "Top",
            position: "right",
            close: true,
            stopOnFocus: true,
            className: "toastify-" + variant
        }).showToast();
    }
     
</script>  
   
   
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' ): ?>
        <?php $successMessage='True'; ?>
        <script>
 displayNotification('<?php echo $successMessage ?>', "success");

        </script>
   
    <?php endif; ?>
    


</body>
</html>
