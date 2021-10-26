    <!-- Display the countdown timer in an element -->

<?php
    
    if(!empty($_POST["send"])) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $dob = $_POST["dob"];
      $abtYrSelf = $_POST["abtYrSelf"];
      $captcha = $_POST["captcha"];


      $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);

      if(empty($captcha)) {
        $captchaError = array(
          "status" => "alert-danger",
          "message" => "Please enter the captcha."
        );
      }
      else if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
        $in=  "INSERT INTO `users`(`name`, `email`, `dob`, `abtYrSelf`, `captcha`) VALUES ('$name ','$email','$dob','$abtYrSelf','$captchaUser')";
        $query=mysqli_query($conn,$in);
        if($query){

          $captchaError = array(
            "status" => "alert-success",
            "message" => "Your form has been submitted successfully."
          );
              }else{
            $captchaError = array(
            "status" => "alert-danger",
            "message" => "Something went wrong.retry again...!!"
          );      
        }
        }
        
       else {
        $captchaError = array(
          "status" => "alert-danger",
          "message" => "Captcha is invalid."
        );
      }
    }  

?>
    <p id="timer" class='text-center alert-warning p-2' style="font-size:20px;font-weight:bold;">Fill the form within  <span id='time'>03:00</span></p>

<form action="" name="contactForm" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label>Date of Birth</label>
        <input type="date" class="form-control" name="dob" id="dob" required>
    </div>

    <div class="form-group">
        <label>About Yourself</label>
        <!-- <input type="date" class="form-control" name="dob" id="dob"> -->
        <textarea name="abtYrSelf" id="abtYrSelf" cols="43" rows="5" required></textarea>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <label>Enter Captcha</label>
            <input type="text" class="form-control" name="captcha" id="captcha" required>
        </div>
        <div class="form-group col-6">
            <label>Captcha Code</label>
            <img src="scripts/captcha.php" alt="PHP Captcha">
        </div>
    </div>

    <input type="submit" name="send" value="Send" class="btn btn-dark btn-block">
</form>