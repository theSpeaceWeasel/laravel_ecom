<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Checkout;
use App\Models\User;

use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
    public function index(){
        $productsTotal=Product::count();
        $ordersTotal=Checkout::count();
        $todayOrders=Checkout::whereDate('created_at', Carbon::now()->format('d-m-Y'))->count();
        $categoriesTotal=Category::count();
        $brandsTotal=Brand::count();
        $usersTotal=User::where('role_as','!=', '1')->count();
        return view('admin.dashboard',compact('productsTotal','ordersTotal','todayOrders','categoriesTotal','brandsTotal','usersTotal'));
    }
}
