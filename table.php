<?php
include "crud.php";

$mahasiswa  = getMahasiswa($conn);
?>


<!-- read data -->
<table class="w-[90%] mx-auto px-4 py-2">
    <tr class="bg-sky-500 text-white text-left">
        <th class=" px-4 py-2">NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Pengaturan</th>
    </tr>

    <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td class="text-left px-4 py-2"><?= $row['nim'] ?></td>
            <td><?= $row['nm_mahasiswa'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['tgl_lahir'] ?></td>
            <td>
                <form action="crud.php" action="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id_mahasiswa" value="<?= $row['id_mahasiswa'] ?>">
                    <button type="submit" class="bg-red-500 text-white px-5 py-1 rounded-lg">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- create data -->
<div class="bg-sky-300 w-[25%] mx-auto px-10 py-12 mt-10 rounded-md">
    <h1 class="font-bold text-xl text-center mb-7">Form Input Data Mahasiswa</h1>
    <form action="crud.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="flex flex-col mb-4">
            <label for="nim">Masukkan NIM: </label>
            <input type="nim" name="nim" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="nama">Masukkan Nama Mahasiswa: </label>
            <input type="text" name="nm_mahasiswa" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="jenisKelamin">Pilih Jenis Kelamin: </label>
            <select name="jenis_kelamin" required>
                <option value="L">laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="flex flex-col mb-4">
            <label for="tglLahir">Masukkan Tanggal Lahir: </label>
            <input type="date" name="tgl_lahir" required>
        </div>

        <button type="submit" class="bg-green-500 w-full py-2 rounded-lg text-white mt-5">Simpan</button>
    </form>
</div>