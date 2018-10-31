<?php 
    $access_token = 'FAIQtDdhcZAWWMH6IQHYOwQIrkZVUGZjLbKu3Gq5xWD/qFkyO+rMwQemlXZWJ0WYhFFigJe/S1zFJh9ydb7rsLP/BYlDmAe98+YmqmSgMXfUE/jOSTW0Uo+vbgprQbLbo50J6IgyA4gHcn6zG/qrrgdB04t89/1O/w1cDnyilFU=';
    $url = 'https://api.line.me/v1/oauth/verify';
    $headers = array('Authorization: Bearer ' . $access_token);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);curl_close($ch);
    echo $result;