<?php
class APIHelper {

    public function callAPI($endPoint, $method = 'GET', $data = array()) {
        $headers = array(
            'Content-Type: application/json'
        );
        $url = "http://localhost/demo-api/api/" . $endPoint;
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }elseif ($method == 'PUT') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($http_code == 200) {
            return json_decode($response, true);
//            return $url;
        } else {
            return false;
//            return $url;
        }
    }
}

?>
