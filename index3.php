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
    class Person { //PERSON
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

        public function setName($name) {  //se volessi questa condizione solo per uno mi basterebbe specificare nelle altre classi la stessa funzione ma senza la condizione?
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
    } //FINE PERSON

    class Employee extends Person { //EMPLOYEE
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
            if (($ral > 100000) || ($ral < 10000)) {

                throw new RalRange ('only specific range accepted');
                }
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
            
        public function getSecuryLvl() {
            return $this -> securyLvl;
            }

        public function setSecuryLvl($securyLvl) {
            if (($securyLvl > 5) || ($securyLvl < 1)) {
                
                throw new SecurityRange ('only specific range accepted');
                }
                $this -> securyLvl = $securyLvl;
            }    


        public function __toString() {
            return parent::__toString() . '<br>'
                . "ral: " . $this -> ral . '<br>'
                . "mainTask: " . $this -> mainTask . '<br>'
                . "idCode: " . $this -> idCode . '<br>'
                . "dateOfHiring: " . $this -> dateOfHiring . '<br>';
        }   
    } //FINE EMPLOYEE

    class Boss extends Employee {  //BOSS
        private $profit;
        private $vacancy;
        private $sector;
        private $employees;
        
        public function __construct($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring, $profit, $vacancy, $sector, $employees = []) {

            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring);
            $this -> setProfit($profit);
            $this -> setVacancy($vacancy);
            $this -> setSector($sector);
            $this -> setEmployees($employees);
        }

        public function getProfit() {
            return $this -> profit;
            }

        public function setProfit($profit) {
            $this -> profit = $profit;
            }    

        public function getVacancy() {
            return $this -> vacancy;
            }

        public function setVacancy($vacancy) {
            $this -> vacancy = $vacancy;
            }
            
        public function getSector() {
            return $this -> sector;
            }

        public function setSector($sector) {
            $this -> sector = $sector;
            }
            
        public function getEmployees() {
            return $this -> employees;
            }

        public function getSecuryLvl() {
            return $this -> securyLvl;
            }

        public function setSecuryLvl($securyLvl) {
            if (($securyLvl > 10) || ($securyLvl < 6)) {
                
                throw new SecurityRange ('only specific range accepted');
                }
                $this -> securyLvl = $securyLvl;
            }    
        
        public function setEmployees($employees) {
            if ($employees != 'employees') {

                throw new EmployeePresence ('employees must be present');
                }
                $this -> employees = $employees;
            }    

                 
        public function __toString() {
            return parent::__toString() . '<br>'
                . "profit: " . $this -> getProfit() . '<br>'
                . "vacancy: " . $this -> getVacancy() . '<br>'
                . "sector: " . $this -> getSector() . '<br>'
                . "employees: " . $this -> getEmployees() . '<br>';
        }

    }

    class NameChars extends Exception {} //ma "Exception" è integrata nel codice senza che si veda?
    class SecurityRange extends Exception {} 
    class RalRange extends Exception {} 
    class EmployeePresence extends Exception {} 

    try {

        $p1 = new Person(
            'Marco', 
            'Rossi', 
            '01-12-1990', 
            1
        ); 
        echo 'p1:<br>' . $p1 . '<br>----<br><br><br>';
    } catch (NameChars $e) {
        echo "Error: the name must contain more than 3 characters"; //al posto di questo potrebbe starci il getMessage() che si riferisce direttamente a quanto scritto sopra giusto?
    }
    

    try {

        $e1 = new Employee(
            'Giulio', 
            'Bianchi', 
            '03-07-1983', 
            1, 
            18000, 
            'mainTask', 
            'idCode', 
            'dateOfHiring'
        );

        echo 'e1:<br>' . $e1 . '<br>----<br><br><br>';
    } catch (NameChars $e) {
        echo "Error: the name must contain more than 3 characters";
    } catch (SecurityRange $e) {
        echo "Error: the employee's security range must go from 1 to 5";
    } catch (RalRange $e) {
        echo "Error: the employee's ral range must go from 1 to 5";
    }

    
    try {

        $b1 = new Boss(
            'Mario', 
            'Azzurri', 
            '11-11-1964', 
            6, 
            40000, 
            'mainTask', 
            'idCode', 
            'dateOfHiring',
            'profit', 
            'vacancy', 
            'sector', 
            'employees'
        );
    
        echo 'b1:<br>' . $b1 . '<br><br>';
    } catch (NameChars $e) {
        echo "Error: the name must contain more than 3 characters";
    } catch (SecurityRange $e) {
        echo "Error: the employee's security range must go from 1 to 5";
    } catch (RalRange $e) {
        echo "Error: the employee's ral range must go from 1 to 5";
    } catch (EmployeePresence $e) {
        echo "Error: employees must be present";
    }

    
?>


</body>
</html>