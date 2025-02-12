<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            // Obtém os dados validados
            $validatedData = $request->validated();
    
            // Verifica se a imagem foi enviada
            if ($request->hasFile('image')) {
                // Obtém o arquivo
                $file = $request->file('image');
    
                // Gera um nome único para a imagem
                $imageName = time() . '_' . $file->getClientOriginalName();
    
                // Salva a imagem na pasta 'public/storage/images'
                $path = $file->storeAs('images', $imageName, 'public');
    
                // Adiciona o caminho da imagem nos dados validados
                $validatedData['image'] = '/storage/'.$path; // Caminho correto para acessar a imagem
            } else {
                return response()->json(['message' => 'Imagem não enviada.'], 400);
            }
    
            // Cria o produto
            $product = Product::create($validatedData);
    
            return response()->json([
                'message' => 'Produto criado com sucesso',
                'data'    => new ProductResource($product)
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar o produto',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        try {
            $validatedData = $request->validated();
    
            if ($request->hasFile('image')) {
                // Obtém o arquivo
                $file = $request->file('image');
    
                // Gera um nome único para a imagem
                $imageName = time() . '_' . $file->getClientOriginalName();
    
                // Salva a imagem na pasta 'public/storage/images'
                $path = $file->storeAs('images', $imageName, 'public');
    
                // Adiciona o caminho da imagem nos dados validados
                $validatedData['image'] = '/storage/' . $path; // Caminho correto para acessar a imagem
            }
    
            // Atualiza o produto existente em vez de criar um novo
            $product->update($validatedData);
    
            return response()->json([
                'message' => 'Produto atualizado com sucesso', 
                'data' => new ProductResource($product)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar o produto', 
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json(['message' => 'Product deleted sucessfull!'], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao Excluir o produto', 'error' => $e->getMessage()], 500);
        }
    }
}
