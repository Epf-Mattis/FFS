<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Fun Fact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h1 class="text-xl font-semibold mb-4">Fun Fact Details</h1>
                    <p><strong>Text: </strong>{{ $funFact->text }}</p>
                    <p><strong>Author: </strong>{{ $funFact->author }}</p>
                    <p><strong>Date: </strong>{{ $funFact->date }}</p>
                    <p><strong>Status: </strong>
                        @if($funFact->moderation_status == 'pending')
                            En attente de modération
                        @elseif($funFact->moderation_status == 'approved')
                            Approuvé
                        @else
                            Rejeté
                        @endif
                    </p>
                    <form action="{{ route('funfacts.approve', $funFact->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approuver</button>
                    </form>
                    <form action="{{ route('funfacts.reject', $funFact->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Rejeter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
