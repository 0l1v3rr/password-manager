<?php 
    include_once "includes/head.php";
    include_once "db/conn.php";

    $userId = 1;
    $res = $conn->query("SELECT * FROM passwords WHERE user_id = {$userId}");
    $array = array();

    while($item = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $array[] = $item;
    }

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="display-5 align-center">Password Manager</h3>
                    <hr class="mt-3 mb-4">

                    <?php 
                        $counter = 1;
                        foreach($array as $item) {
                            echo '
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row px-3">
                                        <div class="col-11"><h5><a href="'.$item["site"].'" target="_blank">'.$item["site"].'</a></h5></div>
                                        <div class="col-1" style="text-align: right;">';
                                            if($item["favorite"]) {
                                                echo '<i class="fas fa-star text-warning" style="cursor: pointer;" title="Remove from favorites"></i>';
                                            } else {
                                                echo '<i class="far fa-star" style="cursor: pointer;" title="Add to favorites"></i>';
                                            }
                                            
                                        echo '</div>
        
                                        <hr class="mt-2">
                                    </div>
        
                                    <div class="row px-3">
                                        <div class="col-6">
                                            <label for="username-'.$counter.'" class="form-label">Username</label>
                                            <input id="username-'.$counter.'" type="text" class="form-control" value="'.$item['username'].'" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="password-'.$counter.'" class="form-label">Password</label>
                                            <div class="input-group mb-3">
                                                <input id="password-'.$counter.'" type="password" class="form-control" value="'.$item["password"].'" disabled>
                                                <span class="input-group-text"><i class="fas fa-eye" style="cursor: pointer;" id="password-'.$counter.'-eye" onclick="showPw(\'password-'.$counter.'\')"> </i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            $counter++;
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showPw(id) {
        const field = document.getElementById(id);
        const eye = document.getElementById(`${id}-eye`);
        if(field.type == "text") {
            field.type = "password";
            eye.classList.remove("fa-eye-slash");
            eye.classList.add("fa-eye");
        } else {
            field.type = "text";
            eye.classList.add("fa-eye-slash");
            eye.classList.remove("fa-eye");
        }
    }
</script>

<?php 
    include_once "includes/footer.php";
?>