<?php
include_once 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD on PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <style>
        #add-user {
            position: absolute;
            right: 5px;
            top: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        if (isset($success)) {
            echo '<div class="col-12 mt-3">' . $success . '</div>';
        }
        ?>
        <div class="col-12 mt-3 p-0 position-relative">
            <button class="btn btn-success mb-1" id="add-user" data-toggle="modal" data-target="#Modal"><i
                        class="fa fa-user-plus"></i></button>
            <table class="table shadow ">
                <thead class="thead-dark">
                <tr>
                    <th>№</th>
                    <th>Ім'я</th>
                    <th>Прізвище</th>
                    <th>Посада</th>
                    <th>Дія</th>
                </tr>
                <?php foreach ($result as $value): ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['last_name'] ?></td>
                        <td><?php echo $value['pos'] ?></td>
                        <td>
                            <a href="Z" class="btn btn-success btn-sm" data-toggle="modal"
                               data-target="#editModal<?= $value['id'] ?>"><i class="fa fa-edit"></i></a>
                            <a href="?delete=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm"
                               data-toggle="modal" data-target="#deleteModal<?= $value['id'] ?>"><i
                                        class="fa fa-trash"></i></a>
                            <?php require 'modal.php'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Додати користувача</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Ім'я">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" value="" placeholder="Прізвище">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pos" value="" placeholder="Посада">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Скасувати</button>
                <button type="submit" name="submit" class="btn btn-primary">Додати</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    </body>
    </html>