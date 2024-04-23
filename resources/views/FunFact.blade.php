<form id="funFactForm" action="{{ route('funfacts.store') }}" method="POST">
    @csrf
    <div>
        <label for="text">Texte du Fun Fact :</label>
        <input type="text" id="text" name="text" required>
    </div>
    <div>
        <label for="author">Auteur(e) :</label>
        <input type="text" id="author" name="author" required>
    </div>
    <div>
        <label for="date">Date de création :</label>
        <input type="date" id="date" name="date" required>
    </div>
    <button type="submit">Soumettre</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Attachez une fonction à l'événement submit du formulaire
    $('#funFactForm').submit(function(event) {
        // Empêcher le comportement par défaut du formulaire
        event.preventDefault();

        // Afficher une fenêtre modale avec le message approprié
        alert("Votre FunFact va être soumis à une vérification par un modérateur");

        // Soumettre le formulaire
        this.submit();
    });
</script>
