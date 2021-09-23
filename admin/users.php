
<?php 
    session_start();
	require'inc/header.php';
?>
<div class="main-div">
    <div class="center-div">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">firstname</th>
                        <th scope="col">lastname</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Address</th>
                        <th scope="col" colspan="3">Operation</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    require('../classes/User.php');
                    $user = new User();
                    $selectquery = $user->ShowAllUser();
                    while($res = mysqli_fetch_assoc($selectquery)){?>

                    <tr>
                        <td scope="row"><?php echo $res['id'];?></td>
                        <td><img class="card-img-top" src="image/<?php echo $res['photo']; ?>" alt="" style="width:25%; height:25%;"></td?>
                        <td><?php echo $res['firstname'];?></td>
                        <td><?php echo $res['lastname'];?></td>
                        <td><?php echo $res['username'];?></td>
                        <td><?php echo $res['email'];?></td>
                        <td><?php echo $res['mobile'];?></td>
                        <td><?php echo $res['address'];?></td>
                        <td><a href="./edituser.php?id=<?php echo $res['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="./deleteuser.php?id=<?php echo $res['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php
                    }
                ?>

                    
                </tbody>
            </table>
        </div>
    </div>
</div>