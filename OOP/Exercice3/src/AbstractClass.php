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
        if(isset($this->resources['fuel']) 
              && $this->resources['fuel'] > 0 )
        {
        $this->consumeResource('fuel', 1);
            return 'manual lighter constructed, hurrrayyyyy';
        } 
            //return 'no more fuel left for the manual lighter, that is bad...';
            throw new Exception('no more fuel left for the decorated manual lighter, that is bad...');
    }
}

class DecoratedManualLighterFactory extends ManualLighterFactory
{
    public function buildLighter()
    {
        return 'Decorated '.parent::buildLighter();
               
    }
}

$factory = new DecoratedManualLighterFactory();
$factory->addResources('fuel', 10);

try{
    echo $factory->BuildLighter();
}catch (Exception $e) {
    echo $e->getMessage();
}
echo "\n";
    
    
    
    
class ElectricLighterFactory extends AbstractLighterFactory{
    public function buildLighter(){
        if(isset($this->resources['fuel']) 
              && $this->resources['fuel'] > 0 )
        {
        $this->consumeResource('fuel', 1);
            return 'electric lighter constructed, hurrrayyyyy';
        }
            return 'no more fuel left for the electric lighter, that is bad...';
    }
}

$factory = new ManualLighterFactory();
$factory->addResources('fuel', 10);
echo $factory->buildLighter();
echo "\n";

$factory = new ElectricLighterFactory();
//$factory->addResources('fuel', 10);
echo $factory->buildLighter();
echo "\n";