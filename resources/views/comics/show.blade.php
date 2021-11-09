@extends('layouts.main')
@section('tite', $comic->name . 'comic')
    
@section('main-content')
    <div class="container">
        <div class="row">
           
            <div class="col-4">
                <img class="img-fluid" width="100%" src="{{$comic->image_url}}" alt="{{$comic->name}} picture"></img>
            </div>
            <div class="col-8">
                <h2>{{$comic->title}}</h2>
                <p>Genere: {{$comic->genre}}</p>
                <p>Autore: {{$comic->author}}</p>
                <p>Casa Produttrice: {{$comic->publishing_house}}</p>
                <p>Descrizione: {{$comic->description}}</p>
                <a href="{{route('comic.index')}}"><button class="btn btn-primary">BACK TO COMICS</button></a>
                <a href="{{route('comic.edit', $comic->id)}}"><button class="btn btn-danger">Modifica</button></a>
            </div>
        </div>
    </div>
@endsection