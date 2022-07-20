<?php

function getToken()
{
    try {
$client_id = 'CLIENT_ID';
$redirect_uri = 'HOME';
$client_secret = 'CLIENT_SECRET';
$grant_type='password';
$username='USERNAME';
$password='PASSWORD';
$curl_handle = curl_init();
$ch = curl_init('https://auth.brightidea.com/_oauth2/token');
$post = ['grant_type' => $grant_type,
'client_id' => $client_id,
'client_secret' => $client_secret,
'username' => $username,
'password' => $password];
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $res= curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      
        if ($res) {
            $resp = curl_exec($ch);
            $response_data = json_decode($resp, true);
            curl_close($ch);
   
            if(isset($response_data["access_token"])){
                return $response_data["access_token"];
            }
            return false;
        } else {
            return false;
        }
    }
    catch (Exception $e) {
        $this->logger->error("[{$e->getCode()}] {$e->getMessage()}");
        return false;
    }
}
?>