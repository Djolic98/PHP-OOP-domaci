<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmovi promena</title>
</head>

<body>
    <?php
    include 'myadmin.php';
    $model = new Database('itehdomaci');




    if (isset($_GET['delete']) != null) {

        $id = $_GET['delete'];
        $delete = $model->delete("filmovi", 'ID', $id);

        if ($delete) {
            echo "<script>alert('delete successfully');</script>";
            echo "<script>window.location.href = 'filmovi.php';</script>";
        }
    }




    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $row = $model->edit('filmovi', $id);

        if (isset($_POST['update'])) {
            if (isset($_POST['naziv']) && isset($_POST['produkcija']) && isset($_POST['trajanje']) && isset($_POST['zanr'])) {
                if (!empty($_POST['naziv']) && !empty($_POST['produkcija']) && !empty($_POST['trajanje']) && !empty($_POST['zanr'])) {

                    $data['ID'] = $id;
                    $data['naziv'] = $_POST['naziv'];
                    $data['produkcija'] = $_POST['produkcija'];
                    $data['trajanje'] = $_POST['trajanje'];
                    $data['zanr'] = $_POST['zanr'];

                    $update = $model->update('filmovi', $data);

                    if ($update) {
                        echo "<script>alert('filmovi update successfully');</script>";
                        echo "<script>window.location.href = 'filmovi.php';</script>";
                    } else {
                        echo "<script>alert('filmovi update failed');</script>";
                        echo "<script>window.location.href = 'filmovi.php';</script>";
                    }
                } else {
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?edit=$id");
                }
            }
        }

    ?>
        <div class="row justify-content-center">
            <form action="" method="post">
                <input type="hidden" name="ID" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" name="naziv" value="<?php echo $row['naziv']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Produkcija</label>
                    <input type="text" name="produkcija" value="<?php echo $row['produkcija']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Trajanje</label>
                    <input type="text" name="trajanje" value="<?php echo $row['trajanje']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Zanr</label>

                    <select name="zanr" id="zanr">
                        <?php
                        $mysqli = new mysqli('localhost', 'root', '', 'itehdomaci') or die(mysqli_error($mysqli));
                        $result = $mysqli->query("SELECT * FROM zanr ") or die($mysqli->error);

                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nazivZanra']; ?></option>
                        <?php endwhile; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    <?php

    }

    ?>

    <?php
    if (isset($_GET['insert'])) {
    ?>
        <div class="row justify-content-center">

            <form action="" method="post">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" name="naziv" class="form-control">
                </div>
                <div class="form-group">
                    <label>Produkcija</label>
                    <input type="text" name="produkcija" class="form-control">
                </div>
                <div class="form-group">
                    <label>Trajanje</label>
                    <input type="text" name="trajanje" class="form-control">
                </div>
                <div class="form-group">
                    <label>Zanr</label>
                   
                    <select name="zanr" id="zanr">
                        <?php
                        $mysqli = new mysqli('localhost', 'root', '', 'itehdomaci') or die(mysqli_error($mysqli));
                        $result = $mysqli->query("SELECT * FROM zanr ") or die($mysqli->error);

                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nazivZanra']; ?></option>
                        <?php endwhile; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Potvrdi</button>
                </div>
            </form>
        </div>
    <?php


        if (isset($_POST['submit'])) {
            if (isset($_POST['naziv']) && isset($_POST['produkcija']) && isset($_POST['trajanje']) && isset($_POST['zanr'])) {
                if (!empty($_POST['naziv']) && !empty($_POST['produkcija']) && !empty($_POST['trajanje']) && !empty($_POST['zanr'])) {

                    $data['naziv'] = $_POST['naziv'];
                    $data['produkcija'] = $_POST['produkcija'];
                    $data['trajanje'] = $_POST['trajanje'];
                    $data['zanr'] = $_POST['zanr'];

                    $insert = $model->insert('filmovi', $data);
                }
            }
        }
    }
    ?>


</body>

</html>