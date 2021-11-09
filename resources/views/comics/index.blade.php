@extends('layouts.main')
@section('title', 'comics list')
    
@section('main-content')

    @if (session('delete'))
    <div class="alert alert-success" role="alert">
        {{session('delete')}} è stato eliminato con successo!
    </div> 
    @endif
    <div class="container">
        <div class="row">
          
            <div class="table-header d-flex align-items-center justify-content-between mb-4"> 
                <h1 class="card-title mb-3">Lista Fumetti</h1>
                <form method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cerca Fumetto" name="search" value={{$search}}>
                        <button class="btn btn-secondary" type="submit">Cerca</button>
                    </div>
                </form> 
                <a href="{{ route("comic.create") }}" class="btn btn-primary ms-2">Inserisci Fumetto</a>
    
            </div>
            @forelse ($comics as $comic)
            <div class="col-12 d-flex ">
                
                <div class="card-item p-5">
                <a href="{{ route('comic.show', $comic->id)}}"><h2>{{$comic->title}}</h2></a>
               <p>Genere: {{$comic->genre}}</p>
               <p >{{$comic->author}}</p>
               <p>Casa Produttrice: {{$comic->publishing_house}}</p>
               
                </div>
               <div class="card-item ">
                <img height="600px" width="500px" class="p-5"  src="{{$comic->image_url}}" alt="{{$comic->title}}">
               </div>
               <div class="card-item align-self-center">

                {{-- DELETE --}}
                <form method="POST" action="{{ route('comic.destroy', $comic)}}" class="delete-form" data-comic-title="{{ $comic->title }}">
                    @csrf
                    @method('DELETE')
                    <button class="far fa-trash-alt btn btn-danger p-3" type="submit"> Elimina</button>
                </form>
                   
               </div>
            </div>
            @empty
                <h1>e vuoto</h1>
            @endforelse 
          
          
            
        </div>
    </div>
@endsection

@section('script-section')
 {{--    <script>
        const deleteFormElements = document.querySelectorAll('.delete-form');
        deleteFormElements.forEach(form => {
            form.addEventListener('submit', function(event){
                event.preventDefault();
                const name = form.getAttribute('data-comic-title');
                const confirm = window.confirm(`Sicuro di voler eliminare ${name} dalla lista dei fumetti?`);
                if (confirm) this.submit();
            })
        });

    </script> --}}
    <script>
        // Catturare, intercettare, l'evento di cancellazione
        // Selezionare il particolare elemento che ha richiesto la cancellazione
        // Alterare il comportamento standard della submit
        // Interagire con l'utente fornendogli una scelta
        // Eseguire un'azione come conseguenza alla sua scelta
        
        // Seleziono tutti i form con classe "delete-form"
        const deleteFormElements = document.querySelectorAll(".delete-form");
        // Eseguo un ciclo foreach su ognuno dei form salvati sopra ^^^
        deleteFormElements.forEach(form => {
            // Per ognuno dei form
            // aggiungo un event listener che resti in attesa dell'evento submit
            form.addEventListener('submit', function(event){
                event.preventDefault();  // intercetta la funzionalità standard e la blocca
                
                // mi prendo e mi salvo il valore name
                
                const name = form.getAttribute("data-comic-title");
                // mi creo una dialog di conferma per accertarmi che l'utente voglia eliminare il dato
                const confirm = window.confirm(`Sei sicura/o di voler eliminare ${name} dalla lista dei fumetti?`);
                //  qualora l'utente confermi la cancellazione chiamerò la submit come predisposta
                //  originalmente dallo sviluppatore.
                if (confirm) this.submit();
            })
        });
    </script>
@endsection