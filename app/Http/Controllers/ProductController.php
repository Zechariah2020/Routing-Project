<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function ShowAllProducts()
    {
        return Product::all();
    }

    function list($id)
    {
        $result = Product::find($id);
        if ($result) {
            return $result;
        } else {
            return "There's no such product in the table.";
        }
    }

    function add(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $result = $product->save();
        if ($result) {
            return "Data has been saved.";
        } else {
            return "Operation failed.";
        }
    }

    function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $result = $product->save();
        if ($result) {
            return "Data has been updated.";
        } else {
            return "Update failed.";
        }
    }

    function delete($id)
    {
        $product = Product::find($id);
        $result = $product->delete();
        if ($result) {
            return "The product with the ID of " . $id . " has been deleted.";
        } else {
            return "Deletion failed.";
        }
    }
}
