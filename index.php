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

      class Person {
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
            'name: ' . $this -> getName() . '<br>'
            . 'lastname: ' . $this -> getLastName() . '<br>'
            . 'dateOfBirth: ' . $this -> getDateOfBirth();
        }
        public function getName() {
          return $this -> name;
        }
        public function setName() {
          $this -> name = $name;
        }
        public function getLastName() {
          return $this -> lastname;
        }
        public function setLastName() {
          $this -> lastname = $lastname;
        }
        public function getDateOfBirth() {
          return $this -> dateOfBirth;
        }
        public function setDateOfBirth() {
          $this -> dateOfBirth = $dateOfBirth;
        }

      }

      class Dipendente extends Persona {

        private $id;
        private $ral;
        private $level;

        public function __construct($name,$lastname,$dateOfBirth,$id,$ral,$level){
          parent::__construct($name,$lastname,$dateOfBirth);
        }

      }

    ?>

    <div class="container">

      <?php

        $person = new Person('Pinco','Pallino','1991-30-01');
        echo $person;
      ?>

    </div>

  </body>
</html>
