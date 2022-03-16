<?php
session_start();
header("Access-Control-Allow-Origin: *");
include '..config.php'; // DB CONNECTION


//BY DEFAULT HANYA SSO_ID PERLU DIUBAH
//settings-----------------------------------------
$SSO_ID = 108;
$KEY = $_GET['key'];
$SSO_URL = "http://10.2.2.61/auth/$SSO_ID/$KEY";
//-------------------------------------------------


//GET INFORMATION FROM SSO SYSTEM ABOUT CURRENT USER BASE ON KEY GIVEN
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $SSO_URL,
));
if (!curl_exec($curl)) {
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
$resp = curl_exec($curl);
curl_close($curl);
$data = json_decode($resp);

/*
	$data akan return:
		- $data->status
			- return 'ok' or 'error'
		- $data->no_ic 	
		- $data->staff_id
		- $data->email
*/
if ($data->status == 'ok') {
   
/*
	isikan logic code untuk login berdasarkan data yang diperolehi dari sistem sso, iaitu di antara login menggunakan
	$data->no_ic, $data->staff_id, atau $data->email tanpa mengguna password

	contoh:
*/

	$sqlLogin = "select * from user u where staff_id='".$data->staff_id."'";
	$login = mysql_query($sqlLogin);
	$rowLogin = mysql_fetch_array($login)
    $_SESSION['id']=$rowLogin[0];
    $_SESSION['user_login']=$rowLogin[2];
    $_SESSION['user_name']=$rowLogin[1];
    $_SESSION['user_email']=$rowLogin[4];
    $_SESSION['user_notel']=$rowLogin[5];
                      
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=main.php">';
 
}

} else {
    echo "error";
}
?>