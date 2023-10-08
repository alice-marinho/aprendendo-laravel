@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
        <h1>Algum título</h1>

        @if (10 > 5)
            <p>A condição é true</p>
        @endif

        <p>{{ $nome }}</p>

        @if($nome == "Pedro")
        <p>O nome é Pedro</p>

        @elseif($nome == "Matheus")
        <p>O Nome é {{ $nome }} e ele tem {{ $idade2 }} anos, e trabalha como {{ $profissao }} </p>

        @else
        <p>O nome não é Pedro</p>
        @endif 

        @for($i = 0; $i < count($arr); $i++ )
            <p>{{ $arr[$i]}} - {{$i}}</p>
            @if($i == 2)
            <p>O i é 2</p>
            @endif
        @endfor

        @foreach($nomes as $nome)
            <p>{{$nome}}</p>

        @endforeach

        @php
            $name= "João";
            echo "Rodando em php, $name";
        @endphp

        {{-- Comentário do blade que não aparece para cliente --}}

@endsection