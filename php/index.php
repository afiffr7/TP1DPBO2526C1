<?php
    include 'class.php';

    session_start();
    // session_destroy();

    if(!isset($_SESSION['alertKode'])){
        $_SESSION['alertKode'] = 0;
    }

    if(!isset($_SESSION['listStudio'])){
        $_SESSION['listStudio'] = [];
        $_SESSION['listStudio'][] = new Studio("std01", "Cirebon", "CGV", 100);
        $_SESSION['isEdited']["std01"] = 0;
    }

    if(!isset($_SESSION['isEdited'])){
        $_SESSION['isEdited'] = [];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['alertKode'] = 0;
        $kode = $_POST['kode'];
        $lokasi = $_POST['lokasi'];
        $jaringan = $_POST['jaringan'];
        $kapasitas = $_POST['kapasitas'];
        $button = $_POST['inibtn'];

        if($button == 'addBtn'){
            foreach($_SESSION['listStudio'] as $data){
                if($data->getKode() == $kode){
                    echo "<p>kode sudah digunakan!</p>";
                    $_SESSION['alertKode'] = 1;
                }
            }
            if(!$_SESSION['alertKode']){
                $_SESSION['listStudio'][] = new Studio($kode, $lokasi, $jaringan, $kapasitas);
                $_SESSION['isEdited'][$kode] = 0;
            }
        }else if($button == 'editBtn'){
            foreach($_SESSION['listStudio'] as $data){
                if($data->getKode() == $kode){
                    $_SESSION['isEdited'][$data->getKode()] = 1;
                }
            }
        }else if($button == 'okBtn'){
            foreach($_SESSION['listStudio'] as $data){
                if($data->getKode() == $kode){
                    $data->setLokasi($lokasi);
                    $data->setJaringan($jaringan);
                    $data->setKapasitas($kapasitas);
                    $_SESSION['isEdited'][$data->getKode()] = 0;
                }
            }
        }else if($button == 'delBtn'){
            foreach($_SESSION['listStudio'] as $idx => $data){
                if($data->getKode() == $kode){
                    unset($_SESSION['listStudio'][$idx]);
                }
            }
            $_SESSION['listStudio'] = array_values($_SESSION['listStudio']);
        }

        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afif Fadilah Rahman TP 1 DPBO</title>
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Data Studio Bioskop</h1>
    </header>

    <main>
        <table border="1">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Lokasi</th>
                    <th>Jaringan</th>
                    <th>Kapasitas</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- <form method="POST"> -->
                <?php
                    foreach($_SESSION['listStudio'] as $data){
                        if($data !== null){
                            echo "<form id=\"iniForm\" method=\"POST\">";
                            echo "<tr>";
                            echo "<td><input type=\"text\" name=\"kode\" value=".$data->getKode()." readonly></input></td>";
                            if($_SESSION['isEdited'][$data->getKode()]){
                                echo "<td><input type=\"text\" name=\"lokasi\" value=".$data->getLokasi()."></input></td>";
                                echo "<td><input type=\"text\" name=\"jaringan\" value=".$data->getJaringan()."></input></td>";
                                echo "<td><input type=\"number\" name=\"kapasitas\" value=".$data->getKapasitas()."></input></td>";
                                echo "<td><button type=\"submit\" name=\"inibtn\" value=\"okBtn\">Ok</button></td>";
                            }else{
                                echo "<td><input type=\"text\" name=\"lokasi\" value=".$data->getLokasi()." readonly></input></td>";
                                echo "<td><input type=\"text\" name=\"jaringan\" value=".$data->getJaringan()." readonly></input></td>";
                                echo "<td><input type=\"number\" name=\"kapasitas\" value=".$data->getKapasitas()." readonly></input></td>";
                                echo "<td><button type=\"submit\" name=\"inibtn\" value=\"editBtn\">Edit</button></td>";
                            }
                            echo "<td><button type=\"submit\" name=\"inibtn\" value=\"delBtn\">Hapus</button></td>";
                            echo "</tr>";
                            echo "</form>";
                        }
                    }
                ?>
                <!-- </form> -->
            </tbody>
        </table>

        <h2>Tambah Studio</h2>
        <form id="iniForm" method="POST">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" required>
            <br>
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" required>
            <br>
            <label for="jaringan">Jaringan</label>
            <input type="text" id="jaringan" name="jaringan" required>
            <br>
            <label for="kapasitas">Kapasitas</label>
            <input type="number" id="kapasitas" name="kapasitas" min="5" required>
            <br>
            <button type="submit" name="inibtn" value="addBtn">Tambah</button>
            <?php
                if($_SESSION['alertKode']){
                    echo "<p>Kode sudah digunakan!</p>";
                }
            ?>
        </form>
    </main>
</body>
</html>