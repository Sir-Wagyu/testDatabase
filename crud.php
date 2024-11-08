<?php
include "dbConnect.php";

//read
function getMahasiswa($conn)
{
    $query = "SELECT * FROM tbl_mahasiswa";
    $result = mysqli_query($conn, $query);
    return $result;
}

//create
function createMahasiswa($conn, $nim, $nm_mahasiswa, $jenis_kelamin, $tgl_lahir)
{
    $query = "INSERT INTO tbl_mahasiswa (nim, nm_mahasiswa, jenis_kelamin, tgl_lahir) VALUES (? ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param("ssss", $nim, $nm_mahasiswa, $jenis_kelamin, $tgl_lahir); //s = string
    $statement->execute();
    $statement->close();

    //proses = prepare -> bind_param -> execute -> close
}

function deleteMahasiswa($conn, $id_mahasiswa)
{
    $query = "DELETE FROM tbl_mahasiswa WHERE id_mahasiswa = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $id_mahasiswa); // i = integer
    $statement->execute();
    $statement->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $nim = $_POST['nim'];
        $nm_mahasiswa = $_POST['nm_mahasiswa'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tgl_lahir'];
        createMahasiswa($conn, $nim, $nm_mahasiswa, $jenis_kelamin, $tgl_lahir);
    } elseif ($action === 'delete') {
        $id_mahasiswa = $_POST['id_mahasiswa'];
        deleteMahasiswa($conn, $id_mahasiswa);
    }

    header('Location: table.php');
    exit();
}
