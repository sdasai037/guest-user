<?php
try {
    $con = mysqli_connect("localhost", "root", "", "2024_25_4DCE_A_B_Sample");

} catch (Exception $e) {
    echo "Error in Connecting with Database Server" . $e->getMessage();;
}
