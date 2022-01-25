<?php

namespace App\Services;

class Twitter
{
    private $settings;

    public function __construct()
    {
        $this->settings = array(
            'consumer_key' => "abc",
            'consumer_secret' => "def"
        );
    }

    public function getBio($username)
    {
        $url = "\"https://api.twitter.com/2/tweets/1354143047324299264/liking_users&expansions=pinned_tweet_id&user.fields=created_at&tweet.fields=created_at\"" . " -H " . "\"Authorization: Bearer " . $this->settings['consumer_key'] . "\"";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);
        dd($resp);
        return $resp;
    }
}
