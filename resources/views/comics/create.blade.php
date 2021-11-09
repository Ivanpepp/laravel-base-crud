@extends('layouts.main')

@section('main-content')
    {{-- noi siamo gia passati dalla create, quindi da qui passiamo il form allo store che celi deve salvare --}}
   <div class="container">
       <div class="row">
        <form action="{{route('comic.store')}}" method="POST">
            @csrf
                <input type="text" name="title" id="title" placeholder="Titolo">
                <input type="text" name="genre" id="genre" placeholder="Genere">
                <input type="text" name="author" id="author" placeholder="Autore">
                <input type="text" name="publishing_house" id="publishing_house" placeholder="Casa editrice">
                <input type="text" name="description" id="description" placeholder="Descrizione">
                <input type="text" name="image_url" id="image_url" placeholder="Url immagine">
        
                <button type="reset">Cancella</button>
                <button type="submit">Inserisci nuovo fumetto</button>
            </form>
       </div>
   </div>

@endsection