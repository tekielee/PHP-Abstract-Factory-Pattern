<?php
class RoundedRectangle {
	function __construct() {}
	
	public function draw(): void {
		echo 'Inside RoundedRectangle::draw() method.<br/>';
	}
}

class RoundedSquare {
	public function __construct() {}
	
	public function draw(): void {
		echo 'Inside RoundedSquare::draw() method.<br/>';
	}
}

class Rectangle {
	function __construct() {}
	
	public function draw(): void {
		echo 'Inside Rectangle::drwa() method.<br/>';
	}
}

class Square {
	function __construct() {}
	
	public function draw(): void {
		echo 'Inside Square::draw() method.<br/>';
	}
}

abstract class AbstractFactory {
	function __construct() {}
	
	abstract public function getShape(string $shapeType): ?object;
}

class ShapeFactory extends AbstractFactory {
	function __construct() {
		parent::__construct();
	}
	
	public function getShape(string $shapeType): ?object {
		if($shapeType == 'RECTANGLE') {
			return new Rectangle();
		} else if ($shapeType == 'SQUARE'){
			return new Square();
		}
		
		return null;
	}
}

class RoundedShapeFactory extends AbstractFactory {
	function __construct() {
		parent::__construct();
	}
	
	public function getShape(string $shapeType): ?object {
		if($shapeType == 'RECTANGLE') {
			return new RoundedRectangle();
		} else if ($shapeType == 'SQUARE'){
			return new RoundedSquare();
		}
		
		return null;
	}
}

class FactoryProducer {
	function __construct() {}
	
	public function getFactory(bool $rounded): object {
		if($rounded) {
			return new RoundedShapeFactory();
		} else {
			return new ShapeFactory();
		}
	}
}

$factoryProducer = new FactoryProducer();
$shapeFactory = $factoryProducer->getFactory(false);
$shapeRectangle = $shapeFactory->getShape('RECTANGLE');
$shapeRectangle->draw();
$shapeSquare = $shapeFactory->getShape('SQUARE');
$shapeSquare->draw();

$roundedShapeFactory = $factoryProducer->getFactory(true);
$roundedRectangle = $roundedShapeFactory->getShape('RECTANGLE');
$roundedRectangle->draw();
$roundedSquare = $roundedShapeFactory->getShape('SQUARE');
$roundedSquare->draw();
?>