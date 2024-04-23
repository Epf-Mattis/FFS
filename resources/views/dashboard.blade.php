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

                    <table class="table">
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
                                            En attente de modération
                                        @elseif($funFact->moderation_status == 'approved')
                                            Approuvé
                                        @else
                                            Rejeté
                                        @endif
                                    </td>
                                    <td>
    @if($funFact->moderation_status == 'pending')
        <form id="approveForm_{{ $funFact->id }}" action="{{ route('funfacts.approve', $funFact->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="button" onclick="approveFunFact({{ $funFact->id }})" class="btn btn-success">Approuver</button>
        </form>
        <form id="rejectForm_{{ $funFact->id }}" action="{{ route('funfacts.reject', $funFact->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="button" onclick="rejectFunFact({{ $funFact->id }})" class="btn btn-danger">Rejeter</button>
        </form>
    @endif
    <form id="editForm_{{ $funFact->id }}" style="display: inline;">
        @csrf
        <button type="button" class="btn btn-primary" onclick="editFunFact({{ $funFact->id }})">Modifier</button>
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

    <script>
        function editFunFact(id) {
        }

        function approveFunFact(id) {
            // Envoyer une requête AJAX pour approuver le Fun Fact
            fetch('{{ url("/funfacts") }}/' + id + '/approve', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Mettre à jour l'interface utilisateur après l'action réussie
                    var approveForm = document.getElementById('approveForm_' + id);
                    approveForm.innerHTML = '<button type="button" class="btn btn-success" disabled>Approuvé</button>';
                } else {
                    console.error('Erreur lors de l\'approbation du Fun Fact');
                }
            })
            .catch(error => {
                console.error('Erreur lors de l\'approbation du Fun Fact :', error);
            });
        }

        function rejectFunFact(id) {
            // Envoyer une requête AJAX pour rejeter le Fun Fact
            fetch('{{ url("/funfacts") }}/' + id + '/reject', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Mettre à jour l'interface utilisateur après l'action réussie
                    var rejectForm = document.getElementById('rejectForm_' + id);
                    rejectForm.innerHTML = '<button type="button" class="btn btn-danger" disabled>Rejeté</button>';
                } else {
                    console.error('Erreur lors du rejet du Fun Fact');
                }
            })
            .catch(error => {
                console.error('Erreur lors du rejet du Fun Fact :', error);
            });
        }
    </script>
</x-app-layout>
