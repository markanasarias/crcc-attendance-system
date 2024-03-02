<?php
$data = json_decode(file_get_contents('php://input'), true);

$title = $data['title'];
$date = $data['date'];
$numbers = $data['numbers'];
$users = $data['userNames'];

// Your cURL request code here
$apikey = '89e361e6d8e128399973fe16bfee09c8'; // Your API KEY
$url = 'https://api.semaphore.co/api/v4/messages';

// Iterate over numbers and send messages
foreach ($numbers as $index => $number) {
    $userName = $users[$index];

    $message = "Hello, $userName! This is Calendola Refuge Community Church. We're thrilled to invite you to our $title on $date. Join us for a day filled with joy, music, inspirational messages, and delightful fellowship. It's the perfect opportunity to celebrate the season and strengthen our church community bonds. We can't wait to see you there.";

    $parameters = array(
        'apikey' => $apikey,
        'number' => $number,
        'message' => $message
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    // Show the server response
    echo $output;
}

?>
