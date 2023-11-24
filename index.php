<?php

include('config.php');

$color = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Colleting data from the form and assigning them into a variable
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if the feedback already exists
    $checkSql = "SELECT * FROM `user_feedback` WHERE UserName = ? AND UserEmail = ? AND UserFeedBack = ?";
    $checkStmt = $connect->prepare($checkSql);
    $checkStmt->bind_param("sss", $name, $email, $message);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $duplicate_data = "Feedback already exists.";
        $color = "danger";
    } else {
        // Insert the feedback
        $insertSql = "INSERT INTO `user_feedback` (UserName, UserEmail, UserFeedBack) VALUES (?, ?, ?)";
        $insertStmt = $connect->prepare($insertSql);
        $insertStmt->bind_param("sss", $name, $email, $message);

        if ($insertStmt->execute()) {
            $success_message =  "Feedback Submitted ✅";
            $color = "success";
            header('Location: feedPage.php');
            die;
        } else {
            echo "Error occur while submitting data: " . $insertStmt->error;
        }
    
        $insertStmt->close();
    }
    $checkStmt->close();
}


?>


<!DOCTYPE html>
<html lang="en">


        <?php include("header.php"); ?>
    
      
      <div class="container">
      <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4  mt-2" >   
                <div class="text-center">
                    <img src="https://cdn.iconscout.com/icon/free/png-512/free-feedback-chat-comment-discussion-message-complaint-bubble-6-5637.png?f=webp&w=256" alt="Logo" width="150" height="150" class="d-inline-block align-text-top centered-image">
                </div>
                <h1 class="text-center">Feed Back</h1>
                <hr>
                <p class="text-center">Kindly leave a feed back for me</p>
                <span class="text-<?php echo isset($color) && !empty($color) ? $color : null; ?> text-center"><?php if(isset($duplicate_data) && !empty($duplicate_data)){ echo $duplicate_data; }  ;?> <?php echo isset($success_message) && !empty($success_message) ? $success_message : null ?></span>

                <div>
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-2">
                        <div class="mt-2">
                            <label class="">Name</label>
                            <input type="text" name="name" required class="form-control"/>
                        </div>
                        <div class="mt-2">
                            <label class="">Email</label>
                            <input type="text" name="email" required class="form-control"/> 
                        </div>
                        <div class="mt-2">
                            <label class="">Feedback</label>
                            <textarea class="form-control" required name="message"></textarea> 
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary form-control mt-4">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
      </div>

<?php include("footer.php") ;?>
     


</html>