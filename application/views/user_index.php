<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1><center>User List</center></h1>
        <div class="card-header">
            <a href="<?php echo site_url('user/create')?>" class="btn btn-sm btn-success">Add</a>
        </div>
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($users as $user) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->password; ?></td>
                    <td><?php echo $user->created_at; ?></td>
                    <td>
                        <a href="<?php echo site_url('user/edit/'.$user->id); ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('user/delete/'.$user->id); ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>