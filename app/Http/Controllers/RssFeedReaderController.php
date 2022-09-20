<?php

namespace App\Http\Controllers;
use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Http\Request;
use App\Models\RssFeedReader;
use DB;
class RssFeedReaderController extends Controller
{
    public function index()
    {
       
            $data = RssFeedReader::latest()->get();
             
              foreach($data as $feed) {
                $RssFeeds[] = json_decode($feed->publish);
              }   
                 
        return view('feed_reader', ['RssFeeds' =>$RssFeeds]);
    } 
    public function store(Request $request){
      
        // Truncate Previous Recaird As Right now we are just considering on URL
        DB::table('rss_feed_readers')->truncate();
        
        // Read URL
         $feedData = FeedReader::read('http://feeds.bbci.co.uk/news/uk/rss.xml');
         
         foreach ($feedData->get_items(0, $feedData->get_item_quantity()) as $item) {
             $i['title'] = $item->get_title();
             $i['description'] = $item->get_description();
             $i['date'] = $item->get_date();
             $i['source'] = $item->get_source();
             $i['guid'] = $item->get_link();
             $result['items'] = $i;
             $feed['publish'] = json_encode($result['items']);
             RssFeedReader::insert($feed);
         }
        
        return redirect('/feed_reader');
             
         }
}
