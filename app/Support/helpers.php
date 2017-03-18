<?php
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Translate;
use App\Models\Text;
use App\Models\Setting;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;

/*Function for get Setting content*/
if (! function_exists('getSetting')) {
    /**
     * Format text.
     *
     * @param  string  $value
     * @return string
     */
    function getSetting($value){
        $setting = Setting::where('name',$value)->first();
        if(isset($setting->description)){
            $setting_content = $setting->description;
            return $setting_content;
        }
        else{
            return $value;
        }
    }
}