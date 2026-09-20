<?php
    include 'class.php';

    session_start();

    // semisal mau reset session
    // session_destroy();

    // set session data penampung alert "kode sudah digunakan!"
    if(!isset($_SESSION['alertKode'])){
        $_SESSION['alertKode'] = 0;
    }

    // set session list of object
    if(!isset($_SESSION['listStudio'])){
        $_SESSION['listStudio'] = [];
        // initial dummy data
        $_SESSION['listStudio'][] = new Studio("std01", "Cirebon", "CGV", 100);
        $_SESSION['isEdited']["std01"] = 0;
    }

    // set session list boolean isEdited untuk penanda data yang sedang diedit
    if(!isset($_SESSION['isEdited'])){
        $_SESSION['isEdited'] = [];
    }

    // jika server menerima request POST
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['alertKode'] = 0; // reset alertKode

        // deklarasi variabel nilai attribut studio yang diambil dari form method POST
        $kode = $_POST['kode'];
        $lokasi = $_POST['lokasi'];
        $jaringan = $_POST['jaringan'];
        $kapasitas = $_POST['kapasitas'];

        // deklarasi variabel penampung jenis button yang ditekan
        $button = $_POST['inibtn'];

        if($button == 'addBtn'){ // jika button untuk menambah data
            // cek apakah kode sudah digunakan dalam list of object
            foreach($_SESSION['listStudio'] as $data){
                if($data->getKode() == $kode){ // jika terdeteksi
                    echo "<p>kode sudah digunakan!</p>";
                    $_SESSION['alertKode'] = 1; // ganti session alertKode menjadi true
                }
            }
            if(!$_SESSION['alertKode']){ // jika kode adalah kode baru
                // instansiasi object dan masukkan ke list
                $_SESSION['listStudio'][] = new Studio($kode, $lokasi, $jaringan, $kapasitas);
                $_SESSION['isEdited'][$kode] = 0; // set isEdited menjadi false
            }
        }else if($button == 'editBtn'){ // jika button edit
            foreach($_SESSION['listStudio'] as $data){ // search kode dari row table yang diedit
                if($data->getKode() == $kode){
                    $_SESSION['isEdited'][$data->getKode()] = 1; // set isEdited menjadi true
                }
            }
        }else if($button == 'okBtn'){ // jika button Ok
            foreach($_SESSION['listStudio'] as $data){
                if($data->getKode() == $kode){
                    // update data dari inputan table
                    $data->setLokasi($lokasi);
                    $data->setJaringan($jaringan);
                    $data->setKapasitas($kapasitas);
                    $_SESSION['isEdited'][$data->getKode()] = 0; // set isEdited false
                }
            }
        }else if($button == 'delBtn'){ // jika button hapus
            foreach($_SESSION['listStudio'] as $idx => $data){
                if($data->getKode() == $kode){
                    unset($_SESSION['listStudio'][$idx]); // hapus object dari list
                }
            }
            // rearrange array agar index tidak bolong
            $_SESSION['listStudio'] = array_values($_SESSION['listStudio']);
        }

        // mengembalikan halaman ke index.php untuk mencegah form resubmission saat reload
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Data Studio Bioskop</h1>
        </header>

        <main>
            <div class="card">
                <div class="table-container">
                    <!-- table untuk menampilkan data studio -->
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
                            <!-- membuat row per data studio di dalam list -->
                            <?php
                                foreach($_SESSION['listStudio'] as $data){
                                    if($data !== null){ // Error handling jika data null masih terhitung
                                        echo "<form id=\"iniForm\" method=\"POST\">"; // memisah elemen form per row
                                        echo "<tr>";
                                        // data kode tersimpan permanen, tidak bisa diedit
                                        echo "<td><input type=\"text\" name=\"kode\" value=".$data->getKode()." readonly></input></td>";
                                        if($_SESSION['isEdited'][$data->getKode()]){ // cek apakah data sedang diedit
                                            // write cell dengan elemen input yang bisa diedit
                                            echo "<td><input type=\"text\" name=\"lokasi\" value=".$data->getLokasi()."></input></td>";
                                            echo "<td><input type=\"text\" name=\"jaringan\" value=".$data->getJaringan()."></input></td>";
                                            echo "<td><input type=\"number\" name=\"kapasitas\" value=".$data->getKapasitas()."></input></td>";
                                            echo "<td><button type=\"submit\" name=\"inibtn\" value=\"okBtn\">Ok</button></td>"; // button Ok
                                        }else{ // jika tidak sedang diedit
                                            // write cell dengan elemen input readonly
                                            echo "<td><input type=\"text\" name=\"lokasi\" value=".$data->getLokasi()." readonly></input></td>";
                                            echo "<td><input type=\"text\" name=\"jaringan\" value=".$data->getJaringan()." readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"kapasitas\" value=".$data->getKapasitas()." readonly></input></td>";
                                            echo "<td><button type=\"submit\" name=\"inibtn\" value=\"editBtn\">Edit</button></td>"; // button Edit
                                        }
                                        echo "<td><button type=\"submit\" name=\"inibtn\" value=\"delBtn\">Hapus</button></td>"; // button Hapus
                                        echo "</tr>";
                                        echo "</form>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- form untuk menambahkan data -->
            <div class="card">
                <h2>Tambah Studio</h2>
                <form id="iniForm" method="POST">
                    <!-- inputan Kode -->
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" id="kode" name="kode" required>
                    </div>

                    <!-- inputan lokasi -->
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" required>
                    </div>

                    <!-- inputan jaringan -->
                    <div class="form-group">
                        <label for="jaringan">Jaringan</label>
                        <input type="text" id="jaringan" name="jaringan" required>
                    </div>

                    <!-- inputan kapasitas -->
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" id="kapasitas" name="kapasitas" min="5" required>
                    </div>

                    <!-- button submit -->
                    <button type="submit" name="inibtn" value="addBtn">Tambah</button>
                    <?php
                        if($_SESSION['alertKode']){ // jika terdapat alert menambah data dengan kode yang sudah ada
                            echo "<div class=\"alert\">";
                            echo "<p>Kode sudah digunakan!</p>";
                            echo "</div>";
                        }
                    ?>
                </form>
            </div>
        </main>
    </div>
</body>
</html>