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

        # Image Upload

        if($request-> hasFile('image') && $request-> file('image')-> isValid()){
            
            $requestImage = $request->image;
            $extension= $requestImage-> extension();

            # Nome do path do banco
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            # Fazendo upload na pasta events dentro de public + o nome novo
            $request->image->move(public_path('img/events'), $imageName);

            # Alterando a propriedade image do objeto para o novo nome
            $event->image = $imageName;

        }

        $event->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');
    }

    public function login(){
        return view('events.entrar');
    }

    public function register(){
        return view('events.cadastro');
    }
}
