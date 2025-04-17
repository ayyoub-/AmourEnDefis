$(document).ready(function() {
    // Intercepter la soumission du formulaire
    $('#astro-form').submit(function(event) {
        // Afficher le loader immédiatement après le clic sur le bouton submit
        $('#loader').show();
    });
});