<?php
include("config.php");
include("header.php");
include("deleteFeedBack.php");

$sql = "SELECT * FROM user_feedback";
$result = $connect->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove'])) {
    $idToRemove = $_POST['row_id'];
    deleteFeed($idToRemove);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

?>

<style>
    .feedback-container {
        border: 2px ridge blue;
        border-radius: 12px;
    }

    .feedback-container:hover {
        background-color: blue;
        color: white;
        box-shadow: 10px 20px 30px 5px black;
        transition:0.5s;
    }
</style>

<div>
    <h1 class="text-center mt-5">Past Feedback</h1>
</div>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['Id'];
        $name = $row['UserName'];
        $email = $row['UserEmail'];
        $feedback = $row['UserFeedBack'];
        $feed_date = $row['FeedbackDate'];
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="" method="POST">

                        <div class="feedback-container text-center  container mb-5">
                            <p class="fs-4 mt-5"><?php echo $feedback; ?></p>
                            <p><?php echo " By ". $name; ?> </p>
                            <p><?php echo "Date:  <code>" . $feed_date . "</code>" ; ?></p>
                            <input type="hidden" name="row_id" value="<?php echo $id; ?>">
                            <button type="submit" name="remove" class="btn mt-4 mb-4 btn-danger">Remove</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <?php
    }
} else {
    echo " feedback is empty";
}
?>

<?php include("footer.php"); ?>
