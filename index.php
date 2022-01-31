<?php 
    include_once "includes/head.php"
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="display-5 align-center">Password Manager</h3>
                    <hr class="mt-3 mb-4">

                    <div class="card">
                        <div class="card-body">
                            <div class="row px-3">
                                <div class="col-11"><h5><a href="www.site.com" target="_blank">www.site.com</a></h5></div>
                                <div class="col-1" style="text-align: right;">
                                    <!--<i class="far fa-star" style="cursor: pointer;" title="Add to favorites"></i>-->
                                    <i class="fas fa-star text-warning" style="cursor: pointer;" title="Remove from favorites"></i>
                                </div>

                                <hr class="mt-2">
                            </div>

                            <div class="row px-3">
                                <div class="col-6">
                                    <label for="password-1" class="form-label">Username</label>
                                    <input id="password-1" type="text" class="form-control" value="name" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="password-1" class="form-label">Password</label>
                                    <div class="input-group mb-3">
                                        <input id="password-1" type="password" class="form-control" value="password" disabled>
                                        <span class="input-group-text"><i class="fas fa-eye-slash" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once "includes/footer.php"
?>