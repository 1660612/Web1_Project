<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center margin-top-bottom">
        <div class="card" style="width:500px;">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="text-center text-primary font-weight-bold">
                        ABC Shop Login Form
                    </h4>
                </div>
                <form action="./index.php" autocomplete="off" action="GET">
                    <div class="row form-group">
                        <label class="col-sm-4" for="user_name">User name<i class="text-danger">*</i></label>
                        <input type="text" class="form-control col-sm-8" name="user_name" placeholder="Enter your user name or email..." autocomplete="off" required/>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4" for="password">Password<i class="text-danger">*</i></label>
                        <input class="col-sm-8 form-control" type="password" name="password" placeholder="Enter your password" autocomplete="off" required />
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary" />
                        <input type="submit" value="Register" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    




    
    <script src="./bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="./bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="./bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>