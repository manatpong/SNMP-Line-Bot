<?php 
    $access_token = 'AOoviY4y5C5soMiGpzZHCB5PwJd1phNBCiNd2kFsOsE8cdOu5zrFM4wKGHBDoykrhFFigJe/S1zFJh9ydb7rsLP/BYlDmAe98+YmqmSgMXfyAk4sa8theAEVAqSbKb8Hye/UK4Mrsj8k0WIo7wrSSgdB04t89/1O/w1cDnyilFU=';
    $url = 'https://api.line.me/v1/oauth/verify';
    $headers = array('Authorization: Bearer ' . $access_token);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);curl_close($ch);
    echo $result;