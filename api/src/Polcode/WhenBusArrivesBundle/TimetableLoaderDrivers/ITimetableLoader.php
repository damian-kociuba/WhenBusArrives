<?php
namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers;
/**
 *
 * @author Damian Kociuba
 */
interface ITimetableLoader {
    public function loadToDatabase($doctrine);
}
