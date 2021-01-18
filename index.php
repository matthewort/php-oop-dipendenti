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

        class Persona { //TUTTO GIUSTO
            public $name;
            public $lastname;
            public $dateOfBirth;

            public function __construct($name, $lastname, $dateOfBirth) {
                $this -> name = $name;
                $this -> lastname = $lastname;
                $this -> dateOfBirth = $dateOfBirth;
            }

            public function __toString() {
                return
                    "Person's name: " . $this -> name . '<br>'
                    . "Person's last name: " . $this -> lastname . '<br>'
                    . "Person's birth year: " . $this -> dateOfBirth;
            }
        } //TUTTO GIUSTO
        class Dipendente extends Persona {
            public $mansione;
            public $contratto;
            public $location;

            public function __construct($name, $lastname, $dateOfBirth, $mansione, $contratto, $location) {

                parent::__construct($name, $lastname, $dateOfBirth);
                $this -> mansione = $mansione;
                $this -> contratto = $contratto;
                $this -> location = $location;
            }

            public function __toString() {
                return
                    parent::__toString() . '<br>'
                    . "Employee's job: " . $this -> mansione . "<br>"
                    . "Employee's contract: " . $this -> contratto . "<br>"
                    . "Employee's location: " . $this -> location;
            }

        }
        class Boss extends Persona {  //se volessi prendere solo alcuni dati da Dipendente come farei?
            public $posizione;
            public $azienda;
            public $indirizzo;

            public function __construct($name, $lastname, $dateOfBirth, $posizione, $azienda, $indirizzo) {

                parent::__construct($name, $lastname, $dateOfBirth);
                $this -> posizione = $posizione;
                $this -> azienda = $azienda;
                $this -> indirizzo = $indirizzo;
            }

            public function __toString() {
                return
                    parent::__toString() . '<br>'
                    . "Boss' role: " . $this -> posizione . "<br>"
                    . "Company: " . $this -> azienda . "<br>"
                    . "Boss' e-mail: " . $this -> indirizzo;
            }
        }

        $persona = new Persona('Mario', 'Rossi', '1990');
        $dipendente = new Dipendente('Michele', 'Bianchi', '1985', 'Developer', 'Indeterminato', 'Verona');
        $boss = new Dipendente('Davide', 'Azzurri', '1962', 'CEO', 'IBM', 'Milano');

        echo $persona
         . '<br>----<br>' . $dipendente . '<br>----<br>' . $boss;

    ?>



</body>
</html>