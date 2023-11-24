
<?php
include("config.php");

function deleteFeed($id){
    global $connect;

    $deleteRow = "DELETE FROM user_feedback WHERE Id = ?";
    $deleteStmt = $connect->prepare($deleteRow);
    $deleteStmt->bind_param("i", $id);  

    if ($deleteStmt->execute()) {
        // echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $deleteStmt->error;
    }

    $deleteStmt->close();
}
?>