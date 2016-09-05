<?php

class IntercomClass {
    
    public $_username = 'this-will-be-your-app-id';
    public $_password = 'this-will-be-your-auth-key';

    function callIntercomApi($param, $method = 'POST', $header = NULL) {
        $url = $param["url"];
        $data = $param["data"];
        if (!empty($data)) {
            $data = json_encode($data);
        }

        $objURL = curl_init($url);
        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1);
        if ($method == 'DELETE') {
            curl_setopt($objURL, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else {
            curl_setopt($objURL, CURLOPT_POST, 1);
        }

        curl_setopt($objURL, CURLOPT_POSTFIELDS, $data);
        curl_setopt($objURL, CURLOPT_CONNECTTIMEOUT, 120);
        if ($header != NULL) {
            curl_setopt($objURL, CURLOPT_HTTPHEADER, $header);
        }

        $response = curl_exec($objURL);

        if (curl_errno($objURL)) {
            $info = curl_getinfo($objURL);
            $response = curl_error($objURL);
        }
        curl_close($objURL);
        return $response;
    }
    
    function createUser($dataArr){
        $param['url'] = '';
        $param['data'] = $dataArr;
        $this->callIntercomApi($param, $method, $header);
    }
    
    function deleteUser(){
        
    }
    
    function createEvent(){
        
    }

}

?>