<?php 
    session_start();

    if(isset($_SESSION['unique_id'])) {
        header("Location:index.php");
    }

    include_once "includes/head.php";
    require_once("../../app/config.php");
?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-6 align-center">Log In</h1>
                    <hr>

                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = mysqli_real_escape_string($conn, $_POST['password']);

                            if(!empty($username) && !empty($password)) {
                                $sqlUserData = mysqli_query($conn, "SELECT password FROM users WHERE username = '{$username}' LIMIT 1;");
                                $finfo = $sqlUserData->fetch_array(MYSQLI_NUM);

                                if (!is_array($finfo) || !count($finfo) === 1) {
                                    echo '<div class="alert alert-danger" role="alert">Sorry! An error occured.</div>';
                                    exit;
                                }

                                if (password_verify($password, $finfo[0])) {
                                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}' LIMIT 1;");
                                    $row = mysqli_fetch_assoc($sql);
                                    $_SESSION['unique_id'] = $row['id'];
                                    header("Location:index.php");
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Incorrect username or password. Please try again.</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Please fill all fields.</div>';
                            }
                        }
                    ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <label for="basic-url" class="form-label">Username</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                        </div>

                        <label for="basic-url" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        </div>

                        <div>Don't have an account? <a href="registration.php">Sign In here!</a></div>

                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-sign-in-alt"></i> &nbsp;Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once "includes/footer.php";
?>