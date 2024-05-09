<?php

use App\Http\Controllers\LivrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Cadastrar livros
Route::post('livros/cadastro', [LivrosController::class, 'CadastroLivros']);

// Pesquisar título de livros
Route::post('livros/pesquisar', [LivrosController::class, 'PesquisarPorTituloLivro']);

// Retornar livros
Route::get('livros/retornar', [LivrosController::class, 'RetornarTodosLivros']);

// Deletar livros
Route::delete('livros/delete/{id}', [LivrosController::class, 'DeletarLivro']);

// Pesquisar id de livros
Route::get('livros/pesquisar/{id}', [LivrosController::class, 'PesquisarPorIdLivro']);

// Atualizar livros
Route::put('livros/atualizar', [LivrosController::class, 'UpdateLivros']);