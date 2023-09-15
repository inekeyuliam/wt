<?php 
 include 'init.php';
 header('Content-Type: text/html; charset=utf-8');

 if (isset($_POST['id'])) {
	$id = $_POST['id'];
	
		// Sanitize the query string to prevent SQL injection

		// Query to search names in different tables using UNION
		$sql = "SELECT mi.id AS id_item, tag ,kode_barang, label_harga AS price , mi.nama AS nama , mhb.name as brand
		FROM master_highlight_brand_items mhbi 
		LEFT JOIN master_item mi on mi.id = mhbi.item_id
		LEFT JOIN master_highlight_brands mhb on mhb.id = mhbi.highlighted_brand_id
		
		WHERE mhbi.highlighted_brand_id = '".$id."' and mhbi.flag = 1 limit 10";

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
			$namaItem =  $row['nama'];
			$namaBrand = $row['brand'];
			$namaCat = $row['category'];
			$price = number_format($row['price'],0,',','.');
			$kodeBarang = $row['kode_barang'];
			$tag = $row['tag'];
			array_push($data['Data'], ['ID' =>$id, 'Image'=>$img,'Nama' => $namaItem, 'Price' => $price,'KodeBarang' => $kodeBarang, 'Tag'=> $tag, 'Harga' => $price, 'Brand' => $namaBrand, 'Category' => $namaCat]);


		}
		// var_dump($data);exit;

		echo json_encode($data);
}
?>