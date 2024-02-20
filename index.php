<?php
include('includes/functions.php');
include('includes/connect.php');

if(isset($_POST['login'])){
    $query= 'SELECT *
    FROM users
    WHERE email = "'.$_POST['email'].'"
    AND password = "'.md5($_POST['password']).'"
    LIMIT 1';
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rowS($result)){
        $record = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $record['id'];
        header('Location: admin/index.php');
        die();
    
    }
    else{
        set_message('incorrect username/password');
        header('Location: index.php');
        die();
    }
}

?>

<!doctype html>
<html>
<head>

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Week 5</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
    include('reusables/nav.php')
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Login</h1>
            </div>
        </div>
        
        <div class="container">
        <?php
        echo get_message();
        ?>
            <div class = "row">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email">
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
