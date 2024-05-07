<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivrosFormRequest;
use App\Http\Requests\livrosFormRequest as RequestsLivrosFormRequest;
use App\Models\Livros;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function CadastroLivros(LivrosFormRequest $request)
    {
        $Livros = Livros::create([
            'titulo' => $request -> titulo,
            'autor' => $request ->  autor,
            'data_lancamento' => $request -> data_lancamento,
            'editora' => $request ->  editora,
            'sinopse' => $request ->  sinopse,
            'genero' => $request -> genero,
            'avaliacao' => $request ->  avaliacao,
        ]);
        return response()->json([
            'success' => true,
            'message' => "Livro cadastrado com êxito.",
            'data' => $Livros
        ], 200);
    }

    public function PesquisarPorTituloLivro(Request $request)
    {
        $Livros =  Livros::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($Livros) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Livros
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }

    public function ReadLivro(){
        $Livros = Livros::all();
        if(count($Livros)==0){
            return response()->json([
                'status'=> false,
                'message'=> "Não há registros no sistema."
            ]);
        }
        return response()->json([
            'status'=> true,
            'data' => $Livros
        ]);
    }

    public function VisualizarLivros(){
        $Livros = Livros::all();
        if(count($Livros)==0){
            return response()->json([
                'status'=> false,
                'message'=> "Não há registros no sistema."
            ]);
        }
        return response()->json([
            'status'=> true,
            'data' => $Livros
        ]);
    }

    public function DeletarLivro($id)
    {
        $Livros = Livros::find($id);
        if (!isset($Livros)) {
            return response()->json([
                'status' => false,
                'message' => "Livro não encontrado"
            ]);
        }
        $Livros->delete();
        return response()->json([
            'status' => false,
            'message' => 'Livro excluído com êxito.'
        ]);
    }
}