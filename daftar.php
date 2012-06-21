
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daftar Member</title>
<style type="text/css">
body { /* background gambar */

	margin-top: 0px;
	color:#666666;
	background: #fff url("back.jpg") repeat-x;
}
#konten {   /* lebar layout web member */
	width:800px;						
	margin-left: auto;
	margin-right: auto;
	background-color:#FFFFFF;			
}
td {
font-family:Arial, Helvetica, sans-serif;
font-size: 12px;
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//1.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<script type="text/javascript" src="jquery.js"></script>

</head>
<body style="margin-top: 0px;background:#fff url('back.jpg') repeat-x;">
<div id="konten">
	<div id="isi" >
<script type="text/javascript" src="validate.js" ></script>
<script type="text/javascript">

$(document).ready(function() {
	
	$("#formID").validate({
		rules: {
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
			nfile: {
				required: true,
				accept:"jpg"
			}
		},
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid",
				remote: jQuery.validator.format("Email yang anda masukan sudah terdaftar.")
			},
			username: {
				required: "Username harus diisi",
				remote: jQuery.validator.format("Username yang anda masukan tidak valid atau sudah terdaftar.")
			},
			nfile: {
				required: "File harus diisi",
				accept: "Format file salah, seharusnya format Gambar JPG"
			},
			password: {
				required: "Password harus diisi kembali",
				minlength: "Password minimal 6 karakter"
			},
			confirm_password: {
				required: "Password harus diisi kembali",
				minlength: "Password minimal 6 karakter",
				equalTo: "Password tidak sama dengan yang diatas"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		},
		submitHandler: function() {
		
		var dataString = 'userid='+ $("#userid").val() + '&jenis='+ $("#jenis").val() + '&neg='+ $("#neg").val() + '&name='+ $("#name").val() + '&kelamin='+ $("#kelamin").val() + '&nis='+ $("#nis").val() + '&kelas=' + $("#kelas").val() + '&email='+ $("#email").val() + '&username='+ $("#username").val() + '&password='+ $("#password").val() + '&pertanyaan='+ $("#pertanyaan").val() + '&jawaban='+ $("#jawaban").val() + '&hari='+ $("#hari").val() + '&bulan='+ $("#bulan").val() + '&tahun='+ $("#tahun").val() + '&kerja='+ $("#kerja").val() + '&alamat='+ $("#alamat").val() + '&sekolah='+ $("#sekolah").val() + '&telp='+ $("#telp").val()+ '&blog='+ $("#blog").val() + '&tentang='+ $("#tentang").val()+ '&country='+ $("#country").val()+ '&stprofil='+ $("#stprofil").val()+ '&stblog='+ $("#stblog").val()+ '&code='+ $("#code").val();
		$.ajax({type: "POST",url: "membersave.php",data: dataString,cache: false,
		success: function(html){$("#hasil").append(html);$("#boxpesan").hide();}});
		
		}
		
	});
})
</script><script type="text/javascript">
$(document).ready(function()
{
$('#jenis').click(function(){

var element = $(this);
var jenis = $('#jenis').val();
if (jenis=='Alumni') {
	$('#target').show();
}
else {
	$('#target').hide();
}

return false;});});
</script> <div id='hasil' ></div><div id='boxpesan' >
    <form name='formID' id='formID' action='daftar.php' method='post'   >
	<input type=hidden name=userid id=userid value='5cg7ebab3b4bfb3c6bfbbc5' >
	<table border=0 width='100%' cellspacing='2' cellpadding='2' id=tablebaru >
	<tr><td colspan=3 bgcolor='#BDC5CC'><div style='float:right;margin-right:10px;margin-top:10px' ><a href='index.php' id='button2' >&nbsp; Login &nbsp;</a></div><img src='../images/icon21.png' width='100' height='100' style='margin:0 20px 0 10px' align=left > <h1>Pendaftaran Member - SMA Negeri 4 Bandung</h1>
	Silahkan Anda isi form dibawah ini dengan benar dan jujur. <br><br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Prosedur pendaftaran untuk Siswa dan Orang Tua/Wali sebagai berikut : </b><br>
<ol>
<li>Siswa/Orang tua dapat menghubungi langsung di sekolah melalui Tim IT SMA Negeri 4 Bandung 
<li>Isi formulir pendaftaran khusus member.
<li>Setelah didaftarkan langsung oleh Admin, silahkan cek email Anda untuk verifikasi data.
<li>Silahkan login ke sistem member tersebut.
<li>Atau pendaftaran melalui email <b>admin@websekolah.sch.id </b>, dengan menyertakan formulir yang sudah Anda isi dibawah ini<br>Download Formulir <a href='../formulir.doc' >di sini</a>
<li>Tunggu konfirmasi validasi data Anda melalui email Anda.<br>
</ol></td></tr><tr><td colspan=3 class='td0' >Informasi Khusus</td></tr>	
	<tr >
		<td align=right>Nama</td>
		<td>:</td>
		<td><input type='text' name='name' value='' id='name' size=20 maxlength='30' class='required' title='Nama harus diisi' ></td>
	</tr>
	<tr >
		<td align=right valign=top >Kelamin</td>
		<td valign=top >:</td>
		<td><SELECT name='kelamin' id='kelamin' class='required' title='Jenis kelamin harus dipilih' >
		<OPTION value='' selected>[Pilih]</option><OPTION  value='m' >Laki-laki<OPTION  value='f' >Perempuan</OPTION></SELECT>
		</td>
	</tr>
	<tr >
		<td align='right' valign='top' >Jenis Member</td>
		<td valign='top' >:</td>
		<td><select name='jenis' id='jenis' ><option value='Tamu'>Tamu</option><option value='Alumni'>Alumni</option></select>
	<div id='target' style='display:none' >Tahun Angkatan <input  id='kelas' type=text name=kelas value='' size=15  maxlength='4' title='Tahun Lulus harus diisi' ></div></td>
	</tr><tr><td colspan=3  class='td0'>Informasi Login</td></tr>
	<tr >
		<td align='right' valign='top' >Username ID</td>
		<td valign='top'>:</td>
		<td><input id='username' type=text name='username' remote='cekusername.php' size='30' class='required username' ><br>
		Username hanya diperbolehkan kombinasi antara huruf dan angka serta tanpa spasi</td>
	</tr>
	<tr >
		<td align=right valign='top'>Email</td>
		<td valign='top'>:</td>
		<td><input id='email' type=text name='email' remote='cekemail.php' size=30 value='' class='required email' >
		<br>Masukan email yang valid dan aktif.</td>
	</tr>
	<tr >
		<td align='right' valign='top'>Password</td>
		<td valign='top'>:</td>
		<td><input  id='password' type='password' name='password' size=20 style='width:180; height:20;' ></td>
	</tr>
	<tr >
		<td align='right' valign='top'>Re-type Password</td>
		<td valign='top'>:</td>
		<td><input id='confirm_password'  type=password name='confirm_password' size=20 style='width:180; height:20;' ></td>
	</tr>
	<tr >
		<td align=right>Tgl Lahir</td>
		<td>:</td>
		<td>
		<SELECT name='hari' id='hari' class='required' title='Tanggal harus dipilih' ><OPTION value=''
        selected></OPTION> <OPTION value=01>1</OPTION> <OPTION 
        value=02>2</OPTION> <OPTION value=03>3</OPTION> <OPTION 
        value=04>4</OPTION> <OPTION value=05>5</OPTION> <OPTION 
        value=06>6</OPTION> <OPTION value=07>7</OPTION> <OPTION 
        value=08>8</OPTION> <OPTION value=09>9</OPTION> <OPTION 
        value=10>10</OPTION> <OPTION value=11>11</OPTION> <OPTION 
        value=12>12</OPTION> <OPTION value=13>13</OPTION> <OPTION 
        value=14>14</OPTION> <OPTION value=15>15</OPTION> <OPTION 
        value=16>16</OPTION> <OPTION value=17>17</OPTION> <OPTION 
        value=18>18</OPTION> <OPTION value=19>19</OPTION> <OPTION 
        value=20>20</OPTION> <OPTION value=21>21</OPTION> <OPTION 
        value=22>22</OPTION> <OPTION value=23>23</OPTION> <OPTION 
        value=24>24</OPTION> <OPTION value=25>25</OPTION> <OPTION 
        value=26>26</OPTION> <OPTION value=27>27</OPTION> <OPTION 
        value=28>28</OPTION> <OPTION value=29>29</OPTION> <OPTION 
        value=30>30</OPTION> <OPTION value=31>31</OPTION></SELECT>
		<SELECT name='bulan' id='bulan' class='required' title='Bulan harus dipilih' ><OPTION value='' 
        selected></OPTION> <OPTION value=01>Jan</OPTION> <OPTION 
        value=02>Feb</OPTION> <OPTION value=03>Mar</OPTION> <OPTION 
        value=04>Apr</OPTION> <OPTION value=05>May</OPTION> <OPTION 
        value=06>Jun</OPTION> <OPTION value=07>Jul</OPTION> <OPTION 
        value=08>Aug</OPTION> <OPTION value=09>Sep</OPTION> <OPTION 
        value=10>Oct</OPTION> <OPTION value=11>Nov</OPTION> <OPTION 
        value=12>Dec</OPTION></SELECT>
		<SELECT id='tahun' name='tahun' class='required' title='Tahun harus dipilih'>
		<OPTION value='' selected ></OPTION> <OPTION 
	  	value=1995>1995</OPTION> <OPTION value=1994>1994</OPTION> <OPTION
		value=1993>1993</OPTION> <OPTION value=1992>1992</OPTION> <OPTION
		value=1991>1991</OPTION> <OPTION value=1990>1990</OPTION> <OPTION
		value=1989>1989</OPTION> <OPTION value=1988>1988</OPTION> <OPTION
        value=1987>1987</OPTION> <OPTION value=1986>1986</OPTION> <OPTION 
        value=1985>1985</OPTION> <OPTION value=1984>1984</OPTION> <OPTION 
        value=1983>1983</OPTION> <OPTION value=1982>1982</OPTION> <OPTION 
        value=1981>1981</OPTION> <OPTION value=1980>1980</OPTION> <OPTION 
        value=1979>1979</OPTION> <OPTION value=1978>1978</OPTION> <OPTION 
        value=1977>1977</OPTION> <OPTION value=1976>1976</OPTION> <OPTION 
        value=1975>1975</OPTION> <OPTION value=1974>1974</OPTION> <OPTION 
        value=1973>1973</OPTION> <OPTION value=1972>1972</OPTION> <OPTION 
        value=1971>1971</OPTION> <OPTION value=1970>1970</OPTION> <OPTION 
        value=1969>1969</OPTION> <OPTION value=1968>1968</OPTION> <OPTION 
        value=1967>1967</OPTION> <OPTION value=1966>1966</OPTION> <OPTION 
        value=1965>1965</OPTION> <OPTION value=1964>1964</OPTION> <OPTION 
        value=1963>1963</OPTION> <OPTION value=1962>1962</OPTION> <OPTION 
        value=1961>1961</OPTION> <OPTION value=1960>1960</OPTION> <OPTION 
        value=1959>1959</OPTION> <OPTION value=1958>1958</OPTION> <OPTION 
        value=1957>1957</OPTION> <OPTION value=1956>1956</OPTION> <OPTION 
        value=1955>1955</OPTION> <OPTION value=1954>1954</OPTION> <OPTION 
        value=1953>1953</OPTION> <OPTION value=1952>1952</OPTION> <OPTION 
        value=1951>1951</OPTION> <OPTION value=1950>1950</OPTION> <OPTION 
        value=1949>1949</OPTION> <OPTION value=1948>1948</OPTION> <OPTION 
        value=1947>1947</OPTION> <OPTION value=1946>1946</OPTION> <OPTION 
        value=1945>1945</OPTION> <OPTION value=1944>1944</OPTION> <OPTION 
        value=1943>1943</OPTION> <OPTION value=1942>1942</OPTION> <OPTION 
        value=1941>1941</OPTION> <OPTION value=1940>1940</OPTION> <OPTION 
        value=1939>1939</OPTION> <OPTION value=1938>1938</OPTION> <OPTION 
        value=1937>1937</OPTION> <OPTION value=1936>1936</OPTION> <OPTION 
        value=1935>1935</OPTION> <OPTION value=1934>1934</OPTION> <OPTION 
        value=1933>1933</OPTION> <OPTION value=1932>1932</OPTION> <OPTION 
        value=1931>1931</OPTION> <OPTION value=1930>1930</OPTION> <OPTION 
        value=1929>1929</OPTION> <OPTION value=1928>1928</OPTION> <OPTION 
        value=1927>1927</OPTION> <OPTION value=1926>1926</OPTION> <OPTION 
        value=1925>1925</OPTION> <OPTION value=1924>1924</OPTION> <OPTION 
        value=1923>1923</OPTION> <OPTION value=1922>1922</OPTION> <OPTION 
        value=1921>1921</OPTION> <OPTION value=1920>1920</OPTION></SELECT>
		</td>
	</tr>
	<tr >
		<td align='right' valign='top'>Pertanyaan</td>
		<td valign='top'>:</td>
		<td>
		<SELECT name='pertanyaan' id='pertanyaan'  class='required' title='Konfirmasi pertanyaan harus dipilih' >
		<OPTION value='' selected>[Pilih Pertanyaan]</option>
		<OPTION  value='1'>Apa nama binatang peliharaan?</option>
		<OPTION  value='2'>Apa nama sekolah anda pertama kali?</option>
		<OPTION  value='3'>Siapa pahlawan anda?</option>
		<OPTION  value='4'>Dimana tempat favorit anda?</option>
		<OPTION  value='5'>Apa hobby anda?</option>
		<OPTION  value='6'>Dimana tempat kerja anda?</option>
		<OPTION  value='7'>Apa warna kesukaan anda?</option>
		<OPTION  value='8'>Apa makanan favorit anda?</option>
		<OPTION  value='9'>Apa binatang kesukaan anda?</OPTION>
		</SELECT>
		</td>
	</tr>
	<tr>
		<td align='right' valign='top'>Jawaban</td>
		<td valign='top'>:</td>
		<td><input id='jawaban'  class='required' type=text name='jawaban' value='' size=20 maxlength='30' title='Konfirmasi jawaban harus diisi' ></td>
	</tr>
	
	<tr><td colspan=3 class='td0'>Informasi Pribadi </td></tr>
	<tr >
		<td align='right' valign='top'>Status Informasi</td>
		<td valign='top'>:</td>
		<td><select name='stprofil' id='stprofil' ><option value='open'  >Tampilkan ke teman</option>
		<option value='hide'  >Sembunyikan</option></select>
		</td>
	</tr>
		<tr >
		<td align=right valign=top>Pekerjaan</td>
		<td valign=top>:</td>
		<td><SELECT name='kerja' id='kerja' class='required' title='Pekerjaan harus dipilih'><OPTION value='Guru' >Guru</OPTION><OPTION value='Siswa' >Siswa</OPTION>
		<OPTION value='Mahasiswa' >Mahasiswa</OPTION><OPTION value='Dosen' >Dosen</OPTION>
		<OPTION value='Praktisi' >Praktisi</OPTION>
		<OPTION value='Pegawai Negeri' >Pegawai Negeri</OPTION><OPTION value='Pegawai Swasta' >Pegawai Swasta</OPTION>
		<OPTION value='Lain-lain' >Lain-lain</OPTION></select></td>
	</tr>
	<tr >
		<td align='right' valign='top'>Alamat</td>
		<td valign='top'>:</td>
		<td><textarea name='alamat' id='alamat' class='required' cols='40' rows='6' title='Alamat harus diisi' maxlength='100' ></textarea></td>
	</tr>
	<tr >
		<td align='right'>Negara</td>
		<td valign='top'>:</td>
		<td><select name='country' id='country'  >
      <option value='' selected></option>
	  <option value=ID>INDONESIA</option>
      <option value=US>UNITED STATES</option> 
      <option value=AF>Afghanistan</option>
      <option value=AL>Albania</option>
      <option value=DZ>Algeria</option>
      <option value=AR>Argentina</option>
      <option 
        value=AU>Australia</option>
      <option value=AT>Austria</option>
  	  <option value=CA>Canada</option>
      <option 
        value=BH>Bahrain</option>
      <option value=BD>Bangladesh</option>
      <option 
        value=BE>Belgium</option>
      <option value=BO>Bolivia</option>
      <option value=BR>Brazil</option>
      <option value=IO>British Indian Ocean Territory</option>
      <option 
        value=BN>Brunei Darussalam</option>
      <option value=BG>Bulgaria</option>
      <option value=KH>Cambodia</option>
      <option value=CM>Cameroon</option>
      <option value=CL>Chile</option>
      <option 
        value=CN>China</option>
      <option 
        value=CO>Colombia</option>
      <option 
        value=CG>Congo</option>
      <option 
        value=CR>Costa Rica</option>
      <option value=HR>Croatia</option>
      <option 
        value=CU>Cuba</option>
      <option value=CY>Cyprus</option>
      <option 
        value=CZ>Czech Republic</option>
      <option value=DK>Denmark</option>
      <option value=TP>East Timor</option>
      <option value=EC>Ecuador</option>
      <option 
        value=EG>Egypt</option>
      <option value=SV>El Salvador</option>
      <option value=EE>Estonia</option>
      <option value=ET>Ethiopia</option>
       <option 
        value=FI>Finland</option>
      <option value=FR>France</option>
      <option value=GF>French Guiana</option>
      <option 
        value=GE>Georgia</option>
      <option value=DE>Germany</option>
      <option 
        value=GR>Greece</option>
      <option 
        value=HK>Hong Kong</option>
      <option value=HU>Hungary</option>
      <option 
        value=IS>Iceland</option>
      <option value=IN>India</option>
      <option 
        value=ID>Indonesia</option>
      <option value=IR>Iran</option>
      <option 
        value=IQ>Iraq</option>
      <option value=IE>Ireland</option>
      <option 
        value=IL>Israel</option>
      <option value=IT>Italy</option>
      <option 
        value=JM>Jamaica</option>
      <option value=JP>Japan</option>
      <option 
        value=JO>Jordan</option>
      <option value=KZ>Kazakhstan</option>
      <option 
        value=KE>Kenya</option>
      <option value=KI>Kiribati</option>
      <option 
        value=KW>Kuwait</option>
      <option 
        value=LA>Laos</option>
      <option value=LV>Latvia</option>
      <option 
        value=LB>Lebanon</option>
      <option 
        value=LR>Liberia</option>
      <option value=LY>Libya</option>
      <option value=LT>Lithuania</option>
      <option value=LU>Luxembourg</option>
      <option value=MK>Macedonia</option>
      <option value=MG>Madagascar</option>
      <option value=MW>Malawi</option>
      <option value=MY>Malaysia</option>
      <option value=MX>Mexico</option>
      <option 
        value=FM>Micronesia</option>
      <option 
        value=MC>Monaco</option>
      <option value=MN>Mongolia</option>
      <option value=MA>Morocco</option>
      <option value=MM>Myanmar</option>
      <option 
        value=NP>Nepal</option>
      <option value=NL>Netherlands</option>
      <option value=NZ>New Zealand</option>
      <option value=NE>Niger</option>
      <option 
        value=NG>Nigeria</option>
      <option value=KP>North Korea</option>
      <option 
        value=NO>Norway</option>
      <option value=OM>Oman</option>
      <option 
        value=PK>Pakistan</option>
       <option 
        value=PS>Palestinian Territory</option>
      <option value=PA>Panama</option>
      <option value=PG>Papua New Guinea</option>
      <option 
        value=PY>Paraguay</option>
      <option value=PE>Peru</option>
      <option 
        value=PH>Philippines</option>
      <option 
        value=PL>Poland</option>
      <option 
        value=PT>Portugal</option>
      <option 
        value=QA>Qatar</option>
      <option 
        value=RO>Romania</option>
      <option value=RU>Russian Federation</option>
      <option value=RW>Rwanda</option>
      <option value=SH>Saint Helena</option>
       <option 
        value=SA>Saudi Arabia</option>
      <option value=SN>Senegal</option>
     <option value=SG>Singapore</option>
      <option value=SK>Slovakia</option>
      <option value=SI>Slovenia</option>
       <option 
        value=ZA>South Africa</option>
      <option value=KR>South Korea</option>
      <option value=ES>Spain</option>
      <option value=LK>Sri Lanka</option>
      <option value=SD>Sudan</option>
      <option value=SR>Suriname</option>
      <option value=SE>Sweden</option>
      <option value=CH>Switzerland</option>
      <option value=TW>Taiwan</option>
      <option 
        value=TH>Thailand</option>
      <option value=TN>Tunisia</option>
      <option value=TR>Turkey</option>
      <option value=TM>Turkmenistan</option>
       <option value=UG>Uganda</option>
      <option 
        value=UA>Ukraine</option>
      <option value=AE>United Arab Emirates</option>
      <option value=GB>United Kingdom</option>
      <option 
        value=UY>Uruguay</option>
      <option value=UZ>Uzbekistan</option>
      <option value=VE>Venezuela</option>
      <option 
        value=VN>Vietnam</option>
      <option value=WF>Wallis and Futuna Islands</option>
      <option value=YE>Yemen</option>
      <option 
        value=YU>Yugoslavia</option>
      <option value=ZR>Zaire</option>
      <option 
        value=ZM>Zambia</option>
      <option value=ZW>Zimbabwe</option>
    </select>
		</td>
	</tr>

	<tr >
		<td align='right' valign='top'>Sekolah</td>
		<td valign='top'>:</td>
		<td><input  type=text name=sekolah id='sekolah' class='required' title='Sekolah harus diisi' value='' size=40  maxlength='50'></td>
	</tr>
	<tr >
		<td align='right' valign='top'>Telp/HP</td>
		<td valign='top'>:</td>
		<td><input  type=text name=telp id='telp' size=20 value='' class='required' style='width:180; height:20;' title='No Telp harus diisi' maxlength='30' ></td>
	</tr>
	<tr >
		<td align='right' valign='top'>Homepage/Blog</td>
		<td valign='top'>:</td>
		<td>http:// <input  type=text name='blog' size=30 id='blog' value='' maxlength='50'> 
		<br>Tidak menggunakan http://
		<br><input type=checkbox name='stblog' id='stblog' value='on'  > Blog ini mau ditampilkan di Daftar Blog Member  </td>
	</tr>
		<tr >
		<td align='right' valign='top'>Tentang Anda</td>
		<td valign='top'>:</td>
		<td><textarea name='tentang' id='tentang'  cols='40' rows='6'></textarea>
		<br>Seperti : Hobby,Aktivitas,dsb <br></td>
	</tr>
		</tr><tr><td align='right' valign='top'>Anda Setuju ? &nbsp;&nbsp;<input type=checkbox name=setuju id=setuju class='required' title='Persetujuan belum diceklist' ></td><td ></td><td><textarea name='k'   cols='40' rows='6'>Saya sudah membaca dan menyetujui Ketentuan Layanan ini  dan Kebijakan Privasi , dan bersedia berbagi informasi dalam komunitas ini.
Ketentuan pada layanan ini adalah :
1. Tidak boleh memasukan gambar yang mengandung Pornografi dan fornoaksi
2. Tidak boleh memasukan konten yang berbau sara dan politik praktis
3. Tidak boleh mempromosikan kepentingan pribadi
4. Gambar dan konten yang dimasukan menjadi hak milik komunitas sekolah ini.
5. Untuk Siswa tidak boleh mengganti Username dan Nama member.</textarea><br>
Saya juga sudah membaca dan menyetujui Ketentuan tersebut diatas.</td></tr>
	<tr><td align='right' valign='top'>Kode Konfirmasi</td><td ></td><td><img src='../functions/spam.php'  ><br><input type='text' name='code' size='12' id='code' class='required'  ><br><br><input type='submit' id='button2' name='submit' value='Simpan'>&nbsp;</td></tr>	
	</table></form></div></div>	
	<div id="bawah"> www.websekolah.sch.id .Website engine's code is copyright © 2011 Tim Balitbang Depdiknas versi 3.5</div>
	</div>
</div>

</body>
</html>
