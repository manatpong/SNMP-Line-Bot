<?php 
$access_token = 'VlNYUtXX+kXZs/pnC6M9Ec6/hzWq3G4ya1m+mPwl3FuzdpOwSUaXS5Uquq+Vjx+qDnLDJP++CZXcHw9I7e7dIIRQxJ9bkWeVG4Oz7Xrp3igW+3+RUcAiWEr6ngqrhSHznf0CIfMwyB5O7BC4LpuIawdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
$id = $arrayJson['events'][0]['source']['userId'];
if (!is_null($events['events'])) {	
    // Loop through each event	
    foreach ($events['events'] as $event) {		
        // Reply only when message sent is in 'text' format		
        if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == 'get_room_id=xenoptics') {			
            // Get text sent			
            $text = $event['message']['text'];			
            // Get replyToken			
            $replyToken = $event['replyToken'];
            // $id = $event['source']['userId'];
            // Build message to reply back			
            $messages = [				
                'type' => 'text',				
                'text' => $id			
            ];			
            // Make a POST Request to Messaging API to reply to sender			
            $url = 'https://api.line.me/v2/bot/message/reply';			
            $data = [				
                'replyToken' => $replyToken,				
                'messages' => [$messages],			
            ];			
            $post = json_encode($data);			
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);			
            $ch = curl_init($url);			
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");			
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
            $result = curl_exec($ch);			
            curl_close($ch);			
            echo $result . "";		
        }	
    }
}
echo "Status OK";