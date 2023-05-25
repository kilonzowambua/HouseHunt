<?php


//---------Password Reset Token generator -------------------------------------------//
$length = 30;
$tk = substr(str_shuffle("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM1234567890"), 1, $length);

//------------Dummy Password Generator----------------------------------------------//
$length = 8;
$rc = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"), 1, $length);

// ------- ID--------------------------------------------------------------------//
$length = date('y');
$ID = bin2hex(random_bytes($length));

// ------- Checksum--------------------------------------------------------------------//
$length = 12;
$checksum = bin2hex(random_bytes($length));

// ---Codes----------------------------------------------------------------//
$alpha = 1;
$beta = 4;
$a = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"), 1, $alpha);
$b = substr(str_shuffle("1234567890"), 1, $beta);

$alpha = 10;
$paycode = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"), 1, $alpha);

/* System Admin Default Password */
$length = 8;
$defaultPass = substr(str_shuffle("QWERTYUIOPwertyuioplkjLKJHGFDSAZXCVBNM1234567890qhgfdsazxcvbnm"), 1, $length);


/* System Generated ID */
$length = date('y');
$sys_gen_id = bin2hex(random_bytes($length));

/* Alternative Sys Generated ID 1 */
$length = date('y');
$sys_gen_id_alt_1 = bin2hex(random_bytes($length));

/* Alternative System Generated ID 2 */
$length = date('y');
$sys_gen_id_alt_2 = bin2hex(random_bytes($length));
/* user id */
$staff_id = 'STF-' . substr(str_shuffle("1234567890"), 1, 4);
/* user_generated password */
$user_gen_password =  substr(str_shuffle("QWERTYUIOPwertyuioplkjLKJHGFDSAZXCVBNM1234567890qhgfdsazxcvbnm"), 1, 6);
