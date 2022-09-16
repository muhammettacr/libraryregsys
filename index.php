<?php
include "db.php";

$booksFetchQuery = $db->prepare("SELECT * FROM books");
$booksFetchQuery->execute();
$books = $booksFetchQuery->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Library Registration System</title>
</head>

<body>
    <?php
    if (@$_SESSION["isLogin"] == "OK") {
    ?>
        <div class="p-3">
            <h2 class="text-center p-3 bg-secondary text-light">Hoşgeldiniz</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kitap Adı</th>
                        <th scope="col">Yazar Adı</th>
                        <th scope="col">Sayfa Sayısı</th>
                        <th scope="col">Kitap Kimde</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($books as $book) {
                    ?>
                        <tr>
                            <td><?php echo $book["ID"]; ?></td>
                            <td><?php echo $book["Name"]; ?></td>
                            <td><?php echo $book["Author"]; ?></td>
                            <td><?php echo $book["PageNumber"]; ?></td>
                            <td><?php echo $book["Who"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-secondary"><a href="logout.php" style="text-decoration:none; color:white;">Çıkış Yap</a>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <div class="text-warning text-center">
                <h1>LİBRARY</h1>
            </div>
            <div>
                <table class="table table-striped">
                    <tr>
                        <td class="text-center"><a href="login.php" class="text-danger" style="text-decoration:none">Giriş Yap</a></td>
                    </tr>
                    <tr>
                        <td class="text-center"><a href="register.php" style="text-decoration:none">Kayıt Ol</a></td>
                    </tr>

                </table>


            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>