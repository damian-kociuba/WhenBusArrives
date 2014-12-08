<?php

namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;
use Polcode\WhenBusArrivesBundle\Entity\Timetable;
/**
 * Description of TranslateToTimetableType
 *
 * @author dkociuba
 */
class TranslateToTimetableType {
    public static function fromString($stringType) {
        switch($stringType) {
            case 'Dni Robocze': return Timetable::WORK_DAY_TYPE;
            case 'Soboty': return Timetable::SATURDAY_TYPE;
            case 'Niedziele': return Timetable::SUNDAY_TYPE;
            case 'Dni Wolne': return Timetable::FREE_DAY_TYPE;
            case 'Dni Robocze Szkolne': return Timetable::SCHOOL_WORK_DAY_TYPE;
            case 'Dni Robocze w Ferie i Wakacje': return Timetable::HOLIDAYS_WORK_DAY_TYPE;
            case 'Sylwester': return Timetable::NEW_YEARS_EVE;
            case 'Wigilia Bożego Narodzenia': return Timetable::EVE;
            default: throw new \InvalidArgumentException('Unrecognized timetable type: '.$stringType);
        }
    }
}
