<?php

/* == ID tài khoản muốn tăng share == */
$user = 'hjhjhjcl';
/* == Token tài khoản chứa page == */
$token = 'EAAAAAYsX7TsBAHKkNKTihVJ3MABmG1Ao51a1rcLLHhKUqrZA2UzLciTqmQVNPQr0d2iW6Ko5yBbfnUJJXVKZBeOTnPTyJi0E7Od6cZADerRj7ZAotoAwY1ZBxSqxl6rSa224lC2Dj6VRP8kmGcl6hJ0HUWt4CBOt187WbHB1QVjSTOjvJFo2dNQuiaVtnNvspYKdZCeQEkSgZDZD';
$accounts = json_decode(cURL('https://graph.facebook.com/me/accounts?access_token=' . $token),true);
$feed = json_decode(cURL('https://graph.facebook.com/' . $user . '/feed?access_token='.$token.'&limit=1'),true);

foreach ($accounts['data'] as $data) {
	//echo $data['access_token'] . '<br/>';
	echo cURL('https://graph.facebook.com/' . $feed['data'][0]['id'] . '/sharedposts?method=post&access_token='.$data['access_token']) . '<br/><br/><br/>';
}

/* == Hàm get == */
function cURL ($url) {
	$data = curl_init();
	curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($data, CURLOPT_URL, $url);
	$hasil = curl_exec($data);
	curl_close($data);
	return $hasil;
}

?>

<meta http-equiv="refresh" content="0"> 