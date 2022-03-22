<?php

    require 'config.php';

    if($_POST) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        $sql = "INSERT INTO users(name, email, phone, address) VALUES (:name, :email, :phone, :address)";
        $statement = $pdo->prepare($sql);
        $statement->execute(
            [
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':address' => $address,
            ]
        );
        $result = $statement->fetch();

        header('location: index.php');
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
                        <h2>Add User Form</h2>
                    </div>
                    <div class="card-body">
                        
                        <form action="add.php" method="post">
                            <div class="col-md-12 d-flex justify-content-between mb-3">
                                <div class="col-md-5">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-between mb-3">
                                <div class="col-md-5">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-5">
                                    <div class="mx-3">
                                        <button class="btn btn-success" type="submit">Save</button>
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