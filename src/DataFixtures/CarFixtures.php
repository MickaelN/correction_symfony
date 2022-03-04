<?php

namespace App\DataFixtures;

use App\Entity\Cars;
use App\Entity\Seats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $seat = new Seats;
        $seat->setNumber(2);
        $car1 = new Cars();
        $car1->setBrand('Ferrari');
        $car1->setModel('F430');
        $car1->setYear(2004);
        $car1->setEngine('V8');
        $car1->setColor('rouge');
        $car1->setKilometers(rand(10000, 600000));

        $car1->setSeats($seat);
        $manager->persist($car1);
        $car2 = new Cars();
        $car2->setBrand('Alpine');
        $car2->setModel('A110 2S');
        $car2->setYear(2021);
        $car2->setEngine('4 cylindres');
        $car2->setColor('bleu');
        $car2->setKilometers(rand(10000, 600000));

        $car2->setSeats($seat);
        $manager->persist($car2);
        $car3 = new Cars();
        $car3->setBrand('Maserati');
        $car3->setModel('MC20');
        $car3->setYear(2020);
        $car3->setEngine('V6');
        $car3->setColor('blanc');
        $car3->setKilometers(rand(10000, 600000));

        $car3->setSeats($seat);
        $manager->persist($car3);
        $car4 = new Cars();
        $car4->setBrand('Tesla');
        $car4->setModel('Model Y');
        $car4->setYear(2018);
        $car4->setEngine('Electrique');
        $car4->setColor('noir');
        $car4->setKilometers(rand(10000, 600000));

        $car4->setSeats($seat);
        $manager->persist($car4);
        $car5 = new Cars();
        $car5->setBrand('Renault');
        $car5->setModel('Clio');
        $car5->setYear(2008);
        $car5->setEngine('DCI');
        $car5->setColor('vert');
        $car5->setKilometers(rand(10000, 600000));

        $car5->setSeats($seat);
        $manager->persist($car5);

        $manager->flush();
    }
}
