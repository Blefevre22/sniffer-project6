<html>
<head>
    <meta charset="UTF-8" />
</head>
<body>
<?php
//Création du DOM
$doc = new \DOMDocument('1.0', 'UTF-8');
//Désactive le gestionnaire d'erreurs
$internalErrors = libxml_use_internal_errors(true);
//Récupération de la page dans le DOM
$doc->loadHTMLFile('https://www.rugbyfederal.com/Resultats/index.php?division=D4&poule=1&jour=100&year=2019&ligue=FFR');
//Récupération de l'élément tableau
$table = $doc->getElementById('myTable');
//Boucle sur les enfants (lignes) du tableau
foreach($table->childNodes as $item) {
    //Vérification si la variable contient des enfants
    if ($item->hasChildNodes()) {
        //Récupération des éléments dans le noeud enfant
        $childs = $item->childNodes;
        //Boucle sur les élément du noeud enfant
        foreach($childs as $i) {
            //Conversion au format html
            $value = htmlspecialchars($i->nodeValue);
            //Affichage
            echo $value . "<br />";
        }
    }
}
?>
</body>
</html>
