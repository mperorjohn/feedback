<?php    
include("config.php");
include("header.php");

$sql = "SELECT * FROM  user_feedback";



?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px; /* Adjust the margin as needed */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        
    }
</style>


<table >
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Feedback</th>
    </tr>
    <?php
    $result = $connect->query($sql);
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>" . $id = $row['Id'] . "</td>";
          echo "<td>" . $name = $row['UserName'] . "</td>";
          echo "<td>". $email = $row['UserEmail'] . "</td>";
          echo "<td>" . $feedback = $row['UserFeedBack'] . "</td>";
          echo "</tr>";
        };
    
    }else {
        echo "<tr><td colspan='5'>No data found in the database.</td></tr>";
    }
    ?>
    </tr>
</table>

<?php include("footer.php");
