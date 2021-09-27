<?php
session_start();
require_once('classes/User.php');
$user = new User();
$result = $user->userProfile();
$post = mysqli_fetch_assoc($result);
?>
<?php
include 'inc/header.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sass/styleScss.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="promo">
            <div class="promo__card">
                <div class="promo__card-left">
                    <div class="promo__img">
                        <img src="./admin/image/<?php echo $post['photo']; ?>" alt="">
                    </div>
                    <div class="promo__name">
                        <?php echo $post['firstname']; ?> <br>
                        <?php echo $post['lastname']; ?>
                    </div>
                    <div class="promo__underline">

                    </div>
                    <div class="promo__job">
                        @<?php echo $post['username']; ?>
                    </div>
                </div>
                <div class="promo__card-right">
                    <div class="promo__title">Hello</div>
                    <div class="promo__subtitle">Details About Me</div>
                    <div class="promo__descr">
                        <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $post['email']; ?> <br>
                        <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $post['mobile']; ?> <br>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $post['address']; ?> <br>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>

</html>