<?php
require "Bus.php";
$bus = new Bus(40); // Новий автобус на 40 місць


//Функція імітації поїздки
function drive (Bus $bus, $firstStation, $lastStation){
    $station = $firstStation;
    do {
        echo "<h4>Зупинка №$station</h4>";
        $bus->openDoor();

        if ($station == $lastStation){
            $bus->letOutPassengers($bus->getPassengerCount());
            $bus->closeDoor();
            break;
        } elseif ($station == $firstStation) {
            $bus->letInPassengers(rand(5, 25));
        } else {
            $bus->letOutPassengers(rand(0, $bus->getPassengerCount()));
            $bus->letInPassengers(rand(5, 25));
        }

        $bus->closeDoor();
        $station = ($firstStation < $lastStation) ? ++$station : --$station;

    } while (1);
}

drive ($bus, 1, 5); // Поїздка в прямому напрямку
drive($bus, 5, 1); // Поїздка в зворотньому напрямку