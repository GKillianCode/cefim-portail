<?php

namespace App\Tests\UserTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{

    public function getEntity(): User
    {
        return (new User())
            ->setFirstName('Dupont')
            ->setLastName('Jean');
    }

    public function assertHasErrors(User $user, int $number = 0): void
    {
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($user);
        $this->assertCount($number, $error);
    }

    /** @test */
    public function TextValidUser()
    {
        $this->assertHasErrors($this->getEntity(),  0);
    }

    /** @test */
    public function TextInvalidUser()
    {
        $user = $this->getEntity()
                ->setFirstName('Dupont4');
        $this->assertHasErrors($user, 1);
    }

}