<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Libro;

class StockController extends Controller
{
    public function index()
    {
    	$stock_list = Stock::all();
    	return view("stock.index", ["stock_list" => $stock_list]);   	
    }
}