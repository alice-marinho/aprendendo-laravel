<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Chamando o Model que criei para pode fazer conexão as views
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
       
        # Está chamando todos os meus eventos do banco de dados
        $events= Event::all();

        # Enviando para nossa view \ todos os eventos 
        return view('welcome', ['events' => $events]);
        }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event;

        $event->title  = $request-> title;
        $event->city  = $request->city ;
        $event->private  = $request->private ;
        $event->description  = $request->description ;


        $event->save();

        return redirect('/');
    }

    public function login(){
        return view('events.entrar');
    }

    public function register(){
        return view('events.cadastro');
    }
}
