<?php
// Елементи, які можуть бути відвідані
interface Element {
    public function accept(Visitor $visitor);
}

// Конкретні елементи
class ConcreteElementA implements Element {
    public function accept(Visitor $visitor) {
        $visitor->visitConcreteElementA($this);
    }

    public function operationA() {
        echo "ConcreteElementA operationA<br>";
    }
}

class ConcreteElementB implements Element {
    public function accept(Visitor $visitor) {
        $visitor->visitConcreteElementB($this);
    }

    public function operationB() {
        echo "ConcreteElementB operationB<br>";
    }
}

// Відвідувач
interface Visitor {
    public function visitConcreteElementA(ConcreteElementA $elementA);
    public function visitConcreteElementB(ConcreteElementB $elementB);
}

// Конкретний відвідувач
class ConcreteVisitor implements Visitor {
    public function visitConcreteElementA(ConcreteElementA $elementA) {
        echo "ConcreteVisitor visits ConcreteElementA<br>";
        $elementA->operationA();
    }

    public function visitConcreteElementB(ConcreteElementB $elementB) {
        echo "ConcreteVisitor visits ConcreteElementB<br>";
        $elementB->operationB();
    }
}

// Використання паттерна Відвідувач
$elements = [new ConcreteElementA(), new ConcreteElementB()];
$visitor = new ConcreteVisitor();

foreach ($elements as $element) {
    $element->accept($visitor);
}
