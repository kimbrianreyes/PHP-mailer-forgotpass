<?php
require_once("include/initialize.php");
$_SESSION['attempt']=0;

// login confirmation
if (isset($_SESSION['UserID'])) {
  redirect(web_root . "index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="img/mainlogo.png">
    <!-- Font Awesome -->
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />


    <style>
    /* .mydiv {
        setting alpha = 0.1
        background: rgba(0, 151, 19, 0.3);
    } 
*/
    .mainbg {
        background: rgb(128, 0, 0);
        background: linear-gradient(90deg, rgba(128, 0, 0, 1) 0%, rgba(255, 255, 255, 1) 50%, rgba(35, 35, 35, 1) 100%);
    }
    </style>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="vh-100 mainbg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-5">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-12 col-lg-12 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="post" autocomplete="off">
                                        <div class="align-items-center mb-3 pb-1 text-center">
                                            <img src="img/mainlogo.png" alt="login form" class="img-fluid"
                                                style="border-radius: 25px; width:30%;" />
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Reset
                                            your password</h5>
                                        <div class="form-outline mb-2">
                                            <input type="text" id="Questions" name="Questions"
                                                class="form-control form-control-lg" />

                                        </div>
                                        <select name="Question" id="form2Example17"
                                            class="form-select form-control-lg mb-2"
                                            onchange="handleSelectChange(event)" required>
                                            <option value="">Select Question</option>
                                            <?php 
                                  $sql = "SELECT * FROM `question`";
                                  $mydb->setQuery($sql);
                                  $cur = $mydb->loadResultList();
                                  foreach ($cur as $res) {
                                    # code...
                                    echo '<option value='.$res->Question.'>'.$res->Question.'</option>';
                                  } 
                          ?>
                                        </select>


                                        <div class="form-outline mb-2">
                                            <input type="password" id="Answer" name="Answer"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Answer</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="NewPassword" name="NewPassword"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">New Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="btnLogin"
                                                id="btnLogin">Submit</button>
                                        </div>

                                        <a class="small" href="login.php" style="color: #a80000;">Login</a>
                                        <!--<p class="mb-1 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="register.php" style="color: #393f81;">Register here</a></p>-->
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
        integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>

    <script>
    function handleSelectChange(event) {
        var selectElement = event.target;
        var value = selectElement.value;
        var selectedText = selectElement.options[selectElement.selectedIndex].text;
        //alert(selectedText);
        document.getElementsByName('Questions')[0].value = selectedText;
    }

    function ShowPass() {
        var x = document.getElementById("pword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
</body>

</html>

<?php

if (isset($_POST['btnLogin'])) {
  $Question = trim($_POST['Questions']);
  $Answer  = trim($_POST['Answer']);
  $NewPassword  = trim($_POST['NewPassword']);
  $newpass = sha1($NewPassword);

  
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "printing";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "UPDATE user_account SET `Password`='$newpass' WHERE Question='$Question' and Answer='$Answer'";
  
  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Password Reset!")</script>';
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
}
?>