<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Php oop - Christian Pucci</title>
  </head>
  <body>

         <!-- GOAL: sulla base dell'esercizio di ieri aggiungere i seguenti vincoli di integrita':
                    - nomi e cognomi devono essere di >3 caratteri
                    - i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
                    - ral employee [10.000;100.000]
                    - non puo' esistere boss senza dipendenti
                    Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->
    <?php

    class Person {
                        private $name;
                        private $lastname;
                        private $dateOfBirth;
                        protected $securyLvl;
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
                          if (strlen($name) <= 3) {
                            $nameError = new nameLength('Name must be more than 3 characters');
                            throw $nameError;
                          }
                            $this -> name = $name;
                        }
                        public function getLastname() {
                            return $this -> lastname;
                        }
                        public function setLastname($lastname) {
                          if (strlen($lastname) <= 3) {
                            $lastNameError = new lastNameLength('Lastname must be more than 3 characters');
                            throw $lastNameError;
                          }
                            $this -> lastname = $lastname;
                        }
                        public function getFullname() {
                            return $this -> getName() . ' ' . $this -> getLastname();
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
                                'name: ' . $this -> getName() . '<br>'
                                . 'lastname: ' . $this -> getLastname() . '<br>'
                                . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
                                . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
                        }
                    }
                    class nameLength extends Exception {}
                    class lastNameLength extends Exception {}
                    class lvlError extends Exception {}
                    class ralRange extends Exception {}
                    class emptyEmplo extends Exception {}

                    class Employee extends Person {
                        protected $ral;
                        private $mainTask;
                        private $idCode;
                        private $dateOfHiring;
                        public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                    $ral, $mainTask, $idCode, $dateOfHiring) {
                            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
                            $this -> setRal($ral);
                            $this -> setMainTask($mainTask);
                            $this -> setIdCode($idCode);
                            $this -> setDateOfHiring($dateOfHiring);
                        }
                        public function getRal() {
                            return $this -> $ral;
                        }
                        public function setRal($ral) {
                          if (($ral < 10000) || ($ral > 100000)) {
                            $ralRange = new ralRange('Employers must earn min 10000 up to 100000');
                            throw $ralRange;
                          }
                            $this -> ral = $ral;
                        }
                        public function getMainTask() {
                            return $this -> $mainTask;
                        }
                        public function setMainTask($mainTask) {
                            $this -> mainTask = $mainTask;
                        }
                        public function getIdCode() {
                            return $this -> $idCode;
                        }
                        public function setIdCode($idCode) {
                            $this -> idCode = $idCode;
                        }
                        public function setSecuryLvl($securyLvl) {
                          if (($securyLvl < 1) || ($securyLvl > 5) ) {

                            $lvlError = new lvlError('Employeers must have level from 1 to 5');
                            throw $lvlError;

                          }
                           $this -> securyLvl = $securyLvl;
                        }

                        public function getDateOfHiring() {
                            return $this -> $dateOfHiring;
                        }
                        public function setDateOfHiring($dateOfHiring) {
                            $this -> dateOfHiring = $dateOfHiring;
                        }
                        public function __toString() {
                            return parent::__toString() . '<br>'
                                . 'ral: ' . $this -> ral . '<br>'
                                . 'mainTask: ' . $this -> mainTask . '<br>'
                                . 'idCode: ' . $this -> idCode . '<br>'
                                . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
                        }
                    }
                    class Boss extends Employee {
                        private $profit;
                        private $vacancy;
                        private $sector;
                        private $employees;
                        public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                    $ral, $mainTask, $idCode, $dateOfHiring,
                                                    $profit, $vacancy, $sector, $employees = []) {
                            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                $ral, $mainTask, $idCode, $dateOfHiring);
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
                          if (empty($employees)) {
                            $emptyEmplo = new emptyEmplo('Boss must have employees');
                            throw $emptyEmplo;
                          }
                            $this -> employees = $employees;
                        }
                        public function setSecuryLvl($securyLvl) {
                          if (($securyLvl < 6) || ($securyLvl > 10) ) {

                            $lvlError = new lvlError('Boss must have level from 6 to 10');
                            throw $lvlError;

                          }
                           $this -> securyLvl = $securyLvl;
                        }
                        public function setRal($ral) {
                          if (($ral < 10000) || ($ral > 100000)) {
                            $ralRange = new ralRange('Boss must earn min 10000 up to 100000');
                            throw $ralRange;
                          }
                            $this -> ral = $ral;
                        }
                        public function __toString() {
                            return parent::__toString() . '<br>'
                                    . 'profit: ' . $this -> getProfit() . '<br>'
                                    . 'vacancy: ' . $this -> getVacancy() . '<br>'
                                    . 'sector: ' . $this -> getSector() . '<br>'
                                    . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
                        }
                        private function getEmpsStr() {
                            $str = '';
                            for ($x=0;$x<count($this -> getEmployees());$x++) {
                                $emp = $this -> getEmployees()[$x];
                                $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                                $str .= ($x + 1) . ': ' . $fullname . '<br>';
                            }
                            return $str;
                        }
                    }
                    try {

                      $p1 = new Person(
                          'Name',
                          'lastname',
                          'dateOfBirth',
                          'securyLvl',
                      );
                      echo '<strong>Person</strong>: <br><br>'. $p1 .'<br>';

                    } catch (nameLength $nameError) {
                      echo 'Error :'. '<br>'
                      .'Name must be more than 3 characters<br><br>';
                    } catch (lastNameLength $lastNameError) {
                      echo 'Error :'. '<br>'
                      .'Lastname must be more than 3 characters<br><br>';
                    }

                    try {

                      $e1 = new Employee(
                          'Name',
                          'lastname',
                          'dateOfBirth',
                          1,
                          10000,
                          'mainTask',
                          'idCode',
                          'dateOfHiring',
                      );
                      echo '<strong>Employee</strong> :<br><br>'. $e1 . "<br>";

                    } catch (nameLength $nameError) {
                      echo 'Error :'. '<br>'
                      .'Name must be more than 3 characters<br><br>';
                    } catch (lastNameLength $lastNameError) {
                      echo 'Error :'. '<br>'
                      .'Lastname must be more than 3 characters<br><br>';
                    } catch (lvlError $lvlError) {
                      echo 'Error: '.'<br>'
                      .'Employeers must have level from 1 to 5<br>';
                    } catch (ralRange $ralRange) {
                      echo 'Error: '.'<br>'
                      .'Employeers must earn min 10000 up to 100000<br>';
                    }

                    try {

                      $b1 = new Boss(
                          'Name',
                          'lastname',
                          'dateOfBirth',
                          6,
                          10000,
                          'mainTask',
                          'idCode',
                          'dateOfHiring',
                          'profit',
                          'vacancy',
                          'sector',
                          [
                              $e1,
                              $e1,
                              $e1,
                              $e1,
                          ]
                     );
                     echo '<strong>Boss:</strong> <br><br>' .  $b1;
                   } catch (nameLength $nameError) {
                     echo 'Error :'. '<br>'
                     .'Name must be more than 3 characters<br><br>';
                   } catch (lastNameLength $lastNameError) {
                     echo 'Error :'. '<br>'
                     .'Lastname must be more than 3 characters<br><br>';
                   }catch (lvlError $lvlError) {
                     echo 'Error :'. '<br>'
                     .'Boss must have level from 6 to 10.<br><br>';
                   } catch (ralRange $ralRange) {
                     echo 'Error: '.'<br>'
                     .'Employeers must earn min 10000 up to 100000<br>';
                   } catch (emptyEmplo $emptyEmplo) {
                     echo 'Error:' . '<br>'
                     .'Boss must have employees<br>';
                   }

    ?>

    <div class="container">

     <div class="box">

       <?php

        ?>

     </div>


    </div>

  </body>
</html>
