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
        switch ($stringType) {
            case 'Dni Robocze':
            case 'Robocze':
                return Timetable::WORK_DAY_TYPE;
            case 'Soboty':
            case 'Sobota':
                return Timetable::SATURDAY_TYPE;
            case 'Niedziele':
            case 'Niedziela':
                return Timetable::SUNDAY_TYPE;
            case 'Dni Wolne':
                return Timetable::FREE_DAY_TYPE;
            case 'Dni Robocze Szkolne':
                return Timetable::SCHOOL_WORK_DAY_TYPE;
            case 'Dni Robocze w Ferie i Wakacje':
                return Timetable::HOLIDAYS_WORK_DAY_TYPE;
            case 'Sylwester':
                return Timetable::NEW_YEARS_EVE_TYPE;
            case 'Wigilia Bożego Narodzenia':
                return Timetable::EVE_TYPE;
            case 'Wszystkich Świętych':
                return Timetable::ALL_SAINTS_DAY_TYPE;
            case 'Niedziele i Święta':
                return Timetable::SUNDAY_AND_HOLY_DAYS_TYPE;
            case 'Robocze szkolne i w ferie'://without summer holidays
                return Timetable::SCHOOL_WORK_DAY_WITH_WINDER_HOLIDAYS_DAY_TYPE;
            case 'Dni robocze w wakacje'://without summer holidays
                return Timetable::WORK_DAY_IN_SUMMER_HOLIDAYS_TYPE;
            case '25 Grudnia oraz Niedziela Wielkanocna':
                return Timetable::DECEMBER_25_AND_EASTER_SUNDAY_TYPE;
            case '25, 26 Grudnia, 1 Stycznia, Święta Wielkanocne (2dni)':
                return Timetable::CHRISTMAS_DWO_DAYS_AND_NEW_YEAR_DAY_AND_EASTER_TWO_DAYS_TYPE;
            case '1 I, 25 XII, Niedziela Wielkanocna':
                return Timetable::DECEMBER_25_AND_EASTER_SUNDAY_AND_NEW_YEAR_TYPE;
            case 'Dni wolne od pracy w centrach handlowych':
                return Timetable::FREE_DAYS_IN_SHOPPING_CENTERS_TYPE;
            case 'Niedziele i Święta poza wolnymi w centrach handlowych':
                return Timetable::SUNDAYS_AND_HOLY_DAYS_WITHOUT_FREE_DAYS_IN_SHOPPING_CENTERS_TYPE;
            case 'Dni wolne poza wolnymi w centrach handlowych':
                return Timetable::FREE_DAYS_WITHOUT_FREE_DAYS_IN_SHOPPING_CENTERS_TYPE;
            case 'Codziennie':
                return Timetable::EVERY_DAY_TYPE;
            case 'Soboty poza wakacjami':
                return Timetable::SATURDAYS_EXCEPT_SUMMER_HOLIDAYS_TYPE;
            case 'Soboty w wakacje':
                return Timetable::SATURDAYS_IN_SUMMER_HOLIDAYS_TYPE;
            case 'Niedziele i Święta poza wakacjami':
                return Timetable::SUNDAY_AND_HOLY_DAYS_EXCEPT_SUMMER_HOLIDAYS_TYPE;
            case 'Niedziele i Święta w wakacje':
                return Timetable::SUNDAY_AND_HOLY_DAYS_IN_SUMMER_HOLIDAYS_TYPE;
            case 'specjalny niedzielny':
                return Timetable::SUNDAY_SPECIAL_TYPE;
            case 'Rozkład specjalny na zmianę czasu.':
                return Timetable::TIME_CHANGE_DAY_TYPE;
            case 'Noc piątek/sobota':
                return Timetable::NIGHT_BETWEEN_FRIDAY_AND_SATURDAY_TYPE;
            case 'Noc sobota/niedziela, niedziela/poniedziałek':
                return Timetable::NIGHT_BETWEEN_SATURDAY_AND_SUNDAY_OR_SUNDAY_MONDAY_TYPE;
            case 'Niedziele w wakacje':
                return Timetable::SUNDAYS_IN_SUMMER_HOLIDAYS_TYPE;
            case 'Noc sobota/niedziela':
                return Timetable::NIGHT_BETWEEN_SATURDAY_AND_SUNDAY_TYPE;
            case 'Poniedziałek':
                return Timetable::MONDAY_TYPE;
            case 'Wtorek':
                return Timetable::TUESDAY_TYPE;
            case 'Środa':
                return Timetable::WEDNESDAY_TYPE;
            case 'Czwartek':
                return Timetable::THURSDAY_TYPE;
            case 'Piątek':
                return Timetable::FRIDAY_TYPE;
            default:
                throw new \InvalidArgumentException('Unrecognized timetable type: ' . $stringType);
        }
    }

}
