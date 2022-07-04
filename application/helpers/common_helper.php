<?php


function preview($data){
    echo "<pre>"; print_r($data); exit;
}


function check_admin_login(){
    $ci = &get_instance();
    if(!$ci->session->userdata('is_admin_logged_in')){
        $ci->session->set_flashdata('error', 'you have to log in first!');
        redirect(base_url('admin/login'));
    }
}


function notifications(){
    $ci = &get_instance();
    if($ci->session->flashdata('error')):
        echo "<div class='alert alert-danger'>".$ci->session->flashdata('error') ."</div>";
    endif;
    if($ci->session->flashdata('success')):
        echo "<div class='alert alert-success'>".$ci->session->flashdata('success') ."</div>";
    endif;
}

function ajax_headers(){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header('Access-Control-Allow-Headers: X-Requested-With, Authorization');
}

function exchange_price_curl($amount,$to,$from) {
    $api_key = API_KEY;
    $curl = curl_init();

curl_setopt_array($curl, array(
    
    CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to={$to}&from={$from}&amount={$amount}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: {$api_key}"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
    ));
    
    $response = curl_exec($curl);

    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $res = json_decode($response);
    // preview($res);
    if($res && isset($res->success)) {
       $rslt = [
        'status' => true,
        'amount' => number_format($res->result,2)
       ];
       return $rslt;
    }else if($res && isset($res->error)){
        $rslt = [
            'status' => false,
            'message' => $res->error->message
        ];
        return $rslt;
    }
    
    // echo $response;
}


function ajax_response($status, $data, $message){
    $res = [
        'status' => $status,
        'data' => $data,
        'message' => $message
    ];

    echo json_encode($res);
    exit;
}