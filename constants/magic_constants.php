<?php
namespace ExampleNamespace;
class ExampleClass {
    public function getClassName(){
        return __CLASS__;
    }

    public function oneExampleMethod(){
        return  __METHOD__;
    }

    public function getNamespace(){
        return __NAMESPACE__;
    }
}

$obj = new ExampleClass();
echo "Class name: ". $obj->getClassName() . "\n";
echo "Method name: " . $obj->oneExampleMethod() . "\n";
echo "Namespace: " . $obj->getNamespace() . "\n";