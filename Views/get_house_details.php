<?php

include('../Config/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedHouseNo = $_POST["house_no"];
    $query = "CALL ManageHouse('get_by_house_no',NULL, NULL, NULL, NULL, NULL, ?, NULL, NULL, NULL, NULL)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $selectedHouseNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            'house_id' => $row["house_id"],
            'house_user_id' => $row["house_user_id"],
            'house_title' => $row["house_title"],
            'house_type' => $row["house_type"],
            'house_location' => $row["house_location"],
            'house_price' => $row["house_price"]
        );
        echo json_encode($response);
    } else {
        echo json_encode(null);
    }

    $stmt->close();
    $mysqli->close();
}
?>
