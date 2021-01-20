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
                
                throw new OnlyPositiveValueN ('only positive value accepted');
                }
            if (!is_int($name)) {  //non ho ancora capito perché mettere la negazione !

                throw new OnlyIntegerValueN ('only integer value');
                
                }
            $this -> name = $name;
            }    

        public function getLastName() {
            return $this -> lastname;
            }

        public function setLastName($lastname) {
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

    class OnlyPositiveValue extends Exception {}  //ma "Exception" è integrata nel codice senza che si veda?
    class OnlyIntegerValue extends Exception {}
    class OnlyPositiveValueN extends Exception {}  //ma "Exception" è integrata nel codice senza che si veda?
    class OnlyIntegerValueN extends Exception {}

    try {
        $p1 = new Person('string', 'Rossi', 1990, 'high'); 
    } catch (OnlyPositiveValue $opvE) {
        echo "Error: date of birth is not valid! Only positive values are accepted";
    } catch (OnlyIntegerValue $oivE) {
        echo "Error: date of birth is not valid! Only integer values are accepted";
    } catch (OnlyPositiveValueN $e) {
        echo "HA";
    } catch (OnlyIntegerValueN $e) {
        echo "HA";
    }
    
    echo $p1;
?>


</body>
</html>