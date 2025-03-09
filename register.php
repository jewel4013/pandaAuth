
<?php
    session_start();
    $pageTitle = "Register Page";
    include 'includes/header.php';

    include 'includes/navBar.php';



    $massageTest = "";
    $massageType = "";

    // Logical Section
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password']; 


        // simple validation 
        if(empty($email) || empty($password)){
            $massageTest = "Email and password are required";
            $massageType = "danger";
        }else{            
            $_SESSION["users"][$email] = $password;
            $massageTest = "Registration success and you can login now.";
            $massageType = "success";
        }
        

        

    }

?>


<div class="row offset-md-3">

    <div class="col-6 mt-5">
        <?php if($massageTest != ""){ ?>
            <div class="alert alert-<?php echo $massageType?> my-2" role="alert" >
                <?php echo $massageTest ?>
            </div>
        <?php } ?>
        

        <form method="POST" class="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
    


<?php
    include 'includes/footer.php';
?>