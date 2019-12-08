<?php
trait Gps
{
    public function activateGps()
    {
        if ($this->activateGps) {
            $this->gpsPrice = ceil($this->minutes / 60) * 15;
            return $this->gpsPrice;
        } else {
        return 0;
        }
    }
}

trait AdditionalDriver
{
    public function addDriver()
   {
        if ($this->addDriver) {
            $this->addDriverPrice = $this->addDriver = 100;
            return $this->addDriverPrice;
        } else {
        return 0;
        }
    }
}

interface iPrice
{
    public function basicPrice();
}

abstract class Tarif implements iPrice
{
    public $perKilometer;
    public $perMinute;
    public $kilometers;
    public $minutes;
    public $youngCoeff;
    public $activateGps;
    public $addDriver;
    public $hours;
    public $days;
    public $isStudent;

    public function __construct($kilometers, $minutes, $age, $activateGps, $addDriver)
    {
        $this->kilometers = $kilometers;
        $this->minutes = $minutes;
        $this->activateGps = $activateGps;
        $this->addDriver = $addDriver;
        $this->hours = ceil($minutes / 60);

        if ($age >= 18 && $age <= 21) {
            $this->youngCoeff = 1.1;
        } elseif ($age >= 22 && $age <= 65) {
            $this->youngCoeff = 1;
        } else {
            echo 'Вы не можете воспользоваться нашими услугами в силу возраста';
            die;
        }

        if ($age >= 18 && $age <= 25) {
            $this->isStudent = true;
        } else {
            $this->isStudent = false;
        }

        if ($minutes <= 30) {
            $this->days = 1;
        } else {
            $pureMinutes = $minutes % 1440;
            $this->days = ($pureMinutes > 30 ? ceil($minutes / 1440) : floor($minutes / 1440));
        }
    }
    abstract public function basicPrice();
}

class BaseTarif extends Tarif
{
    use Gps;

    public $perKilometer = 10;
    public $perMinute = 3;

    public function basicPrice()
    {
        $this->totalPrice = ($this->perKilometer * $this->kilometers + $this->perMinute * $this->minutes) * $this->youngCoeff;
        return $this->totalPrice;
    }
}

class HourlyTarif extends Tarif
{
    use Gps;
    use AdditionalDriver;

    public $perKilometer = 0;
    public $perHour = 200;

    public function basicPrice()
    {
        $this->totalPrice = ($this->perHour * $this->hours) * $this->youngCoeff;
        return $this->totalPrice;
    }
}

class DailyTarif extends Tarif
{
    use Gps;
    use AdditionalDriver;

    public $perKilometer = 1;
    public $perDay = 1000;

    public function basicPrice()
    {
        $this->totalPrice = (($this->perKilometer * $this->kilometers + $this->days * $this->perDay) * $this->youngCoeff);
        return $this->totalPrice;
    }
}

class StudentTarif extends Tarif
{
    use Gps;

    public $perKilometer = 4;
    public $perMinute = 1;

    public function basicPrice()
    {
        if ($this->isStudent) {
            $this->totalPrice = (($this->perKilometer * $this->kilometers + $this->perMinute * $this->minutes) * $this->youngCoeff);
            return $this->totalPrice;
        } else {
            echo 'Вы не студент!';
            die;
        }
    }
}

$BaseTarif = new BaseTarif(10,5,20,1,1);
$totalofBase = $BaseTarif->basicPrice() + $BaseTarif->activateGps();
echo 'Тариф базовый (' . $BaseTarif->kilometers . 'км' . ' * ' . $BaseTarif->perKilometer . 'р' . ' + ' .
    $BaseTarif->minutes . 'мин' . ' * ' . $BaseTarif->perMinute . 'р) * ' . $BaseTarif->youngCoeff . '(молодежн.коеф.) + ' .
    $BaseTarif->activateGps() . 'р (gps) = ' . $totalofBase . ' р;<br><br>' ;

$HourlyTarif = new HourlyTarif(5,61,22,1,1);
$totalHourly = $HourlyTarif->basicPrice() + $HourlyTarif->activateGps() + $HourlyTarif->addDriver();
echo 'Тариф почасовой (' . $HourlyTarif->kilometers . 'км' . ' * ' . $HourlyTarif->perKilometer . 'р' . ' + ' .
    $HourlyTarif->hours . 'ч' . ' * ' . $HourlyTarif->perHour . 'р) * ' . $HourlyTarif->youngCoeff . '(молодежн.коеф.) + ' .
    $HourlyTarif->activateGps() . 'р (gps) + ' . $HourlyTarif->addDriver() . 'р (доп.водитель) = ' . $totalHourly . ' р;<br><br>' ;

$DailyTarif = new DailyTarif(10,1440,60,1,1);
$totalDaily = $DailyTarif->basicPrice() + $DailyTarif->activateGps() + $DailyTarif->addDriver();
echo 'Тариф суточный (' . $DailyTarif->kilometers . 'км' . ' * ' . $DailyTarif->perKilometer . 'р' . ' + ' .
    $DailyTarif->days . 'дней' . ' * ' . $DailyTarif->perDay . 'р) * ' . $DailyTarif->youngCoeff . '(молодежн.коеф.) + ' .
    $DailyTarif->activateGps() . 'р (gps) + ' . $DailyTarif->addDriver() . 'р (доп.водитель) = ' . $totalDaily . ' р;<br><br>' ;

$StudentTarif = new StudentTarif(20,10,25,1,1);
$totalStudent = $StudentTarif->basicPrice() + $StudentTarif->activateGps();
echo 'Тариф студенческий (' . $StudentTarif->kilometers . 'км' . ' * ' . $StudentTarif->perKilometer . 'р' . ' + ' .
    $StudentTarif->minutes . 'мин' . ' * ' . $StudentTarif->perMinute . 'р) * ' . $StudentTarif->youngCoeff . '(молодежн.коеф.) + ' .
    $StudentTarif->activateGps() . 'р (gps) = ' . $totalStudent . ' р;<br><br>' ;