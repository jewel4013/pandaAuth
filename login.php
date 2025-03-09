
<?php
    session_start();
    $pageTitle = "Login page";
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
        }
        if(isset($_SESSION["users"][$email])){
            $user_email = $_SESSION["users"][$email];

            if($user_email == $password){
                $massageTest = "Login success";
                $massageType = "success";

                header("Location: dashboard.php");

            }else{
                $massageTest = "Invalid email or password";
                $massageType = "danger";
            }
        }else{
            $massageTest = "Invalid email or password";
            $massageType = "danger";
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
            
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
    


<?php
    include 'includes/footer.php';
?>