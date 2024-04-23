@extends('layouts.app')

@section('content')
    <h1>Fun Fact Aléatoire</h1>
    <p>{{ $funFact->text }} - {{ $funFact->author }}</p>
@endsection
