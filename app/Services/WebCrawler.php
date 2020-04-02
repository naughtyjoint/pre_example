<?php


namespace App\Services;


use App\DailyRecord;
use App\Sign;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class WebCrawler
{
    public function __construct()
    {
    }

    public function fetch () {
        $client = new Client();
        for ($i = 0; $i < 12; $i++) {
            $response = $client->request('GET', "http://astro.click108.com.tw/daily_$i.php?iAstro=$i");
            $body = $response->getBody();
            $stringBody = (string) $body;
            $crawler = new Crawler($stringBody);
            $nodeValues = $crawler->filter('.TODAY_CONTENT p')->each(function (Crawler $node, $i) {
                return $node->text() . '</br>';
            });
            $str = '';
            foreach($nodeValues as $node) {
                $str .= $node;
            };
            $sign = Sign::where('number', $i)->first();
            $record = new DailyRecord(['sign_id' => $i + 1, 'content' => $str, 'date' => Carbon::today()]);
            $sign->dailyRecords()->save($record);
        }
    }

}