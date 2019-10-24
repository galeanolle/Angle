<?php

$t = new Time(12,15);

echo "shortAngle: ".$t->shortAngle()."<br>";

echo "longAngle: ".$t->longAngle();

class Time {
     
    private $_hour;
    private $_minute;
    private $_hour_degree;
    private $_minute_degree;
    private $_degrees_per_minute = 360 / 60;
    
    public function __construct($hour, $minute){
        $this->_hour = $hour;
        $this->_minute = $minute;
        $this->calculateDegrees();
    }
    
    public function shortAngle(){
        $result = abs($this->_hour_degree-$this->_minute_degree);
        if($result<=180)
            return $result;
        else
            return 360 - $result;
    }
     
    public function longAngle(){
        $result = abs($this->_hour_degree-$this->_minute_degree);
        if($result<=180)
            return 360 - $result;
        else
            return $result;
    }
    
    private function calculateDegrees(){
        if($this->_hour>12) $this->_hour -= 12;
        if($this->_hour==12)$this->_hour = 0;
        $this->_hour_degree = $this->_hour * 30;
        $this->_minute_degree = $this->_minute * 6;
        if($this->_minute>72 && $this->_minute<=144) $this->_hour_degree += 6;
        if($this->_minute>144 && $this->_minute<=216) $this->_hour_degree += 12;
        if($this->_minute>216 && $this->_minute<=288) $this->_hour_degree += 18;
        if($this->_minute>288 && $this->_minute<=360) $this->_hour_degree += 24;
    }
}


?>
