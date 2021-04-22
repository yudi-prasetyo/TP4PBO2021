<?php

/******************************************
PRAKTIKUM RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Wishlist.class.php");

// Membuat objek dari kelas task
$otask = new Wishlist($db_host, $db_user, $db_password, $db_name);
$otask->open();


if (isset($_POST['add'])) {
	$otask->addTask($_POST);

	header("Location: index.php");
}

if (isset($_GET['id_hapus'])) {
	$otask->deleteTask($_GET['id_hapus']);

	header("Location: index.php");
}

if (isset($_GET['id_status'])) {
	$otask->doneTask($_GET['id_status']);

	header("Location: index.php");
}

if (isset($_POST['reset_sort'])) {
	$otask->getTask();
} else if (isset($_POST['nama'])) {
	$otask->getTask("nama_barang");
} else if (isset($_POST['harga'])) {
	$otask->getTask("harga");
} else if (isset($_POST['priority'])) {
	$otask->getTask("priority");
} else if (isset($_POST['status'])) {
	$otask->getTask("status_beli");
} else {
	// Memanggil method getTask di kelas Task
	$otask->getTask();
}

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($id, $nama, $harga, $deskripsi, $link, $priority, $status) = $otask->getResult()) {
	// Tampilan jika status task nya sudah dikerjakan
	if($status == "Sudah"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nama . "</td>
		<td>" . $deskripsi . "</td>
		<td>" . "Rp. " . number_format($harga, 0, ',', '.') . "</td>
		<td><a target='_blank' href=" . "'$link'" . ">Link</a></td>
		<td>" . $priority . "</td>
		<td>" . $status . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status task nya belum dikerjakan
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nama . "</td>
		<td>" . $deskripsi . "</td>
		<td>" . "Rp. " . number_format($harga, 0, ',', '.') . "</td>
		<td><a target='_blank' href=" . "'$link'" . ">Link</a></td>
		<td>" . $priority . "</td>
		<td>" . $status . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?id_status=" . $id .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}

// Menutup koneksi database
$otask->close();

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();