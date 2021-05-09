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
			$.getJSON("http://localhost/api/kewilayahan/index.php",{"act":"GetDesaByKecamatanID","data":{"KecamatanID":"3374050"}}, function(result) {
				$.each(result, function(i) {
				   document.getElementById("DataDesa").innerHTML +="<tr><td>" + result[i].DesaID + "</td><td>" + result[i].Nama + "</td></tr>";
				});
			});
		</script>
	</head>
	
	<body>
		<div><h3>Daftar Desa di Kecamatan Semarang Selatan</h3></div>
		<div id="TabelKewilayahan">
		<table border='1'>
			<thead><tr><th>Kode</th><th>Nama Desa</th></tr></thead>
			<tbody id="DataDesa"></tbody>
		</table>
		</div>
	</body>
	
</html>