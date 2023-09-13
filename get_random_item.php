<?php 
 include 'init.php';
 header('Content-Type: text/html; charset=utf-8');

	
		// Sanitize the query string to prevent SQL injection

		// Query to search names in different tables using UNION
		$sql = "SELECT mi.id AS id_item, tag ,kode_barang, label_harga AS price , mi.nama AS nama , mj.nama as brand
		FROM master_item mi 
		LEFT JOIN master_jenis mj on mj.id = mi.id_master_jenis 
		ORDER BY RAND()
		LIMIT 8";
		

		$result = mysqli_query($conn, $sql);
		$totalItems = mysqli_num_rows($result);
		$data = [];
		$data['Total'] = $totalItems;
		$data['Data'] = [];
		while($row = mysqli_fetch_array($result)){
			$id = $row['id_item'];
			$namaItem =  $row['nama'];
			$namaBrand = $row['brand'];
			$namaCat = $row['category'];
			$price = number_format($row['price'],0,',','.');
			$kodeBarang = $row['kode_barang'];
			$tag = $row['tag'];
			array_push($data['Data'], ['ID' =>$id,'Nama' => $namaItem, 'Price' => $price,'KodeBarang' => $kodeBarang, 'Tag'=> $tag, 'Harga' => $price, 'Brand' => $namaBrand, 'Category' => $namaCat]);


		}
		// var_dump($data);exit;

		echo json_encode($data);
?>