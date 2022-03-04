<?php

namespace App\Seeds;

use App\Entity\Seats;
use Evotodi\SeedBundle\Command\Seed;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use App\Entity\User;

class SeatsSeed extends Seed
{

    protected function configure()
    {
        //The seed won't load if this is not set
        //The resulting command will be {prefix}:mySeed
        $this->setSeedName('Seats');

        parent::configure();
    }

    public function load(InputInterface $input, OutputInterface $output)
    { 

        //Doctrine logging eats a lot of memory, this is a wrapper to disable logging
        $this->disableDoctrineLogging();

        $seats = [
            [
                'number' => 2,
            ],
            [
                'number' => 3,
            ],
            [
                'number' => 4,
            ],
            [
                'number' => 5,
            ],
            [
                'number' => 6,
            ],
            [
                'number' => 7,
            ],
            [
                'number' => 9,
            ],
        ];

        foreach ($seats as $seat){
            $SeatsRepo = new Seats;
            $SeatsRepo->setNumber($seat['number']);
            $this->manager->persist($SeatsRepo);
        }
        $this->manager->flush();
        $this->manager->clear();
        return 0; //Must return an exit code
    }
    
    public function unload(InputInterface $input, OutputInterface $output){
        //Clear the table
        $this->manager->getConnection()->exec('DELETE FROM seat');
        return 0; //Must return an exit code
    }

    public function getOrder(): int 
    {
      return 0; 
    }
    

}