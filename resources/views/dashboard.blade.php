@extends('layouts.app')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
                <h1 class="text-xl font-semibold mb-4">Liste des Fun Facts</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Texte</th>
                                <th class="px-4 py-2">Auteur</th>
                                <th class="px-4 py-2">Date de création</th>
                                <th class="px-4 py-2">Statut</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($funFacts as $funFact)
                                <tr>
                                    <td class="border px-4 py-2">{{ $funFact->text }}</td>
                                    <td class="border px-4 py-2">{{ $funFact->author }}</td>
                                    <td class="border px-4 py-2">{{ $funFact->created_at }}</td>
                                    <td class="border px-4 py-2" id="status_{{ $funFact->id }}">
                                        @if($funFact->moderation_status == 'pending')
                                            <span class="text-orange-500">En attente de modération</span>
                                        @elseif($funFact->moderation_status == 'approved')
                                            <span class="text-green-500">Approuvé</span>
                                        @else
                                            <span class="text-red-500">Rejeté</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if($funFact->moderation_status == 'pending')
                                            <form id="approveForm_{{ $funFact->id }}" action="{{ route('funfacts.approve', $funFact->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Approuver</button>
                                            </form>
                                            <form id="rejectForm_{{ $funFact->id }}" action="{{ route('funfacts.reject', $funFact->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Rejeter</button>
                                            </form>
                                        @endif
                                        @if ($funFact->moderation_status == 'rejected' || $funFact->moderation_status == 'approved' )
                                        <form id="modifyForm_{{ $funFact->id }}" action="{{ route('funfacts.modify', $funFact->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Modifier</button>
                                        </form>
                                       @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
