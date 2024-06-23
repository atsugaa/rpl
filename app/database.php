<?php

	//tambah paket

	$connection = null;

	function connectDatabase() {
		global $connection;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rpl2"; 

		// connection
		$connection = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
	}

	function executeQuery($sql) {
		global $connection;
		if (mysqli_query($connection, $sql)) {
			return true;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			return false;
		}
	}

	//update status bayar
	function updateOrderStatus($id, $id2, $qty, $table) {
		try {
			$statement = DB->prepare("UPDATE $table SET STATUS_".strtoupper($table)." = 'SUDAH' WHERE ID_".strtoupper($table)." = '$id'");
			$statement->execute();
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
		if ($table == 'pemesanan') {
			try {
				$statement = DB->prepare("UPDATE paket SET KAPASITAS_PAKET = KAPASITAS_PAKET - $qty WHERE ID_PAKET = '$id2'");
				$statement->execute();
			} catch (PDOException $err) {
				echo $err->getMessage();
			}
		}
	}

	function tambahPaket($data) {
		global $connection;
		connectDatabase();

		$id = generateId();
		$nama = $data[0]['nama'];
		$destinasi = $data[0]['destinasi'];
		$harga = $data[0]['harga'];
		$jemput = $data[0]['jemput'];
		$kapasitas = $data[0]['kapasitas'];
		$tanggal = $data[0]['tanggal'];
		$deskripsi = $data[0]['deskripsi'];
		$gambar = $data[1]['gambar'];

		// Upload gambar
		$target_dir = BASEPATH . "/assets/img/paket/";
		$target_file = $target_dir . basename($gambar["name"]);

		if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
			// Tambahkan data ke database
			$sql = "INSERT INTO paket (ID_PAKET, NAMA_PAKET, DESTINASI_PAKET, HARGA_PAKET, JEMPUT_PAKET, KAPASITAS_PAKET, TANGGAL_PAKET, DESKRIPSI_PAKET, GAMBAR_PAKET) 
					VALUES ('$id', '$nama', '$destinasi', '$harga', '$jemput', '$kapasitas', '$tanggal', '$deskripsi', '".$gambar["name"]."')";
			
			if (executeQuery($sql)) {
				return true; // Berhasil
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection); // Tampilkan error SQL
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
		return false;
	}


	function tambahArmada($data) {
		global $connection;
		connectDatabase();
	
		$id = generateId(); // Implementasikan fungsi ini untuk menghasilkan ID unik
		$nama = $data[0]['nama'];
		$harga = $data[0]['harga'];
		$deskripsi = $data[0]['deskripsi'];
		$gambar = $data[1]['gambar'];
	
		// Upload gambar
		$target_dir = BASEPATH . "/assets/img/armada/";
		$target_file = $target_dir . basename($gambar["name"]);
	
		if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
			// Tambahkan data ke database
			$sql = "INSERT INTO kendaraan (ID_KENDARAAN, NAMA_KENDARAAN, HARGA_KENDARAAN, DESKRIPSI_KENDARAAN, GAMBAR_KENDARAAN) 
					VALUES ('$id', '$nama', '$harga', '$deskripsi', '".$gambar["name"]."')";
			
			if (executeQuery($sql)) {
				return true; // Berhasil
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection); // Tampilkan error SQL
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
		return false;
	}
	


	function generateId() {
		return uniqid();
	}

	//admin/user
	function is_admin($id) {
		try{
			$statement = DB->prepare("SELECT IS_ADMIN FROM user where ID_USER = :id");
			$statement->bindValue(':id',$id);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	function getPemesananByMonth(){
		try {
		   $statement = DB->prepare("SELECT MONTHNAME(TANGGAL_PEMESANAN) as bulan,sum(TOTAL_HARGA) as harga FROM pemesanan GROUP BY MONTHNAME(TANGGAL_PEMESANAN)");
		   $statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function getJumlahPesanan($jenis=null){
		try {
			if($jenis=='selesai'){
				$statement = DB->prepare("SELECT count(*) as jml FROM pemesanan WHERE STATUS_PEMESANAN='SUDAH'");
			}else{
				$statement = DB->prepare("SELECT count(*) as jml FROM pemesanan");
			}
		   $statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function getAllPemesanan(){
		try {
		   $statement = DB->prepare("SELECT * FROM pemesanan");
		   $statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function getTableDataPagination($table, $page) {
		try{
			$limit = 10;
			$offset = ($page - 1) * $limit;
			$statement = DB->prepare("SELECT * FROM $table LIMIT $limit OFFSET $offset");
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	function getPendapatan(){
		try {
		   $statement = DB->prepare("SELECT sum(TOTAL_HARGA) as harga FROM pemesanan");
		   $statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}
	function getAllUsers(){
		try {
		   $statement = DB->prepare("SELECT count(*) as jumlah FROM user WHERE IS_ADMIN IS NULL");
		   $statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}
	function getKendaraanById($id) {
		try{
			$statement = DB->prepare("SELECT * FROM kendaraan where ID_KENDARAAN = :id");
			$statement->bindValue(':id',$id);
			$statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	function checkArmadaStatus($id) {
		$now = new DateTime(date('Y-m-d H:i:s'));
		$statement = DB->prepare("SELECT * FROM penyewaan");
		$statement->execute();
		foreach ($statement as $row) {
			$sewa = new DateTime($row['TANGGAL_PENYEWAAN'].' 23:59:59');
			$end = new DateTime($row['TANGGAL_PENYEWAAN'].' 23:59:59');
			$end->modify("+".$row['DURASI_PENYEWAAN']." day");
			if ($row['ID_KENDARAAN'] == $id && $row['STATUS_PENYEWAAN'] != 'EXPIRED') {
				if ($now >= $sewa && $now <= $end) {
					return false;
				}
			}
		}
		return true;
	}

	function checkPaket($paket) {
		$now = new DateTime(date('Y-m-d H:i:s'));
		$start = new DateTime($paket['TANGGAL_PAKET']);
		$start->modify("-3 day");
		if ($now >= $start) {
			return false;
		}
		return true;
	}

	function checkSpecArmadaStatus($id, $start, $end) {
		$start = new DateTime($start);
		$end = new DateTime($end);
		$statement = DB->prepare("SELECT * FROM penyewaan");
		$statement->execute();
		foreach ($statement as $row) {
			$sewa = new DateTime($row['TANGGAL_PENYEWAAN'].' 23:59:59');
			$selesai = new DateTime($row['TANGGAL_PENYEWAAN'].' 23:59:59');
			$selesai->modify("+".$row['DURASI_PENYEWAAN']." day");
			if ($row['ID_KENDARAAN'] == $id && $row['STATUS_PENYEWAAN'] != 'EXPIRED') {
				if ($end >= $sewa && $start <= $selesai) {
					return false;
				}
			}
		}
		return true;
	}

	function setExpireStatus() {
		$now = new DateTime(date('Y-m-d H:i:s'));
		$sewas = getTableData('penyewaan');
		foreach ($sewas as $sewa) {
			if ($sewa['STATUS_PENYEWAAN'] == 'BELUM') {
				$exp = new DateTime($sewa['TANGGAL_PENYEWAAN'].' 23:59:59');
				$exp->modify('+1 day');
				$armada = getAllData('kendaraan', $sewa['ID_KENDARAAN']);
				if ($now > $exp ) {
					try{
						$statement = DB->prepare("UPDATE penyewaan SET STATUS_PENYEWAAN = 'EXPIRED' where ID_PENYEWAAN = :id");
						$statement->bindValue(':id',$sewa['ID_PENYEWAAN']);
						$statement->execute();
					}
					catch(PDOException $err){
						echo $err->getMessage();
					}
				}
			}
		}
		$pesans = getTableData('pemesanan');
		foreach ($pesans as $pesan) {
			if ($pesan['STATUS_PEMESANAN'] == 'BELUM') {
				$exp = new DateTime($pesan['TANGGAL_PEMESANAN'].' 23:59:59');
				$exp->modify('+1 day');
				$paket = getAllData('paket', $pesan['ID_PAKET']);
				if ($now > $exp || $paket['KAPASITAS_PAKET'] < 1 || $pesan['JUMLAH_PESANAN'] > $paket['KAPASITAS_PAKET']) {
					try{
						$statement = DB->prepare("UPDATE pemesanan SET STATUS_PEMESANAN = 'EXPIRED' where ID_PEMESANAN = :id");
						$statement->bindValue(':id',$pesan['ID_PEMESANAN']);
						$statement->execute();
					}
					catch(PDOException $err){
						echo $err->getMessage();
					}
				}
			}
		}
	}

	function getPaketById($id) {
		try{
			$statement = DB->prepare("SELECT * FROM paket where ID_PAKET = :id");
			$statement->bindValue(':id',$id);
			$statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	//mencocokkan password dan username saat login
    function check($field_list) {
    	try {
    		$stm = DB->prepare("SELECT * FROM user WHERE ID_USER = :uname and PASSWORD_USER = SHA2(:pw, 256)");
			$stm->bindValue(':uname', $field_list['id']);
			$stm->bindValue(':pw', $field_list['password']);
			$stm->execute();
			return $stm->rowCount() > 0;
	    } catch(PDOException $err) {
	    	echo $err->getMessage();
		}
    }

	//cek username dalam database agar tidak terjadi duplikasi pada email/username
	function db_check($field_list, $field_name) {
		$statement = DB->prepare("SELECT ID_USER FROM user");
		$statement->execute();
		foreach ($statement as $row) {
			if ($field_list[$field_name] == $row['ID_USER']) {
				return false;
			}
		}
		return true;
    }

	//register user
	function add($post) {
		try {
			$statement = DB->prepare("INSERT IGNORE INTO user (ID_USER, NAMA_USER, ALAMAT_USER, TELEPON_USER, PASSWORD_USER) VALUES (:id, :name,:add,:ph, SHA2(:pass, 256))");
			$statement->bindValue(':id', htmlspecialchars($post['id']));
			$statement->bindValue(':name', htmlspecialchars($post['nama']));
			$statement->bindValue(':add', htmlspecialchars($post['alamat']));
			$statement->bindValue(':ph', htmlspecialchars($post['telepon']));
			$statement->bindValue(':pass', $post['password']);
			$statement->execute();
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	//edit profil user
	function edit(&$errors, $post, $id) {
		try {
			$statement = DB->prepare("UPDATE user SET NAMA_USER = :name, ALAMAT_USER = :add, TELEPON_USER = :ph WHERE ID_USER = '$id'");
			$statement->bindValue(':name', htmlspecialchars($post['nama']));
			$statement->bindValue(':add', htmlspecialchars($post['alamat']));
			$statement->bindValue(':ph', $post['telepon']);
			$statement->execute();
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	//ambil data spesifik dari suatu tabel berdasarkan id
	function getData($data, $table, $id) {
		try{
			$statement = DB->prepare("SELECT $data FROM $table where ".strtoupper($table)."_ID = :id");
			$statement->bindValue(':id',$id);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	//ambil seluruh data yang ada dalam suatu baris tabel berdasarkan id
	function getAllData($table, $id) {
		try{
			$statement = DB->prepare("SELECT * FROM $table where ID_".strtoupper($table)." = :id");
			$statement->bindValue(':id',$id);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	//ambil data transaksi user
	function getUserData($table, $table2, $id) {
		$name = strtoupper($table2);
		try{
			$statement = DB->prepare("SELECT * FROM $table, $table2 where ID_USER = :id AND $table.ID_$name = $table2.ID_$name");
			$statement->bindValue(':id',$id);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}

	//ambil data spesifik transaksi user
	function getBayarData($table, $table2, $id, $byr) {
		$name = strtoupper($table2);
		$name2 = strtoupper($table);
		try{
			$statement = DB->prepare("SELECT * FROM $table, $table2 where ID_USER = :id and $table.ID_$name = $table2.ID_$name and ID_$name2 = :byr");
			$statement->bindValue(':id',$id);
			$statement->bindValue(':byr',$byr);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}


	//ambil seluruh data dari suatu tabel
	function getTableData($table) {
		try{
			$statement = DB->prepare("SELECT * FROM $table");
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $err){
			echo $err->getMessage();
		}
	}


    //cek ketersediaan email saat edit profil
    function specCheck($data ,$table, $name, $id) {
    	$key = strtoupper($table)."_".strtoupper($name);
    	$stm = DB->prepare("SELECT $key FROM $table");
    	$stm->execute();
    	foreach ($stm as $row) {
    		if ($data != show($table, $name, $id) and $data == $row[$key]) {
    			return false;
    		}
    	}
    	return true;
    }

    //ambil id terakhir yang ditambahkan
    function getLastInsertedId($table) {
	    try {
	        $sql = "SELECT * FROM $table ORDER BY ID_".strtoupper($table)." DESC LIMIT 1";
	        $stm = DB->prepare($sql);
	        $stm->execute();
	        if ($stm->rowCount() > 0) {
	            $result = $stm->fetch();
	            return $result["ID_".strtoupper($table)];
	        } else {
	            if ($table == 'penyewaan') {
	                return 'TS000000';
	            } elseif ($table == 'pemesanan') {
	                return 'TP000000';
	            }
	        }
	    } catch (PDOException $err) {
	        echo $err->getMessage();
	    }
	}

	//generate id varchar baru
	function autoGenId($lastId) {
	    $str = substr($lastId, 0, 2);
	    $num = substr($lastId, 2, 7);
	    $newNum = str_repeat("0", 6 - strlen(strval(intval($num) + 1))).strval(intval($num) + 1);
	    return $str.$newNum;
	}

	//sewa kendaraan
	function sewa($post, $user, $kendaraan) {
		$lastId = getLastInsertedId('penyewaan');
	    $newId = autoGenId($lastId);
	    $armada = getAllData('kendaraan', $kendaraan);
	    $date1 = new DateTime($post['start']);
	    $date2 = new DateTime($post['end']);
	    $interval = $date1->diff($date2);
	    $int = intval($interval->days);
		try {
			$statement = DB->prepare("INSERT IGNORE INTO penyewaan (ID_PENYEWAAN, ID_KENDARAAN, ID_USER, TITIK_JEMPUT_PENYEWAAN, CATATAN_PENYEWAAN, DURASI_PENYEWAAN, TOTAL_HARGA, TANGGAL_PENYEWAAN) VALUES (:id, :kd,:us,:tj, :cp, :dp, :th, :tp)");
			$statement->bindValue(':id', $newId);
			$statement->bindValue(':kd', htmlspecialchars($kendaraan));
			$statement->bindValue(':us', htmlspecialchars($user));
			$statement->bindValue(':tj', htmlspecialchars($post['titik']));
			$statement->bindValue(':cp', htmlspecialchars($post['catatan']));
			$statement->bindValue(':dp', $int);
			$statement->bindValue(':th', (intval($armada[0]['HARGA_KENDARAAN'])*$int));
			$statement->bindValue(':tp', htmlspecialchars($post['start']));
			$statement->execute();
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	//pesan paket
	function pesan($post, $user, $paket) {
		$lastId = getLastInsertedId('pemesanan');
	    $newId = autoGenId($lastId);
	    $pakets = getAllData('paket', $paket);
		try {
			$statement = DB->prepare("INSERT IGNORE INTO pemesanan (ID_PEMESANAN, ID_PAKET, ID_USER, CATATAN_PESANAN, JUMLAH_PESANAN, TOTAL_HARGA, TITIK_JEMPUT_PEMESANAN) VALUES (:id, :pk,:us, :cp, :jp, :th, :tj)");
			$statement->bindValue(':id', $newId);
			$statement->bindValue(':pk', htmlspecialchars($paket));
			$statement->bindValue(':us', htmlspecialchars($user));
			$statement->bindValue(':tj', htmlspecialchars($post['titik']));
			$statement->bindValue(':cp', htmlspecialchars($post['catatan']));
			$statement->bindValue(':jp', htmlspecialchars(intval($post['jumlah'])));
			$statement->bindValue(':th', (intval($pakets[0]['HARGA_PAKET'])*$post['jumlah']));
			$statement->execute();
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	//tambah brand baru
	function addBrand($post) {
	    try {
	    	$img = $post[1]['gambar']['name'];
			$tmp = $post[1]['gambar']['tmp_name'];
			$dir = "../../../assets/images/brands/";
			$new = time().$img;
			move_uploaded_file($tmp, $dir . $new);
	        $lastBrandId = getLastInsertedId('brand');
	        $newBrandId = autoGenId($lastBrandId);
	        $statement = DB->prepare("INSERT IGNORE INTO brand (BRAND_ID, BRAND_NAME, BRAND_IMG) VALUES (:id, :name, :img)");
	        $statement->bindValue(':id', $newBrandId);
	        $statement->bindValue(':name', htmlspecialchars($post[0]['nama']));
	        $statement->bindValue(':img', $new);
	        $statement->execute();
	    } catch (PDOException $err) {
	        echo $err->getMessage();
	    }
	}

	//edit detail brand berdasarkan id
	function editBrand($post) {
		try {
			$id = $post[0]['id'];
			if (!empty($post[1]['gambar']['name'])) {
				$img = $post[1]['gambar']['name'];
				$tmp = $post[1]['gambar']['tmp_name'];
				$dir = "../../../assets/images/brands/";
				$new = time().$img;
				move_uploaded_file($tmp, $dir . $new);
			} else {
				$new = $post[0]['old'];
			}
	        $statement = DB->prepare("UPDATE brand SET BRAND_NAME = :name, BRAND_IMG = :img WHERE BRAND_ID = '$id'");
	        $statement->bindValue(':name', htmlspecialchars($post[0]['nama']));
	        $statement->bindValue(':img', $new);
	        $statement->execute();
	    } catch (PDOException $err) {
	        echo $err->getMessage();
	    }	
	}

	//tambah produk baru
	function addProduct($post) {
		try {
			$img = $post[1]['gambar']['name'];
			$tmp = $post[1]['gambar']['tmp_name'];
			$dir = "../../../assets/images/products/";
			$new = $img;
			move_uploaded_file($tmp, $dir . $new);
	        $lastProdId = getLastInsertedId('product');
	        $newProdId = autoGenId($lastProdId);
	        $statement = DB->prepare("INSERT IGNORE INTO product (PRODUCT_ID, BRAND_ID, PRODUCT_NAME, PRODUCT_IMG, PRODUCT_STOCK, PRODUCT_PRICE, PRODUCT_DESC) VALUES (:id, :brand, :name, :img, :stock, :price, :desc )");
	        $statement->bindValue(':id', $newProdId);
	        $statement->bindValue(':brand', $post[0]['brand']);
	        $statement->bindValue(':name', htmlspecialchars($post[0]['nama']));
	        $statement->bindValue(':img', $new);
	        $statement->bindValue(':stock', $post[0]['stock']);
	        $statement->bindValue(':price', $post[0]['harga']);
	        $statement->bindValue(':desc', $post[0]['deskripsi']);
	        $statement->execute();
	    } catch (PDOException $err) {
	        echo $err->getMessage();
	    }
	}

	//edit detail paket berdasarkan id
	function editPaket($post) {
		try {
			$id = $post[0]['id'];
			if (!empty($post[1]['gambar']['name'])) {
				$img = $post[1]['gambar']['name'];
				$tmp = $post[1]['gambar']['tmp_name'];
				$dir = "../../../assets/img/paket/";
				$new = $img;
				move_uploaded_file($tmp, $dir . $new);
			} else {
				$new = $post[0]['old'];
			}
	        $statement = DB->prepare("UPDATE paket SET NAMA_PAKET = :name, GAMBAR_PAKET = :img, KAPASITAS_PAKET = :stock, HARGA_PAKET = :price, DESKRIPSI_PAKET = :desk, DESTINASI_PAKET = :dest, JEMPUT_PAKET = :jemp, TANGGAL_PAKET = :tgl WHERE ID_PAKET = '$id'");
	        $statement->bindValue(':name', htmlspecialchars($post[0]['nama']));
	        $statement->bindValue(':img', $new);
	        $statement->bindValue(':stock', htmlspecialchars($post[0]['kapasitas']));
	        $statement->bindValue(':price', htmlspecialchars($post[0]['harga']));
	        $statement->bindValue(':desk', htmlspecialchars($post[0]['deskripsi']));
	        $statement->bindValue(':dest', htmlspecialchars($post[0]['destinasi']));
	        $statement->bindValue(':jemp', htmlspecialchars($post[0]['jemput']));
	        $statement->bindValue(':tgl', htmlspecialchars($post[0]['tanggal']));
	        $statement->execute();
	    } catch (PDOException $err) {
	        echo $err->getMessage();
	    }
	}

	//edit detail armada berdasarkan id
	function editArmada($post) {
		try {
			$id = $post[0]['id'];
			if (!empty($post[1]['gambar']['name'])) {
				$img = $post[1]['gambar']['name'];
				$tmp = $post[1]['gambar']['tmp_name'];
				$dir = "../../../assets/img/armada/";
				$new = $img;
				move_uploaded_file($tmp, $dir . $new);
			} else {
				$new = $post[0]['old'];
			}
	        $statement = DB->prepare("UPDATE kendaraan SET NAMA_KENDARAAN = :name, GAMBAR_KENDARAAN = :img, HARGA_KENDARAAN = :price, DESKRIPSI_KENDARAAN = :desk WHERE ID_KENDARAAN = '$id'");
	        $statement->bindValue(':name', htmlspecialchars($post[0]['nama']));
	        $statement->bindValue(':img', $new);
	        $statement->bindValue(':price', $post[0]['harga']);
	        $statement->bindValue(':desk', $post[0]['deskripsi']);
	        $statement->execute();
	    } catch (PDOException $err) {
	        echo $err->getMessage();
	    }
	}

	//hapus baris tertentu pada tabel berdasarkan id
	function delete($kode, $table) {
		try {
			$statement = DB->prepare("DELETE FROM $table WHERE ID_".strtoupper($table)." = :id");
			$statement->bindValue(':id', $kode);
			$statement->execute();
		} catch (PDOException $err) {
			echo "Hapus data gagal";
			echo $err->getMessage();
		}
	}


    //menampilkan data kolom spesifik dari suatu baris tabel berdasarkan id
    function show($table, $name, $id) {
    	try {
    		$stm = DB->query("SELECT ".strtoupper($name)."_".strtoupper($table)." FROM $table WHERE ID_".strtoupper($table)." = '$id'");
	    	$db = $stm->fetchAll(PDO::FETCH_ASSOC);
	    	return $db[0][strtoupper($name)."_".strtoupper($table)];
	    } catch(PDOException $err) {
	    	echo $err->getMessage();
		}
    }

    //validasi password saat edit profil
    function edit_check($field_list,  $table, $id) {
    	try {
    		$stm = DB->prepare("SELECT * FROM $table WHERE ".strtoupper($table)."_ID = :id and ".strtoupper($table)."_PASSWORD = SHA2(:pass, 0)");
    		$stm->bindValue(':id', "'$id'");
			$stm->bindValue(':pass', $field_list['old']);
			$stm->execute();
			return $stm->rowCount() > 0;
    	} catch (PDOException $err) {
	    	echo $err->getMessage();
		}
    }
	//ambil list brand
	function getBrands(){
		try{
			$statement = DB->prepare("SELECT * FROM brand");
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
            echo $err->getMessage();
        }
	}

    //ambil seluruh data produk dengan detail brand
	function getProductwithBrands(){
        try {
            $statement =DB->prepare("SELECT * FROM product JOIN brand ON brand.BRAND_ID = product.BRAND_ID");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
	
	//ambil 2 data dari tabel berbeda
	function getTwoTable($table1, $table2){
        try {
            $statement = DB->prepare("SELECT * FROM `$table1` JOIN `$table2` ON ".$table2.".".strtoupper($table2)."_ID = ".$table1.".".strtoupper($table2)."_ID");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
	}

	//ambil data order sesuai status pembayaran
	function getSpecOrderDetail($table1, $table2, $con){
        try {
            $statement = DB->prepare("SELECT * FROM `$table1` JOIN `$table2` ON ".$table2.".".strtoupper($table2)."_ID = ".$table1.".".strtoupper($table2)."_ID WHERE PAYMENT_STATUS = $con");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
	}

	//filter data sesuai range tanggal order
	function getSpecDateOrderDetail($table1, $table2, $con, $start, $end){
        try {
            $statement = DB->prepare("SELECT * FROM `$table1` JOIN `$table2` ON ".$table2.".".strtoupper($table2)."_ID = ".$table1.".".strtoupper($table2)."_ID WHERE PAYMENT_STATUS = $con AND (ORDER_TIME BETWEEN '$start' AND '$end')");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
	}


    //filter produk produk dari brand tertentu berdasae id brand
    function getBrandProduct($id){
        try {
            $statement =DB->prepare("SELECT * FROM product JOIN brand ON brand.BRAND_ID = product.BRAND_ID WHERE product.BRAND_ID = :id");
            $statement->bindValue(':id', $id);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    //end


	function GetCartID($User){
		try{
			$statement = DB->prepare("SELECT CART_ID FROM cart WHERE USER_ID = :user");
			$statement->bindValue(":user",$User);
			$statement->execute();
			// var_dump ($statement->fetchAll(PDO::FETCH_ASSOC));
			if ($statement->rowCount()<1){
				$statement = DB->prepare("INSERT INTO cart(USER_ID) VALUES(:user)");
				$statement->bindValue(":user",$User);
				$statement->execute();
				$statement = DB->prepare("SELECT CART_ID FROM cart WHERE USER_ID = :user");
				$statement->bindValue(":user",$User);
				$statement->execute();
				return $statement->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return $statement->fetchAll(PDO::FETCH_ASSOC);
			}
		} catch (PDOException $err) {
			echo $err->getMessage();
		}

	}

	function getTotalSomeProductinCart($productid, $cartid){
		try{
			$statement = DB->prepare("SELECT * FROM cart_detail WHERE CART_ID = :cID AND PRODUCT_ID = :pID");
			$statement->bindValue(":pID",$productid);
			$statement->bindValue(":cID",$cartid);
			$statement->execute();
			$statement->fetchAll(PDO::FETCH_ASSOC);
			$count = $statement->rowCount();
			return $count;
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function insertCart($user,$iP)
	{
		try {
			$iC = GetCartID($user);
			// var_dump($iC);
			$st = DB->prepare("UPDATE product SET PRODUCT_STOCK = PRODUCT_STOCK-1 WHERE PRODUCT_ID = :id");
			$st->bindValue(':id', $iP);
			$st->execute();
			
			$statement = DB->prepare("INSERT INTO cart_detail(PRODUCT_ID, CART_ID) VALUES(:idProduk, :idCart)");
			// $statement->bindValue(':idDetail', $iD);
			$statement->bindValue(':idProduk', $iP);
			$statement->bindValue(':idCart', $iC[0]["CART_ID"]);
			$statement->execute();

			$previousPage = $_SERVER['HTTP_REFERER'];
			header("Location: $previousPage");
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function getCartDetail($user){
		try {
			$statement = DB->prepare("SELECT cd.CART_DETAIL_ID, p.PRODUCT_ID, PRODUCT_NAME, PRODUCT_STOCK, PRODUCT_PRICE, p.PRODUCT_IMG,count(*) as Jumlah 
			FROM cart_detail cd JOIN product p ON cd.PRODUCT_ID = p.PRODUCT_ID JOIN cart c ON c.CART_ID = cd.CART_ID WHERE USER_ID = :user GROUP BY PRODUCT_ID");
			$statement->bindValue(':user', $user);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}
	

	function min_productincart($productid){
		try{
			$st = DB->prepare("UPDATE product SET PRODUCT_STOCK = PRODUCT_STOCK+1 WHERE PRODUCT_ID = :id");
			$st->bindValue(':id', $productid);
			$st->execute();
			
			$statement = DB->prepare("DELETE FROM cart_detail WHERE PRODUCT_ID = :pro LIMIT 1");
			$statement->bindValue(":pro",$productid);
			$statement->execute();

			$previousPage = $_SERVER['HTTP_REFERER'];
			header("Location: $previousPage");
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}
	function plus_productincart($iC,$iP){
		try{
			$st = DB->prepare("UPDATE product SET PRODUCT_STOCK = PRODUCT_STOCK-1 WHERE PRODUCT_ID = :id");
			$st->bindValue(':id', $iP);
			$st->execute();

			$statement = DB->prepare("INSERT INTO cart_detail(PRODUCT_ID, CART_ID) VALUES(:idProduk, :idCart)");
			// $statement->bindValue(':idDetail', $iD);
			$statement->bindValue(':idProduk', $iP);
			$statement->bindValue(':idCart', $iC);
			$statement->execute();

			$previousPage = $_SERVER['HTTP_REFERER'];
			header("Location: $previousPage");
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function Pesan1($user){
		try{ 
			$a = [];
			$products = getCartDetail($user);
			$total = 0;
			foreach($products as $product){
				$iC = GetCartID($_SESSION['id']); $sum = $product["PRODUCT_PRICE"]*getTotalSomeProductinCart($product["PRODUCT_ID"], $iC[0]["CART_ID"]); $a[] = $sum;
			}
			foreach($a as $num){
				$total = $total + $num;
			}

			$status = 0;
			$statement = DB->prepare("INSERT INTO `order` (USER_ID,TOTAL,PAYMENT_STATUS)
			VALUES (:user, :total,:paystatus)");
			$statement->bindValue(":user", $user);
			$statement->bindValue(":total", $total);
			// $statement->bindValue(":otime", NULL);
			$statement->bindValue(":paystatus", $status);
			$statement->execute();
			
			// $GetOrderID = DB->prepare("SELECT * FROM `order` WHERE USER_ID = :user");
			// $GetOrderID->bindValue(":user", $user);
			// $GetOrderID->execute();
			// $GetOrderID->fetch(PDO::FETCH_ASSOC);
			$cart_id=DB->LastInsertId();
			
			foreach($products as $product){
				$a = $product["PRODUCT_ID"];
				$b = $product["Jumlah"];
				$order_detail = DB->prepare("INSERT INTO order_detail(ORDER_ID,PRODUCT_ID,QTY)
				VALUES (:orderid, :proid, :qty)");
				$order_detail->bindValue(":orderid",$cart_id);
				$order_detail->bindValue(":proid",$a);
				$order_detail->bindValue(":qty",$b);
				$order_detail->execute();
			}

			$c = GetCartID($user);
			var_dump($c);

			$cD_Del = DB->prepare("DELETE FROM cart_detail WHERE CART_ID = :CARTID");
			$cD_Del->bindValue(":CARTID",$c[0]["CART_ID"]);
			$cD_Del->execute();

			$cart = DB->prepare("DELETE FROM cart WHERE USER_ID = :user");
			$cart->bindValue(":user", $user);
			$cart->execute();

			header("location:" . BASEURL . "/app/user/Belum_Bayar.php");
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	function getOrderList($user){
		try{
			$statement = DB->prepare("SELECT * FROM `order` WHERE USER_ID = :user");
			$statement->bindValue(":user",$user);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}
	function removeOrder($id){
		try{
			$statement = DB->prepare("SELECT * FROM order_detail WHERE ORDER_ID = :id");
			$statement->bindValue(":id",$id);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			var_dump($result);
			foreach($result as $s){ 
				$st = DB->prepare("UPDATE product SET PRODUCT_STOCK = PRODUCT_STOCK+:stk WHERE PRODUCT_ID = :id");
				$st->bindValue(':id', $s["PRODUCT_ID"]);
				$st->bindValue(':stk',$s["QTY"]);
				$st->execute();
			}
			$statement = DB->prepare("DELETE FROM order_detail WHERE ORDER_ID = :id");
			$statement->bindValue(":id",$id);
			$statement->execute();

			$st = DB->prepare("DELETE FROM `order` WHERE ORDER_ID = :id");
			$st->bindValue(":id",$id);
			$st->execute();
			$previousPage = $_SERVER['HTTP_REFERER'];
			header("Location: $previousPage");
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}

	function getOrderDetailData($id){
		try {
			$statement = DB->prepare("SELECT * FROM order_detail WHERE ORDER_ID = :orderid");
			$statement->bindValue(":orderid",$id);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
	function removeOrder_detail($id){
		try{
			$statement = DB->prepare("SELECT * FROM order_detail WHERE ORDER_DETAIL_ID = :id");
			$statement->bindValue(":id",$id);
			$statement->execute();
			$s = $statement->fetch(PDO::FETCH_ASSOC);

			$st = DB->prepare("UPDATE product SET PRODUCT_STOCK = PRODUCT_STOCK+:stk WHERE PRODUCT_ID = :id");
			$st->bindValue(':id', $s["PRODUCT_ID"]);
			$st->bindValue(':stk',$s["QTY"]);
			$st->execute();

			$statement = DB->prepare("DELETE FROM order_detail WHERE ORDER_DETAIL_ID = :id");
			$statement->bindValue(":id",$id);
			$statement->execute();
			$previousPage = $_SERVER['HTTP_REFERER'];
			header("Location: $previousPage");
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}


	// --------------------------------------CHECKOUT-----------------------------------------------
	// function checkout($id){
	// 	$order_detail = getOrderDetailData($id);
	// 	$products = getProductfromID($order_detail["PRODUCT_ID"]);
	// }


	//---------------------------------------BELUM DIBAYAR - SUDAH DIBAYAR -----------------------------------

	function verifikasiorder($id){
		try{
			$statement = DB->prepare("UPDATE `order` SET PAYMENT_STATUS = 1 WHERE ORDER_ID = :id");
			$statement->bindValue(":id",$id);
			$statement->execute();
			header("Location: Telah_Bayar.php");
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
	function BayarOrder($payment, $orderid){
		try{
			$statement = DB->prepare("UPDATE `order` SET PAYMENT_METHOD_ID = :payid WHERE ORDER_ID = :id");
			$statement->bindValue(':id',$orderid);
			$statement->bindValue(':payid',$payment);
			$statement->execute();

			verifikasiorder($orderid);
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
	function showUserPaymentData($ID){
		try{
			$statement = DB->prepare("SELECT * FROM payment_method WHERE USER_ID = :id");
			$statement->bindValue(":id",$ID);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
	function getPaymentData($ID){
		try{
			$statement = DB->prepare("SELECT * FROM payment_method WHERE USER_ID = :id");
			$statement->bindValue(":id",$ID);
			$statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
	function getOrderandPayment($user){
		try{
			$statement = DB->prepare("SELECT pm.PAYMENT_METHOD_ID, ord.ORDER_ID, ord.USER_ID, ord.TOTAL,ord.ORDER_TIME, ord.PAYMENT_STATUS, pm.BANK_NAME, pm.NOMOR_REKENING 
			FROM payment_method pm 
			JOIN `order` ord ON pm.PAYMENT_METHOD_ID = ord.PAYMENT_METHOD_ID
			WHERE ord.USER_ID = :user");
			$statement->bindValue(":user",$user);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}

	// ---------------------------------------------------- PAYMENT_METHOD ------------------------------------------------------

	function AddPaymentMethod($name, $rek, $user){
		try{
			$statement = DB->prepare("INSERT INTO payment_method (BANK_NAME, NOMOR_REKENING, USER_ID)
			VALUES (:Bank_Name, :rek, :user)");
			$statement->bindValue(":user",$user);
			$statement->bindValue(":rek",$rek);
			$statement->bindValue(":Bank_Name",$name);
			$statement->execute();

		}catch (PDOException $err) {
            echo $err->getMessage();
        }
	}
?>