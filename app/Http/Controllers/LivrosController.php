<?php
namespace App\Http\Controllers;
use App\Http\Requests\LivrosFormRequest;
use App\Http\Requests\livrosFormRequest as RequestsLivrosFormRequest;
use App\Http\Requests\LivrosFormRequestUpdate;
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

    public function PesquisarPorTituloLivro(LivrosFormRequest $request)
    {
        $Livros =  Livros::where('titulo', 'like', '%' . $request->titulo . '%')->get();
        if (count($Livros) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Livros
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }

    public function RetornarTodosLivros()
        {
            $Livros = Livros::all();
            return response()->json([
                'status' => true,
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

    public function PesquisarPorIdLivro($id)
    {
        $Livros = Livros::find($id);
        if ($Livros == null) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $Livros
        ]);
    }

    public function UpdateLivros(LivrosFormRequestUpdate $request)
    {
        $Livros = Livros::find($request->id);

        if (!isset($Livros)) {
            return response()->json([
                'status' => false,
                'message' => "Livros não encontrado"
            ]);
        }

        if (isset($request->titulo)) {
            $Livros->titulo = $request->titulo;
        }
        if (isset($request->data_lancamento)) {
            $Livros->data_lancamento = $request->data_lancamento;
        }
        if (isset($request->editora)) {
            $Livros->editora = $request->editora;
        }
        if (isset($request->sinopse)) {
            $Livros->sinopse = $request->sinopse;
        }
        if (isset($request->genero)) {
            $Livros->genero = $request->genero;
        }
        if (isset($request->avaliacao)) {
            $Livros->avaliacao = $request->avaliacao;
        }

        $Livros->update();

        return response()->json([
            'status' => false,
            'message' => "Livro atualizado com êxito"
        ]);
    }
}