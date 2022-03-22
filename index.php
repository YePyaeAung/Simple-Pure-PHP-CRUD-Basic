<?php
require 'config.php';

$sql = "SELECT * FROM users";
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll();
?>
<?php
include 'header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <a href="add.php" class="btn btn-success">Add User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="card-text"> -->
                        <table class="table table-info table-striped">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            <?php 
                                $i = 1;                    
                                foreach($users as $user){ 
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['phone']; ?></td>
                                <td><?= $user['address']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>
                            <?php 
                                $i++;
                                }
                            ?>
                        </table>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include 'footer.php';
?>