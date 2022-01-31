<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    //Запрашиваем все данные для просмотра
    public function index()
    {
        $todolists = Todolist::all();
        return view('home', compact('todolists'));
    }

    //отправляем данные в БД
    public function store (Request $request)
    {
        $data = $request->validate([
            'content'=> 'required'
        ]);

        Todolist::create($data);
        return back();
    }

    //Удаляем данные из БД
    public function destroy (Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
