<?php
function sendNotification(){
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields=array(
        "to"=>$_REQUEST['token'],
        "notification"=>array(
            "body"=>$_REQUEST['message'],
            "title"=>$_REQUEST['title'],
            "icon"=>$_REQUEST['icon'],
            "click_action"=>"https://google.com"
        )
    );

    $headers=array(
        'Authorization: key=AAAAMmLqdAY:APA91bH8nGkCURgBbC3uO14vKO57uVAo_MbDZKu-kqU8e6-lUDvHFGdAHzdi1vaINsR5SgjOpY25jxNcWBq2L6vp2sdGzNobvHdxYAhBlY7U79s62NmV_CG11F8D5RgLTdHPG6rvAQJ5',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    print_r($result);
    curl_close($ch);
}
sendNotification();