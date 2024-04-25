<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #fff;

        }
        form {
            margin-bottom: 20px;
            text-align: center;
            background-color: #8B0000;
            
        }
        label {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px;
        }
    
        input[type="text"],
        input[type="number"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 20px 0 20px 0;
        }
        button[type="submit"],
        button[type="button"] {
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a.btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
        }
        a.btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<button type="submit" value="reset" name="reset"><a href="session7.php">HAPUS DATA</a></button>
<?php
session_start();
if(!isset($_SESSION['dataSiswa'])) {
   $_SESSION['dataSiswa']= array();
}

if(isset($_POST['nama']) && isset($_POST['nis'])  && isset($_POST['rayon'])) {
    $data = array(
        'nama' => $_POST['nama'],
        'nis' => $_POST['nis'],
        'rayon' => $_POST['rayon'],
        
    );
    array_push($_SESSION['dataSiswa'], $data);

};

//proses penghapus data siswa
if(isset($_GET['hapus'])){
    $index = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$index]);
    // redirect kembali ke halaman ini setelah pengahpusan
    header('Location: http://localhost/datasiswa1/index.php');
    exit;   
}

// var_dump($_SESSION['dataSiswa']);

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>AKSI</th>';
echo '</tr>';

foreach($_SESSION['dataSiswa'] as $index => $value) {
    echo '<tr>';
    echo '<td>'. $value['nama'] . '</td>';
    echo '<td>'. $value['nis'] . '</td>';
    echo '<td>'. $value['rayon'] . '</td>';
    echo '<td>
    <a href="?hapus='.$index.'" class="btn btn-danger btn-sm">hapus</a></td>';
    echo '</tr>';

}
// echo '/tbody';
echo '</table>';
if(isset($_POST["reset"])){
    session_destroy();
}
?>
</body>
</html>