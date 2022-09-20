<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RssFeedReader;
use Vedmant\FeedReader\Facades\FeedReader;
use DB;

class StoreFeedController extends Controller
{
   
    public function index(Request $request){
      
        // Truncate Previous Recaird As Right now we are just considering on URL
        DB::table('rss_feed_readers')->truncate();
        
        // Read URL
         $feedData = FeedReader::read('http://feeds.bbci.co.uk/news/uk/rss.xml');
         $result = [
             'title' => $feedData->get_title(),
             'description' => $feedData->get_description(),
             'permalink' => $feedData->get_permalink(),
             'guid' => $feedData->get_link(),
             'copyright' => $feedData->get_copyright(),
             'language' => $feedData->get_language(),
             'image_url' => $feedData->get_image_url(),
           
         ];
         foreach ($feedData->get_items(0, $feedData->get_item_quantity()) as $item) {
             $i['title'] = $item->get_title();
             $i['description'] = $item->get_description();
             $i['date'] = $item->get_date();
             $i['source'] = $item->get_source();
             $i['guid'] = $item->get_link();
             $result['items'][] = $i;
             $feed['publish'] = json_encode($result['items']);
             RssFeedReader::insert($feed);
         }
        
        // return redirect('/feed_reader');
             
         }
}
