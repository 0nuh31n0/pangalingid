<?php

require_once 'autoload.php';

$cart = $_SESSION['cart'];
$total = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Pandimaja</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col"><h1>Cart</h1></div>
        <hr>
    </div>
    <div class="row">
        <div class="col"><?php echo message(); ?></div>
    </div>
    <div class="row">

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Sum</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php if (!empty($cart)) : foreach ($cart as $item) { ?>

                <?php
                $price = $item['amount'] * $item['price'];
                $total += $price;
                ?>

                <form method="get" action="update-cart.php">
                    <input type="hidden" name="product" value="<?php echo $item['id']; ?>">
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><input name="amount" class="form-control" value="<?php echo $item['amount']; ?>"></td>
                        <td><?php echo $price; ?></td>
                        <td><button name="update" value="update" class="btn btn-primary">Update</button></td>
                        <td><button name="delete" value="delete" class="btn btn-danger">Delete</button></td>
                    </tr>
                </form>
            <?php } endif; ?>
            <tr>
                <td></td>
                <td></td>
                <td><?php echo $total; ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div>
        <div align="left"><a href="https://pangalingid.tak17mei.itmajakas.ee/">Mine esilehele</a></div>
        <form method="post" action="pay.php">
            <input type="hidden" name="total" value="<?php echo $total;?>">
            <tr>
                <td>E-mail<input name="E-mail" class="form-control" value=""></td>
                <td>Telefon<input name="Telefon" class="form-control" value=""></td>
                <td>Eesnimi<input name="Eesnimi" class="form-control" value=""></td>
                <td>Perenimi<input name="Perenimi" class="form-control" value=""></td>
            </tr>
            <button name="submit" type="submit">Pay</button>
        </form>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>