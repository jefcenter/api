# API Kewilayahan 
REST Webservice kewilayahan Indonesia dengan JSON. API tanpa authentikasi terdapat pada direktori <u>noauth/api/kewilayahan</u> terdiri dari :<br>
<ol>
  <li>file koneksi.php : File koneksi berisi informasi koneksi ke database mysql, silahkan sesuaikan sendiri.</li>
  <li>file index.php : File index berisi fungsi-fungsi query data kewilayahan.</li>
</ol>
Silahkan download dan copykan ke folder wwwroot atau htdocs/api/kewilayahan/<br>
Dokumentasi cara penggunaan API dapat dilihat melalui https://documenter.getpostman.com/view/6893130/TzRREUf1

# Data Kewilayahan 
Data kewilayahan terdiri dari tabel Provinsi, Kabupaten, Kecamatan, Desa di Indonesia. Silahkan download dan import file kewilayahan.sql didalam direktori /sql ke database Mysql Server anda.<br>

# FrontEnd Kewilayahan 
File Frontend terdapat pada direktori frontend/kewilayahan. File didalamnya berperan untuk menampilkan data pada sisi client. Data kewilayahan diakses dari API Kewilayahan dengan menggunakan JQuery. Silahkan download dan copy ke folder wwwroot atau htdocs/kewilayahan/<br>
