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
			$.getJSON("http://localhost/api/kewilayahan/index.php",{"act":"GetKabupatenByProvinsiID","data":{"ProvinsiID":"33"}}, function(result) {
				$.each(result, function(i) {
				   document.getElementById("DataKabupaten").innerHTML +="<tr><td>" + result[i].KabupatenID + "</td><td>" + result[i].Nama + "</td></tr>";
				});
			});
		</script>
	</head>
	
	<body>
		<div><h3>Daftar Kabupaten di Jawa Tengah</h3></div>
		<div id="TabelKewilayahan">
		<table border='1'>
			<thead><tr><th>Kode</th><th>Nama Kabupaten</th></tr></thead>
			<tbody id="DataKabupaten"></tbody>
		</table>
		</div>
	</body>
	
</html>