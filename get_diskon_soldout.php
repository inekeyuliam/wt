<?php 
 include 'init.php';
 header('Content-Type: text/html; charset=utf-8');

	
		// Sanitize the query string to prevent SQL injection

		// Query to search names in different tables using UNION
		$sql = "SELECT mi.id AS id_item, diskon_web, tag ,kode_barang, label_harga AS price , mi.nama AS nama , mj.nama as brand
		FROM master_item mi 
		LEFT JOIN master_jenis mj on mj.id = mi.id_master_jenis 
		WHERE mi.diskon_web > 0.00 and qty = 0
		ORDER BY last_discount_updated
		LIMIT 8";
		

		$result = mysqli_query($conn, $sql);
		$totalItems = mysqli_num_rows($result);
		$data = [];
		$data['Total'] = $totalItems;
		$data['Data'] = [];
		while($row = mysqli_fetch_array($result)){
			$str_image = 'select * from image_item where item_id = '. $row["id_item"] .' limit 1';
			$sql_image = mysqli_query($conn,$str_image);
			$row_image = mysqli_fetch_array($sql_image);
			$img = '';
			if($row_image['image']){
				$img = '<img class="item-product" src="data/products/'.$row_image['image'].'">';
			}else{
				$img = '<img class="item-product" src="assets/img/1.png" alt="Image 1">';
			}
			$id = $row['id_item'];
			$diskon = number_format($row['price'] - ($row['price'] * $row['diskon_web']),0,',','.');
			$namaItem =  $row['nama'];
			$namaBrand = $row['brand'];
			$namaCat = $row['category'];
			$price = number_format($row['price'],0,',','.');
			$kodeBarang = $row['kode_barang'];
			$tag = $row['tag'];
			array_push($data['Data'], ['ID' =>$id, 'Image' => $img,'Discount' => $diskon, 'Percentage' => $row['diskon_web']*100, 'Nama' => $namaItem, 'Price' => $price,'KodeBarang' => $kodeBarang, 'Tag'=> $tag, 'Harga' => $price, 'Brand' => $namaBrand, 'Category' => $namaCat]);


		}
		// var_dump($data);exit;

		echo json_encode($data);
?>