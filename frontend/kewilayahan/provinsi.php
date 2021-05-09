<!-- 
Web Service Requestor 
Mengambil data kewilayahan dari API Rest menggunakan JQuery dengan perintah $.getJSON
(c)FTI Universitas Stikubank 2021
mrjf@edu.unisbank.ac.id
!-->

<html>

	<head>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script type="text/javascript">
			$.getJSON("http://localhost/api/kewilayahan/index.php",{"act":"GetAllProvinsi"}, function(result) {
				$.each(result, function(i) {
				   document.getElementById("DataProvinsi").innerHTML +="<tr><td>" + result[i].ProvinsiID + "</td><td>" + result[i].Nama + "</td></tr>";
				});
			});
		</script>
	</head>
	
	<body>
		<div><h3>Daftar Provinsi di Indonesia</h3></div>
		<div id="TabelKewilayahan">
		<table border='1'>
			<thead><tr><th>Kode</th><th>Nama Provinsi</th></tr></thead>
			<tbody id="DataProvinsi"></tbody>
		</table>
		</div>
	</body>
	
</html>