<?php

class ShiftSwapWidget extends HWidget
{

    public $calendarEntry;

    public function run()
    {
        $this->render('shiftswapEntry', array(
            'calendarEntry' => $this->calendarEntry));
    }

}

?>