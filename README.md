La méthode magique __get : La méthode __get() de PHP est une méthode magique qui est automatiquement appelée lorsque l'on essaye d'accéder à une propriété inaccessible sur un objet. Il prend un seul argument qui est le nom de la propriété à laquelle accéder.
La méthode __get() est déclenchée lorsqu'on tente d'accéder à une propriété inaccessible dans un objet. Voici les principaux éléments qui déclenchent cette méthode :

Accès à une propriété privée ou protégée : Si une propriété est déclarée comme privée (private) ou protégée (protected), elle ne peut pas être accédée directement depuis l'extérieur de la classe. Lorsqu'on essaie d'accéder à une telle propriété, la méthode __get() est invoquée pour permettre un traitement personnalisé.

Accès à une propriété en lecture seule : Si une propriété est déclarée comme en lecture seule (par exemple, avec seulement un getter sans setter correspondant), la méthode __get() est appelée lorsque l'on tente d'accéder à cette propriété pour récupérer sa valeur.

Accès à une propriété statique : Lorsqu'on essaie d'accéder à une propriété statique d'une classe (c'est-à-dire une propriété qui appartient à la classe elle-même plutôt qu'à une instance spécifique), la méthode __get() peut être invoquée pour gérer cet accès.

Exemple d'utilisation : 

Dans le fichier Manager, on déclare une méthode qui va utiliser cette méthode __get : 

    public function getAll() {
        $query = $this->pdo->prepare("SELECT * FROM shop");
        $query->execute();
        $results = $query->fetchAll();

        $motos = [];

        foreach ($results as $res){
            $motos[] = new Moto($res['id'], $res['brand'],
                $res['model'],
                $res['type'],
                $res['image']);
        }
        return $motos;
    }

----------------

La méthode __set() en PHP est une méthode magique (magic method) qui est automatiquement appelée lorsqu'on tente de définir une valeur pour une propriété inaccessible dans un objet. Elle prend deux arguments : le nom de la propriété et la valeur à lui assigner.

Voici un exemple de code illustrant l'utilisation de __set() :

class setExemple {
    private $propriete;

    public function __set($nomPropriete, $valeur) {
        if ($nomPropriete === 'propriete') {
            $this->propriete = $valeur;
        } else {
            throw new Exception("La propriété '{$nomPropriete}' n'existe pas ou est inaccessible.");
        }
    }
}

$objet = new Exemple();
$objet->propriete = 'Valeur'; // On essaie de définir la propriété

echo $objet->propriete; // On essaie d'accéder à la propriété

---------------------------

__isset : Permet de détecter l’appel de la fonction PHP « isset » ou « empty » sur un attribut inaccessible.

class Exemple {
    private $propriete;

    public function __isset($nomPropriete) {
        if ($nomPropriete === 'propriete') {
            return isset($this->propriete);
        } else {
            return false;
        }
    }
}

$objet = new Exemple();
$objet->propriete = 'Valeur';

var_dump(isset($objet->propriete)); // Vérifie si la propriété existe
var_dump(empty($objet->propriete)); // Vérifie si la propriété est vide

---------------------------

__unset : Permet de détecter l’appel de la fonction PHP « unset » sur un attribut inaccessible
La méthode __unset() en PHP est une méthode magique qui est automatiquement appelée lorsqu'on utilise l'opérateur unset() pour supprimer une propriété inaccessible dans un objet. Elle prend un seul argument, qui est le nom de la propriété à supprimer.

Voici un exemple d'utilisation de __unset() :

class Exemple {
    private $propriete;

    public function __unset($nomPropriete) {
        if ($nomPropriete === 'propriete') {
            unset($this->propriete);
        } else {
            throw new Exception("La propriété '{$nomPropriete}' n'existe pas ou est inaccessible.");
        }
    }
}

$objet = new Exemple();
$objet->propriete = 'Valeur';

unset($objet->propriete); // Supprime la propriété

---------------------------

__construct : Appelé quand on instance un nouvel objet (utilisation du mot clé new)


La méthode __construct() en PHP est une méthode spéciale qui est automatiquement appelée lorsqu'une nouvelle instance d'une classe est créée, c'est-à-dire lorsqu'un nouvel objet est instancié. Elle est utilisée pour initialiser l'objet et effectuer des actions nécessaires avant son utilisation.

Exemple : 

class Exemple {
    private $propriete;

    public function __construct($valeurInitiale) {
        $this->propriete = $valeurInitiale;
        echo "L'objet a été initialisé avec la valeur : " . $this->propriete;
    }
}

$objet = new Exemple('Valeur');

