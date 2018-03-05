<?php

abstract class AbstractLighterFactory{
    protected $resources = [];
    public function addResources($type, $amount){
        if(!isset($this->resources[$type]))
        {
            $this->resources[$type]=0;
        }
        $this->resources[$type] += $amount;
    }
    protected function consumeResource($type, $amount){
        if(!isset($this->resources[$type]))
        {
            $this->resources[$type]=0;
        }
        $this->resources[$type] -= $amount;
    }
    abstract public function buildLighter();
}

class ManualLighterFactory extends AbstractLighterFactory{
    public function buildLighter(){
        if(isset($this->resources['fuel']) && $this->resources['fuel'] > 0 )
        {
        $this->consumeResource('fuel', 1);
        return 'manual lighter constructed';
        } return 'no more fuel left for the manual lighter';
    }
}

class ElectricLighterFactory extends AbstractLighterFactory{
    public function buildLighter(){
        if(isset($this->resources['fuel']) && $this->resources['fuel'] > 0 )
        {
            $this->consumeResource('fuel', 1);
            return 'electric lighter constructed';
        } return 'no more fuel left for the electric lighter';
    }
}

$factory = new ManualLighterFactory();
$factory->addResources('fuel', 10);
echo $factory->buildLighter();

echo "\n";
$factory = new ElectricLighterFactory();
$factory->addResources('fuel', 10);
echo $factory->buildLighter();