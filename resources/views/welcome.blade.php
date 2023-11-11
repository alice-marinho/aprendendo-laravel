@extends('layouts.main')

@section('title', 'Conecta Eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="search" name="search" id="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Próximos Eventos</h2>    
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif


    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">

            <!-- adicionando a imagem que o usuário colocou e o titúlo -->
                <img src="/img/events/{{ $event-> image }}" alt="{{ $event-> title}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y'), strtotime($event->date) }}</p>
                    <h5 class="card-title">{{$event-> title}}</h5>
                    <p class="card-participants">X Participantes</p>

                    <!-- Objeto events / Acessando a propriedade id dentro de events no banco -->
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
        @endforeach

        <!-- Mostrando a mensagem caso não tenha nenhum evento cadastrado -->
        @if(count($events)== 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}. <a href="/">Ver todos!</a></p>
        @elseif (count($events)== 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>

@endsection