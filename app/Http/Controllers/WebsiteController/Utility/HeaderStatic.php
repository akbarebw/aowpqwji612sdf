<?php


namespace App\Http\Controllers\WebsiteController\Utility;


use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\MenuSetting;
use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Support\Facades\View;

class HeaderStatic extends Controller
{
    public function __construct()
    {
        $menu = PageCategory::orderBy('order')->get();

//        $jsonfile    = file_get_contents( 'http://api.openweathermap.org/data/2.5/weather?q=samarinda&units=metric&lang=en&appid=c5cc6cf39f30feac54264674fdc54666' );
//        $jsondata    = json_decode( $jsonfile );

        return View::share(compact('menu'));
    }
}
