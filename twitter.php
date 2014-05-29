<?php
require_once './libs/twitteroauth/twitteroauth.php';
date_default_timezone_set('Asia/Tokyo');

$consumerKey = $_ENV['TWITTER_CONSUMER_KEY'];
$consumerSecret = $_ENV['TWITTER_CONSUMER_SECRET'];
$accessToken = $_ENV['TWITTER_ACCESS_TOKEN'];
$accessTokenSecret = $_ENV['TWITTER_ACCESS_TOKEN_SECRET'];

$twObj = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$req = $twObj->OAuthRequest('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET', array('user_id' => '974006168', 'count' => '20', 'exclude_replies' => true));
$tweets = json_decode($req);
if (!isset($tweets->errors)) {
  $display = array();
  foreach ($tweets as $tweet) {
    $display[] = array(
      'id' => $tweet->id_str,
      'text' => $tweet->text,
      'datetime' => date('Y-m-d H:i:s', strtotime($tweet->created_at)),
    );
    if (count($display) === 10) {
      echo json_encode($display);
      exit;
    }
  }
} else {
  echo 'failed';
}
