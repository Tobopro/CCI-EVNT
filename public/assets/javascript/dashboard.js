var map = L.map('map').setView([48.583328, 7.75], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez les éléments nécessaires
    var likedCheckbox = document.getElementById('liked');
    var searchInput = document.getElementById('search');

    // Ajoutez un écouteur d'événements au changement de la case à cocher "Favoris"
    likedCheckbox.addEventListener('change', function () {
        // Désactivez ou activez le champ de recherche en fonction de l'état de la case à cocher
        searchInput.disabled = likedCheckbox.checked;
    });
});
