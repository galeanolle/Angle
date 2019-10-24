<?php

$t = new Time(15,00);

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
        if($this->_minute_degree>0)
            $this->_hour_degree += 30/(360/$this->_minute_degree);
    }
}

?>
