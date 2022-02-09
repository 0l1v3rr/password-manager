<?php 
    session_start();

    if(isset($_SESSION['unique_id'])) {
        header("Location:index.php");
    }

    include_once "includes/head.php";
    include_once "db/conn.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-6 align-center">Registration</h1>
                    <hr>

                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $password = mysqli_real_escape_string($conn, $_POST['password']);
                            $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

                            if(!empty($username) && !empty($password) && !empty($email) && !empty($password2)) {
                                if($password == $password2) {
                                    mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('{$username}', '{$email}', '{$password}');");
                                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}';");
                                    if(mysqli_num_rows($sql) > 0) {
                                        $row = mysqli_fetch_assoc($sql);
                                        $_SESSION['unique_id'] = $row['id'];
                                        header("Location:index.php");
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">The two passwords do not match.</div>';
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

                        <label for="basic-url" class="form-label">E-Mail</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input id="email" name="email" type="email" class="form-control" placeholder="test@domain.com">
                        </div>

                        <label for="basic-url" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        </div>

                        <label for="basic-url" class="form-label">Repeat Password</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input id="password2" name="password2" type="password" class="form-control" placeholder="Repeat Password">
                        </div>

                        <div>Already have an account? <a href="login.php">Log In here!</a></div>

                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-sign-in-alt"></i> &nbsp;Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once "includes/footer.php";
?>