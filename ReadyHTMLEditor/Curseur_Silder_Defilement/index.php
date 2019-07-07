<form action="index.html" method="post">
    <label for="qualite-sommeil" id="label-qualite-sommeil">
        Êtes-vous satisfait(e) de la qualité de votre sommeil ?
        (nombre entier, de 1 pour "Très insatisfait(e)" à 5 pour "Très satisfait")
    </label>
    <input type="range" id="qualite-sommeil" name="qualite-sommeil" step="1" value="3" min="1" max="5" />
 
    <input type="submit" value="Transmettre les informations" />
</form>