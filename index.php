<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Php oop - Christian Pucci</title>
  </head>
  <body>

         <!-- creare 3 classi per rappresentare la seguente realta':
          - persona
          - dipendente
          - boss
          cercare inoltre di scegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
          per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
          instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->
    <?php

      class Persona {
        private $name;
        private $lastname;
        private $dateOfBirth;
        public function __construct($name, $lastname, $dateOfBirth) {

          $this -> setName($name);
  				$this -> setLastName($lastname);
  				$this -> setDateOfBirth($dateOfBirth);

        }
        public function __toString() {
          return
            'Nome: ' . $this -> getName() . '<br>'
            . 'Cognome: ' . $this -> getLastName() . '<br>'
            . 'Data di nascita: ' . $this -> getDateOfBirth(). '<br>';
        }
        public function getName() {
          return $this -> name;
        }
        public function setName($name) {

          if (gettype($name) == 'string') {
            $this -> name = $name;
          }

        }
        public function getLastName() {
          return $this -> lastname;
        }
        public function setLastName($lastname) {

          if (gettype($lastname) == 'string') {
           $this -> lastname = $lastname;
          }

        }
        public function getDateOfBirth() {
          return $this -> dateOfBirth;
        }
        public function setDateOfBirth($dateOfBirth) {
          $this -> dateOfBirth = $dateOfBirth;
        }

      }

      class Dipendente extends Persona {

        private $id;
        private $ral;
        private $level;

        public function __construct($name,$lastname,$dateOfBirth,$id,$ral,$level){

          parent::__construct($name,$lastname,$dateOfBirth);

          $this -> setId($id);
          $this -> setRal($ral);
          $this -> setLevel($level);

        }
        public function __toString() {
          return parent:: __toString()
                        . 'Codice dipendente: ' . $this -> getId() . '<br>'
                        . 'Reddito annuale lordo: ' . $this -> getRal() . '€<br>'
                        . 'Livello dipendente: ' . $this -> getLevel() . '°<br>';
        }
        public function getId() {
          return $this -> id;
        }
        public function setId($id) {

          if (gettype($id) == 'integer') {
            $this -> id = $id;
          }

        }
        public function getRal() {
          return $this -> ral;
        }
        public function setRal($ral) {
          $this -> ral = $ral;
        }
        public function getLevel() {
          return $this -> level;
        }
        public function setLevel($level) {
          $this -> level = $level;
        }

      }

      class Boss extends Dipendente {

        private $task;

			  public function __construct($name,$lastname,$dateOfBirth,$id,$ral,$level,$task) {

				parent:: __construct($name,$lastname,$dateOfBirth,$id,$ral,$level);

				$this -> setTask($task);

			  }

  			public function __toString() {
  				return parent:: __toString()
  					. 'Responsabile area: ' . $this -> getTask() . '<br>';
  			}

  			public function setTask($task) {

  				if (getType($task) == 'string') {

  					$this -> task = $task;

  				}

  			}

  			public function getTask() {
  				return $this -> task;
  			}

      }

    ?>

    <div class="container">

     <div class="box">

       <?php
          $person = new Persona('Marco','Rossi','1991-30-01');
          echo $person;
        ?>

     </div>
     <div class="box">

       <?php
          $dipendente = new Dipendente('Gianni','Bianchi','1980-05-31',123,30000,6);
          echo $dipendente;
        ?>

     </div>
     <div class="box">

       <?php
         $boss = new Boss('Mauro','Verdi','1970-04-02',12345,45000,9,'Responsabile vendite');
        echo $boss;
        ?>

     </div>

    </div>

  </body>
</html>
