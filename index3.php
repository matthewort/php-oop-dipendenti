<!-- TODO TODAY

REPO: 
php-oop-dipendenti

GOAL: sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
- nomi e cognomi devono essere di >3 caratteri
- i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
- ral employee [10.000;100.000]
- non puo' esistere boss senza dipendenti

Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->

<?php
    class Person { //TUTTO GIUSTO
        private $name;
        private $lastname;
        private $dateOfBirth;
        private $securyLvl;

        public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
            $this -> setName($name);
            $this -> setLastname($lastname);
            $this -> setDateOfBirth($dateOfBirth);
            $this -> setSecuryLvl($securyLvl);
        }

        public function getName() {
            return $this -> name;
            }

        public function setName($name) {
            if (strlen($name) < 3) {
                
                throw new NameChars ('only >3 characters accepted');
                }
           
            $this -> name = $name;
            }    

        public function getLastName() {
            return $this -> lastname;
            }

        public function setLastName($lastname) {
            if (strlen($lastname) < 3) {
                
                throw new NameChars ('only >3 characters accepted');
                }
            $this -> lastname = $lastname;
            }
            
        public function getDateOfBirth() {
            return $this -> dateOfBirth;
            }

        public function setDateOfBirth($dateOfBirth) {
            if ($dateOfBirth <= 0) {
                
                throw new OnlyPositiveValue ('only positive value accepted');
                }
            if (!is_int($dateOfBirth)) {  //non ho ancora capito perché mettere la negazione !

                throw new OnlyIntegerValue ('only integer value');
                
                }
                $this -> dateOfBirth = $dateOfBirth;
            }
            
        public function getSecuryLvl() {
            return $this -> securyLvl;
            }

        public function setSecuryLvl($securyLvl) {
            $this -> securyLvl = $securyLvl;
            }     


        public function __toString() {
            return
                "name: " . $this -> getName() . '<br>'  //non capisco la differenza tra mettere name e getName()
                . "last name: " . $this -> getLastname() . '<br>'
                . "birth year: " . $this -> getDateOfBirth() . '<br>'
                . "security level: " . $this -> getSecuryLvl() . '<br>';
        }
    } //TUTTO GIUSTO

    class Employee extends Person {
        private $ral;
        private $mainTask;
        private $idCode;
        private $dateOfHiring;

        public function __construct($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring) {

            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
            $this -> setRal($ral);
            $this -> setMainTask($mainTask);
            $this -> setIdCode($idCode);
            $this -> setDateOfHiring($dateOfHiring);
        }

        public function getRal() {
            return $this -> ral;
            }

        public function setRal($ral) {
            $this -> ral = $ral;
            }    

        public function getMainTask() {
            return $this -> setMainTask;
            }

        public function setMainTask($mainTask) {
            $this -> mainTask = $mainTask;
            }
            
        public function getIdCode() {
            return $this -> idCode;
            }

        public function setIdCode($idCode) {
            $this -> idCode = $idCode;
            }
            
        public function getDateOfHiring() {
            return $this -> dateOfHiring;
            }

        public function setDateOfHiring($dateOfHiring) {
            $this -> dateOfHiring = $dateOfHiring;
            }     


        public function __toString() {
            return parent::__toString() . '<br>'
                . "ral: " . $this -> ral . '<br>'
                . "mainTask: " . $this -> mainTask . '<br>'
                . "idCode: " . $this -> idCode . '<br>'
                . "dateOfHiring: " . $this -> dateOfHiring . '<br>';
        }
    }

    class OnlyPositiveValue extends Exception {}  //ma "Exception" è integrata nel codice senza che si veda?
    class OnlyIntegerValue extends Exception {}
    class NameChars extends Exception {} 
    class LastNameChars extends Exception {} 

    try {

        $p1 = new Person(
            'string', 
            'Rsso', 
            1990, 
            'high'
        ); 

    } catch (NameChars $e) {
        echo "Error: the name must contain more than 3 characters";
    } 
    
    echo 'p1:<br>' . $p1 . '<br>----<br><br><br>';

    try {

        $e1 = new Employee(
            'name', 
            'lastname', 
            1990, 
            'securyLvl', 
            'ral', 
            'mainTask', 
            'idCode', 
            'dateOfHiring'
        );

    } catch (NameChars $e) {
        echo "Error: the name must contain more than 3 characters";
    } 
    
    echo 'e1:<br>' . $e1 . '<br>----<br><br><br>';
       
   

?>


</body>
</html>