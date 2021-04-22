<?php 

/******************************************
PRAKTIKUM RPL
******************************************/

class Wishlist extends DB{
	
	// Mengambil data
	function getTask($sort = ''){
		// Query mysql select data ke tb_wishlist
		if (!$sort) {
			$query = "SELECT * FROM tb_wishlist";
		} else {
			$query = "SELECT * FROM tb_wishlist ORDER BY $sort";
		}

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	function addTask($data) {
		$nama = $data['nama'];
		$harga = $data['harga'];
		$deskripsi = $data['deskripsi'];
		$link = $data['link'];
		$priority = $data['priority'];

		$query = "INSERT INTO tb_wishlist 
		VALUES ('', '$nama', '$harga', '$deskripsi', '$link', '$priority', 'Belum')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteTask($id) {
		$query = "DELETE FROM tb_wishlist WHERE id = '$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function doneTask($id) {
		$query = "UPDATE tb_wishlist SET status_beli = 'Sudah' WHERE id = '$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}
}
?>
