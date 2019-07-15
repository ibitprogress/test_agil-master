<?php


class Bus
{
    protected $capacity;
    protected $passengerCount;

    public function __construct($capacity = 48)
    {
        $this->capacity = $capacity;
        echo "Новий автобус на станції";
    }

    public function openDoor(){
        echo "<p>Двері відкрито</p>";

    }
    public function closeDoor(){
        echo "<p>Двері закрито</p>";
    }

    //Пропустити пасажирів
    public function letInPassengers($count){
        if ($this->passengerCount + $count >= $this->capacity){
            $available = $this->capacity - $this->passengerCount;  //Вільних місць в автобусі
            $this->notTakePassengers($count-$available);
            $this->passengerCount += $available;

            echo "<p>В автобус зайшло $available пасажирів. Кількість пасажирів в автобусі: $this->passengerCount";

        } else {
            $this->passengerCount += $count;
            echo "<p>В автобус зайшло $count пасажирів. Кількість пасажирів в автобусі: $this->passengerCount";
            $this->wait();
        }
    }

    //Випустити пасажирів
    public function letOutPassengers($count){
        $this->passengerCount -= $count;
        echo "<p>З автобусу вийшло $count пасажирів. Кількість пасажирів в автобусі: $this->passengerCount";

    }

    //Не приймати пасажирів
    protected function notTakePassengers($count){
        echo "<p>Автобус <strong>повністю заповнеий</strong>. Не прийнято пасажирів: $count<p> ";
    }

    //Почекати при недостатній заповненості
    protected function wait(){
        echo "<p>Автобус недостатньо заповний. Почекати 1 хвилину";
    }

    //Отримати кількість пасажирів
    public function getPassengerCount(){
        return $this->passengerCount;
    }


}