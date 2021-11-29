<?php

function status($status) {
    $result = '';
    if ($status == 0) {
        $result = 'Inactive';
    } elseif ($status == 1) {
        $result = 'Active';
    }
    echo $result;
}

function created_by($id) {
    $user = DB::table('users')
            ->where('id', $id)
            ->first();
    $fullName = $user->first_name . ' ' . $user->last_name;
    echo $fullName;
}

function datefunction($date) {
    echo date_format($date, "d-M-Y ");
}

function pickupDate($date) {
    echo date_format(new DateTime($date), "d-M-Y h:i:s A");
}

function checkonline($value) {
    $result = '';
    if ($value == 0) {
        $result = "<i class='fa fa-circle text-danger'></i>";
    } elseif ($value == 1) {
        $result = "<i class='fa fa-circle text-success'></i>";
    }
    echo $result;
}

function time_subtract($datetime1, $datetime2) {
    $datetime1 = strtotime($datetime1);
    $datetime2 = strtotime($datetime2);

    $secs = ($datetime2 + 109) - $datetime1; // == <seconds between the two times>
    $days = $secs / 3600;
    echo round($days, 2);
}

function sendPushNotification($fcm_tokens, $title, $message, $notification_id = NULL) {
    $fcm_server_key = 'AAAAzS92odE:APA91bGdH55NzQ51zqWBtdUeOUuPT6APRnCWtwvZle4w1AWqOYGR7V6Ez9Jq97y1Il4hWAfqGKsGaJv16kRUSTLQPo__cJGTEX7lE7VxbqZjwHuBdrJezRarlAEE9iI80PWPcYHaw0x9';

    $url = "https://fcm.googleapis.com/fcm/send";
    $header = [
        'authorization: key=' . $fcm_server_key,
        'content-type: application/json'
    ];

    $numberOfReceiver = count($fcm_tokens);

    if (count($fcm_tokens) > 1) {
        $post_data = ['notification' => ['body' => $message, 'title' => $title, 'sound' => 'default'], 'priority' => 'high', 'data' => ['click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'notification_id' => $notification_id, 'status' => 'done','collapse_key'=>'881264599505'], 'registration_ids' => $fcm_tokens];
    } else {
        $post_data = ['notification' => ['body' => $message, 'title' => $title, 'sound' => 'default'], 'priority' => 'high', 'data' => ['click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'notification_id' => $notification_id, 'status' => 'done','collapse_key'=>'881264599505'], 'to' => !empty($fcm_tokens[0]) ? $fcm_tokens[0] : ''];
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

    $result = curl_exec($ch);
    
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    $result = json_decode($result, true);
//    $responseData['android'] = [
//        "result" => $result
//    ];
    curl_close($ch);
    return $result;
}

function hello($data) {
    if (is_object($data)) {
       echo "<pre>";
        print_r($data->toArray());
        exit;
    } else if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        exit;
    }else{
        echo "<pre>";
        print_r($data);
        exit;
    }
}

