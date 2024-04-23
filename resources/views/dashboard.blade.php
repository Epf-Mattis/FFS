<x-app-layout>
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Texte</th>
                                    <th>Auteur</th>
                                    <th>Date de création</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($funFacts as $funFact)
                                    <tr>
                                        <td>{{ $funFact->text }}</td>
                                        <td>{{ $funFact->author }}</td>
                                        <td>{{ $funFact->created_at }}</td>
                                        <td>
                                            @if($funFact->moderation_status == 'pending')
                                                <span class="badge bg-warning text-dark">En attente de modération</span>
                                            @elseif($funFact->moderation_status == 'approved')
                                                <span class="badge bg-success">Approuvé</span>
                                            @else
                                                <span class="badge bg-danger">Rejeté</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($funFact->moderation_status == 'pending')
                                                <form id="approveForm_{{ $funFact->id }}" action="{{ route('funfacts.approve', $funFact->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="button" onclick="approveFunFact({{ $funFact->id }})" class="btn btn-sm btn-success">Approuver</button>
                                                </form>
                                                <form id="rejectForm_{{ $funFact->id }}" action="{{ route('funfacts.reject', $funFact->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="button" onclick="rejectFunFact({{ $funFact->id }})" class="btn btn-sm btn-danger">Rejeter</button>
                                                </form>
                                            @endif
                                            <form id="editForm_{{ $funFact->id }}" style="display: inline;">
                                                @csrf
                                                <button type="button" class="btn btn-sm btn-primary" onclick="editFunFact({{ $funFact->id }})">Modifier</button>
                                            </form>
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

    <script>
        function editFunFact(id) {
        }

        function approveFunFact(id) {
            // Code de l'approbation du Fun Fact
        }

        function rejectFunFact(id) {
            // Code du rejet du Fun Fact
        }
    </script>
</x-app-layout>
