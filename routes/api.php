<?php

use App\Http\Controllers\LivrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('livros/cadastro', [LivrosController::class, 'CadastroLivros']);
Route::get('livros/pesquisar', [LivrosController::class, 'PesquisarPorTituloLivro']);
