<?php
namespace App\Http\Controllers\Front\Site;

use Illuminate\Http\Request;

use App\Models\Configure\Configure;
use App\Models\Configure\ConfigureItem;

class IndexController extends Controller {
    public function index(Request $request, $company_code) {
    	$configure = Configure::where('slug', $company_code)->first();

    	if ( $configure ) {
    		$configure_items = ConfigureItem::where('configure_id', $configure->id)->get();

    		$configures = [];
    		foreach ( $configure_items as $configure_item ) {
    			$configures[$configure_item->slug] = $configure_item->content;
    		}
    	}

    	$config = config();
    	print_r($config);
    }
}
