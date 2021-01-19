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
    <title>Dipendenti1</title>
</head>
<body>

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
        class Boss extends Employee {
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

            public function setEmployees($employees) {
                $this -> employees = $employees;
                }     

            public function __toString() {
                return parent::__toString() . '<br>'
                    . "profit: " . $this -> getProfit() . '<br>'
                    . "vacancy: " . $this -> getVacancy() . '<br>'
                    . "sector: " . $this -> getSector() . '<br>'
                    . "employees: " . $this -> getEmployees() . '<br>';
            }

            private function getEmpsStr() {

                $str = '';
                for ($x=0; $x < count($this -> getEmployees()); $x++) { 
                    $emp = $this -> getEmployees()[$x];
                    $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                    $str .= ($x + 1) . ': ' . $fullname . '<br>';
                }

                return $str;
            }

        }



        $p1 = new Person(
            'name', 
            'lastname', 
            'dateOfBirth', 
            'securyLvl'
        );

        echo 'p1:<br>' . $p1 . '<br>----<br><br><br>';

        $e1 = new Employee(
            'name', 
            'lastname', 
            'dateOfBirth', 
            'securyLvl', 
            'ral', 
            'mainTask', 
            'idCode', 
            'dateOfHiring'
        );

        echo 'e1:<br>' . $e1 . '<br>----<br><br><br>';

        $b1 = new Boss(
            'name', 
            'lastname', 
            'dateOfBirth', 
            'securyLvl', 
            'ral', 
            'mainTask', 
            'idCode', 
            'dateOfHiring',
            'profit', 
            'vacancy', 
            'sector', 
            [$e1, $e1, $e1, $e1, $e1]
        );
        echo 'b1:<br>' . $b1 . '<br><br>';
    ?> 


</body>
</html>