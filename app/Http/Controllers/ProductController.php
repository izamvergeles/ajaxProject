<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    
    const ITEMS_PER_PAGE = 4;
    const ORDER_BY = 'product.updated_at';
    const ORDER_TYPE = 'desc';

 
    function index(Request $request) {
         return view('main.shop');
    }
    

    function fetchData(Request $request){
          //consulta, ordenación y tipo de ordenación
        $q = $request->input('q', '');
        $orderby = $request->input('orderby', 'product.updated_at');
        $ordertype = $request->input('ordertype', 'desc');
        $order = $request->input('order');

            switch($order){
                case "t1":
                    $orderby = 'product.name';
                    $ordertype = 'asc';
                    break;
                case "t2":
                    $orderby = 'product.name';
                    $ordertype = 'desc';
                    break;
                case "t3":
                    $orderby = 'product.price';
                    $ordertype = 'asc';
                    break;
                case "t4":
                    $orderby = 'product.price';
                    $ordertype = 'desc';
                    break;
                default:
                    $orderby = 'product.updated_at';
                    $ordertype = 'desc';
                    break;
            }
        
        
        //construcción de la consulta
        $product = DB::table('product')
                    ->select('product.*');

        //agregando condición a la consulta, si la hay
        if($q != '') {
            switch ($q){
                case 'men':
                    $product = $product->where('product.genre', 'like',   $q );
                break;
                case 'women':
                    $product = $product->where('product.genre', 'like',  $q );
                break;
                case 'children':
                    $product = $product->where('product.genre', 'like', $q );
                break;
                default:
                    $product = $product->where('product.name', 'like', '%' . $q . '%')
                            ->orWhere('product.id', 'like', '%' . $q . '%')
                            ->orWhere('product.genre', 'like', '%' . $q . '%')
                            ->orWhere('product.price', 'like', '%' . $q . '%');
                break;
            }
        }

        //agregando el orden a la consulta
        // dd($product);
        $product = $product->orderBy($orderby, $ordertype);
        if($orderby != self::ORDER_BY) {
            $product = $product->orderBy(self::ORDER_BY, self::ORDER_TYPE);
        }

        //ejecutar la consulta, usando la paginación
        $products = $product->paginate(self::ITEMS_PER_PAGE)->withQueryString();

        return response()->json([   'q'     => $q,
                                    'url'   => url('product'),
                                    'products' => $products, 
                                    'image'     => asset('storage/images/'),
                                    'csrf' => csrf_token()], 200);
    }
    
    public function show(Product $product)
    {
        return view('main.single', ['product' => $product]);
    }
    
}
