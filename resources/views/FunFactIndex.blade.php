@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste de tous les FunFacts</h1>
        <ul>
            @foreach($funFacts as $funFact)
                <li>{{ $funFact->text }} - {{ $funFact->author }} ({{ $funFact->date }})</li>
            @endforeach
        </ul>
    </div>
@endsection
