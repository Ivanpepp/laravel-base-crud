@extends('layouts.main')

@section('main-content')
   
   <div class="container">
       <div class="row">
            <form action="{{route('comic.update', $comic)}}" method="POST">

                @csrf
                @method('PATCH')
                    
                    <input type="text" name="title" id="title" placeholder="Titolo" value="{{$comic->title}}">
                    
                    <input type="text" name="genre" id="genre" placeholder="Genere" value="{{$comic->genre}}">
                    
                    <input type="text" name="author" id="author" placeholder="Autore" value="{{$comic->author}}">
                    
                    <input type="text" name="publishing_house" id="publishing_house" placeholder="Casa editrice" value="{{$comic->publishing_house}}">
                    
                    <input type="text" name="description" id="description" placeholder="Descrizione" value="{{$comic->description}}">
                    
                    <input type="text" name="image_url" id="image_url" placeholder="Url immagine" value="{{$comic->image_url}}">
            
                    <button class="btn btn-danger" type="reset">Cancella</button>
                    <button class="btn btn-primary" type="submit">Modifica</button>
            </form>
       </div>
   </div>

@endsection