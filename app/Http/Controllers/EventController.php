<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Chamando o Model que criei para pode fazer conexão as views
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
       
        $search = request('search');
        
        # if para mostrar se for uma pesquisar mostrar os especificos, se não mostrar todos os eventos normalmente
        if($search){

            # Lógica de pesquisa 
            $events = Event::where([
                ['title','like','%'.$search.'%'] 
            ])->get(); # Metódo Get para pegar as informações para pesquisa


        }
        else {
            # Está chamando todos os meus eventos do banco de dados
            $events= Event::all();
        }

        

        # Enviando para nossa view \ todos os eventos e o search, caso tenha
        return view('welcome', ['events' => $events, 'search' => $search]);
        }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event;

        # A coluna do banco é preenchida pelo o que o usuário inserir
        $event->title  = $request-> title;
        $event->date = $request-> date;
        $event->city  = $request->city ;
        $event->private  = $request->private ;
        $event->description  = $request->description ;
        $event->items = $request->items ;

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

    public function show($id){

        # Chamando o model Event para encontrar o id fornecido no Front para o funcionamento do método, sendo find or fail
        $event = Event::findOrFail($id);

        # Vai retornar o evento para view
        return view('events.show', ['event' => $event]);
    }

    public function login(){
        return view('events.entrar');
    }

    public function register(){
        return view('events.cadastro');
    }
}
