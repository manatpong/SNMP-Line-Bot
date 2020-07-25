<?php 
$access_token = 'ch94EKV1jijwEIZg2ZU86pxpLawf6YV9q7gsIuLxd5NnkWI9R8weLP4YeV0OLXuLct/RcLwKurOVnqHXD5+GdowetR/VjfJ6o/Hl/tbJJdTCIdY0AEpStG09fbxqXbYSK1Xck1s6W7PwRL92zMgREQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

if (!is_null($events['events'])) {	
    // Loop through each event	
    foreach ($events['events'] as $event) {		
        // Reply only when message sent is in 'text' format		
        // if (($event['type'] == 'message' && $event['message']['type'] == 'text') || $event['type'] == 'follow') {			
            // Get text sent			
            // $text = 'วิวผีบ้าา';			
            // Get replyToken			
            $replyToken = $event['replyToken'];	
            
            $profileDat = getProfile();
            // Build message to reply back			
            $messages = [				
                'type' => 'text',				
                'text' => $profileDat	
            ];			

            replyMsg($replyToken,$messages);
            // Make a POST Request to Messaging API to reply to sender			
            // $url = 'https://api.line.me/v2/bot/message/reply';			
            // $data = [				
            //     'replyToken' => $replyToken,				
            //     'messages' => [$messages],
            //     'stickerPackageId' => 1,
            //     'stickerId' => 1,
            // ];			
            // $post = json_encode($data);			
            // $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);			
            // $ch = curl_init($url);			
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");			
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
            // $result = curl_exec($ch);			
            // curl_close($ch);			
            // echo $result . "";		
        // }	
    }
}

function getProfile() {
    // https://api.line.me/v2/bot/profile/U37f8dafe34f353b80739886cfa2194a1
    global $access_token;
    $url = 'https://api.line.me/v2/bot/profile/U37f8dafe34f353b80739886cfa2194a1';				
    // $post = json_encode($data);			
    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);			
    $ch = curl_init($url);			
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");			
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
    $result = curl_exec($ch);			
    curl_close($ch);	
    return $result;
}

function replyMsg($replyToken, $msg) {
    global $access_token;
    $url = 'https://api.line.me/v2/bot/message/reply';			
    $data = [				
        'replyToken' => $replyToken,				
        'messages' => [$msg],
        'stickerPackageId' => 1,
        'stickerId' => 1,
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
echo "Status OK follow";