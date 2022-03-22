<?php
    require 'config.php';

    $sql = "SELECT * FROM users WHERE id=".$_GET['id'];
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $user = $statement->fetchAll();

    // print("<pre>");
    // print_r($user[0]);

    if($_POST) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if($_POST != NULL) {
            $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=".$_GET['id'];
            $statement = $pdo->prepare($sql);
            $update = $statement->execute();
        }
        if($update) {
            echo "<script>alert('Successfully Updated !');window.location.href='index.php';</script>";
        }
    }
    
?>

<?php
include 'header.php';
?>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit User Form</h2>
                    </div>
                    <div class="card-body">
                        
                        <form action="" method="post">
                            <div class="col-md-12 d-flex justify-content-between mb-3">
                                <div class="col-md-5">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?= $user[0]['name']; ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $user[0]['email']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-between mb-3">
                                <div class="col-md-5">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?= $user[0]['phone']; ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?= $user[0]['address']; ?>">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-5">
                                    <div class="mx-3">
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                    <div class="mx-3">
                                        <a href="index.php" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'footer.php';
?>