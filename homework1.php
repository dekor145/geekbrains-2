<?php

   /* 1 Класс человек, учитель и ученик */

class Human
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello(){
        echo "Привет, меня зовут {$this->name}, мне {$this->age} лет! <br>";
    }
}

class Pupil extends Human
{
    public function learn($predmet){
        echo "Я делаю уроки по предмету: {$predmet}<br>";
    }
}

class  Teacher extends Human
{
    protected $stage;
    protected $predmet;

    public function __construct($name, $age, $predmet , $stage)
    {
        parent::__construct($name, $age);
        $this->stage = $stage;
        $this->predmet = $predmet;
    }


    public function sayHello(){
        parent::sayHello();
        echo "Мой педагогический стаж {$this->stage} лет!<br>";
    }

    public function sayPredmet(){
        echo "Я преподаю {$this->predmet} <br>";
    }

    public function teach(Human $pupil)
    {
        echo "Я учу {$pupil->name} <br>";
    }
}


$pupil = new Pupil('Вовочка', 12);
$pupil->sayHello();
$pupil->learn('Математика');

$teacher = new Teacher('Мария Ивановна', 45, 'Математика', 16);
$teacher->sayHello();
$teacher->sayPredmet();
$teacher->teach($pupil);


/* 2
 echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5

 Не знаю, правильно я понял задание или нет,
но можно переиспользовать уже имеющийся метод where(), ну и если нужно метод getAll()
  */
class Db
{
    // ...

    public function andWhere($field, $value)
    {
        return $this->where($field, $value);
    }
    public function get()
    {
        return $this->getAll();
    }
}
   /* 3. Дан код: */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // Выводит 1
$a2->foo(); // Выводит 2
$a1->foo(); // Выводит 3
$a2->foo(); // Выводит 4
// Переменная $x статическая, следовательно принадлежит самому классу,
// Она увеличивается каждый раз, при вызове метода foo()


/* 4.  */
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // Выводит 1
$b1->foo(); // Выводит 1
$a1->foo(); // Выводит 2
$b1->foo(); // Выводит 2
// Переменная static $x статическая и принадлежит классу, но при наследовании
// у нас получается новый класс, следовательно в классах А и В она своя

/* 5.  */
//class A {
//
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
class B1 extends A {
}
$a1 = new A;
$b1 = new B1;
$a1->foo(); // Выводит 1
$b1->foo(); // Выводит 1
$a1->foo(); // Выводит 2
$b1->foo(); // Выводит 2
// Переменная static $x статическая и принадлежит классу, но при наследовании
// у нас получается новый класс, следовательно в классах А и В она своя
// Разница в создании объектов, они создаются без скобок
// При создании объекта без скобок нет возможности передать параметры в конструктор,
// т. е. если объект не нуждается в начальной инициализации каких либо параметров, то можно писать без скобок
// хотя рекомендуется всегда писать со скобками
