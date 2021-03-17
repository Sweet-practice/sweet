<?php

namespace app\Library;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shop;

class BaseClass {
    public static function terminaltype(){
      $shop = Shop::find(1);
      $res = array();
      $req = 'https://maps.google.com/maps/api/geocode/xml';
      $req .= '?address='.urlencode($shop['address']);
      $req .= '&sensor=false&key='.config('app.g_map');
      $xml = simplexml_load_file($req) or die('XML parsing error');
      if ($xml->status == 'OK') {
        $location = $xml->result->geometry->location;
        $res['lat'] = (string)$location->lat[0];
        $res['lng'] = (string)$location->lng[0];
      }
      return $res;
    }
}