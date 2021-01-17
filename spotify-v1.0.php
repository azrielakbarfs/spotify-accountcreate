<?php

$headers = array();
//$headers[] = 'x-client-id: 9a8d2f0ce77a4e248bb71fefcb557637';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'user-agent: Spotify/8.5.89 Android/28 (Redmi Note 7)
spotify-app-version: 8.5.89';
$headers[] = 'accept-language: id-ID;q=1, en-US;q=0.5';


			echo "=============================\n";
			echo "   Spotify Account Creator  \n";
			echo "         Version 1.0        \n";
			echo "     Author = Bakul.Opak  \n";
			echo "     Created = ExFrozze  \n";
			echo "=============================\n";


//ulang:
//echo "Input Email: ";
//$email = trim(fgets(STDIN));
//echo "Input Password: ";
//$password = trim(fgets(STDIN));
			echo("Mau Bikin Berapa? ");
			$n = trim(fgets(STDIN));
			for ($i=0; $i < $n; $i++) { 
		
	$data = file_get_contents ("https://wirkel.com/data.php?qty=1&domain=twentysevenstore.me");
	$datas = json_decode($data);
	$email = $datas->result[0]->email;
	$password = "@Kediri1221";

##bagian masukan email
##$send = curl ('https://spclient.wg.spotify.com/signup/public/v1/account', '{"email":"'.$email.'"}', $headers);

$send2 = 
curl ('https://spclient.wg.spotify.com:443/signup/public/v1/account/', 'birth_day=10&key=142b583129b2df829de3656f9eb484e6&password_repeat='.$password.'&birth_year=1992&platform=Android-ARM&gender=male&creation_point=client_mobile&password='.$password.'&birth_month=9&email='.$email.'&iagree=true', $headers);

###########################################################FUNGSI SAVE
if (strrpos($send2[1], '"status":1')) {
		echo "[+] Success | ".$email." | ".$password."\n";
		$data = "[+] Success | ".$email." | ".$password."\r\n";
		$fopen = fopen('result_spotify.txt', 'a');
		fwrite($fopen, $data);
		fclose($fopen);
	} else {
		echo "[!] Failed | ".$email." | ".$password."\n";
	}
######################################################################
//echo "Create Again? [y/n]: ";
//$ulang = trim(fgets(STDIN));
//if ($ulang == 'y') goto ulang;
}



function curl($url,$post,$headers,$follow=false,$method=null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			if ($follow == true) curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			if ($method !== null) curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			##if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			if ($post !== null) curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$result = curl_exec($ch);
		$header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		
		preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
		$cookies = array();
		foreach($matches[1] as $item) {
		  parse_str($item, $cookie);
		  $cookies = array_merge($cookies, $cookie);
		}
		return array (
		$header,
		$body,
		$cookies
		);
	}