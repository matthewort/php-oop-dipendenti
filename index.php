<!-- TODO TODAYGOAL: php-oop-dipendenti
REPO: 
creare 3 classi per rappresentare la seguente realta':
- persona
- dipendente
- boss
cercare inoltre di scegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realtà e decidere le relazione di parantela (chi estende chi);
per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 

        class Persona {
            public $personName;
            public $personLastName;
            public $personBirth;

            public function __construct($personName, $personLastName, $personBirth) {
                $this -> name = $personName;
                $this -> lastname = $personLastName;
                $this -> dateOfBirth = $personBirth;
            }

            public function __toString() {
                return
                    "Person's name: " . $this -> personName
                    . "Person's last name: " . $this -> personLastName
                    . "Person's birth year: " . $this -> personBirth;
            }
        }
        class Dipendente extends Persona {
            public $mansione;
            public $contratto;
            public $location;

            public function __construct($personName, $personLastName, $personBirth, $mansione, $contratto, $location) {

                parent::__construct($personName, $personLastName, $personBirth);
                $this -> mansione = $mansione;
                $this -> contratto = $contratto;
                $this -> location = $location;
            }

        }
        class Boss {

        }

    ?>



</body>
</html>