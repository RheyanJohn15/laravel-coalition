<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductService extends Controller
{
    public function create(Request $req)
    {
        try {
            Products::create([
                'product_name' => $req->name,
                'quantity'     => $req->quantity,
                'price'        => $req->price,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Product has been successfully created'
            ], 201); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create product',
                'error'   => $e->getMessage(), 
            ], 500); 
        }
    }

    public function update(Request $req)
    {
        try {
            $product = Products::findOrFail($req->id);
            $product->update([
                'product_name' => $req->name,
                'quantity'     => $req->quantity,
                'price'        => $req->price,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
            ], 200); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product',
                'error'   => $e->getMessage(),
            ], 500); 
        }
    }
    
    public function delete($id)
    {
        try {
            $product = Products::findOrFail($id); 
    
            $product->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
            ], 200); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete product',
                'error'   => $e->getMessage(),
            ], 500); 
        }
    }
    
    public function details(Request $req)
    {
        try {
            $product = Products::findOrFail($req->id); 
    
            return response()->json([
                'success' => true,
                'product' => $product,
            ], 200); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'error'   => $e->getMessage(),
            ], 404); 
        }
    }
    
    public function list(Request $req)
    {
        try {
            $products = Products::all(); 
    
            return response()->json([
                'success' => true,
                'products' => $products,
            ], 200); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products',
                'error'   => $e->getMessage(),
            ], 500); 
        }
    }
}
