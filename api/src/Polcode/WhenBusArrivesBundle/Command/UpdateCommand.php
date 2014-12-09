<?php
namespace Polcode\WhenBusArrivesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\TimeTableLoader;

 /**
  * @author Damian Kociuba
  */
class UpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('polcode:whenBusArrives:update')
            ->setDescription('Update database with arrivals')
        ;
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
 
        try {
            $em = $this->getContainer()->get('doctrine')->getManager();

            $loader = new TimeTableLoader(function($percent) use ($output){
                $output->writeln(round($percent*100) . '%');
            }, $this->getContainer()->get('logger'));
            $loader->loadToDatabase($em);

            $output->writeln('Database is updated');
        } catch(Exception $ex) {
            $output->writeln($ex->getMessage());
            $output->writeln($ex->getFile() .' : '. $ex->getLine());
            $output->writeln($ex->getTraceAsString());
            
        }
    }
}