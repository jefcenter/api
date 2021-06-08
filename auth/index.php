<?php
	
	header('Content-Type: application/json; charset=utf8');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition,Content-Description');
	
	//Masukkan file koneksi
	include 'koneksi.php';
	
	//Definisikan Token
	define('ClientID','01c4bf6ba816ef53c34e057af258f76f');
	define('ClientSecret','cda2c99fbf5e19f20d331299c15a4491');
	$token=base64_encode(ClientID.":".ClientSecret);
	$action=$_REQUEST['act'];
	$requestHeaders = apache_request_headers();
	$Authorization = trim($requestHeaders['Authorization']);

		if (isset($Authorization)) 
		{
			list($type, $data) = explode(" ", $Authorization, 2);	
			if (strcasecmp($type, "Bearer") == 0) 
			{
				if($data!=$token)
				{
					echo '{"error":"Invalid Token"}';
					exit();
				}
			}else 
			{
				echo '{"error":"Invalid Auth Type"}';
				exit();
			}
		}else 
		{
			echo '{"error":"No Authx - '.$Authorization.'"}';
			exit();
		}
		
	//Ambil parameter data JSON untuk pemanggil fungsi dan data parameter
	$REQUEST = json_decode(file_get_contents('php://input'), true);
	if($REQUEST)
	{
		$vparam=$REQUEST[data]; 
		$REQUEST[act]($vparam,$con);
	}else
	{
		$vparam=$_REQUEST[data];
		$act=$_REQUEST[act];
		$act($vparam,$con);	
	}
	
	//Fungsi Menampilkan Semua Provinsi
	function GetAllProvinsi($vparam,$con)
	{
		$sql = 'select * from provinsi';
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	
	}
	
	//Fungsi Menampilkan Kabupaten berdasarkan Kode Provinsi
	function GetKabupatenByProvinsiID($vparam,$con)
	{
		$ProvinsiID="'".$vparam[ProvinsiID]."'";
		$sql = "select * from kabupaten where ProvinsiID=$ProvinsiID";
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	}
	
	//Fungsi Menampilkan Kecamatan berdasarkan Kode Kabupaten
	function GetKecamatanByKabupatenID($vparam,$con)
	{
		$KabupatenID="'".$vparam[KabupatenID]."'";
		$sql = "select * from kecamatan where KabupatenID=$KabupatenID";
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	}
	
	//Fungsi Menampilkan Desa berdasarkan Kode Kecamatan
	function GetDesaByKecamatanID($vparam,$con)
	{
		$KecamatanID="'".$vparam[KecamatanID]."'";
		$sql = "select * from desa where KecamatanID=$KecamatanID";
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	}
	
	//Fungsi Menampilkan Kabupaten berdasarkan Nama Kabupaten
	function GetKabupatenByKabupaten($vparam,$con)
	{
		$Kabupaten=$vparam[Kabupaten];
		$sql = "select * from kabupaten where Nama like '%$Kabupaten%'";
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	}
	
	//Fungsi Menampilkan Kecamatan berdasarkan Nama Kecamatan
	function GetKecamatanByKecamatan($vparam,$con)
	{
		$Kecamatan=$vparam[Kecamatan];
		$sql = "select * from kecamatan where Nama like '%$Kecamatan%'";
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	}
	
	//Fungsi Menampilkan Desa berdasarkan Nama Desa
	function GetDesaByDesa($vparam,$con)
	{
		$Desa=$vparam[Desa];
		$sql = "select * from desa where Nama like '%$Desa%'";
        $query = mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query,MYSQLI_ASSOC))
		$output[]=$data;
		echo json_encode($output);
	}
?>
	