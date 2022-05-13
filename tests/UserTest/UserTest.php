<?php

namespace App\Tests\UserTest;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{


    public function getEntity(): User
    {
        return (new User())
            ->setFirstName('Jean')
            ->setLastName('Dupont')
            ->setEmail('user@domain.fr')
            ->setPassword('P4ssw&rd');
    }

    public function assertHasErrors(User $user, int $number = 0): void
    {
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($user);
        $this->assertCount($number, $error);
    }

    /** @test */
    public function TestValidUserFirstName()
    {
        $this->assertHasErrors($this->getEntity(),  0);
    }

    /** @test */
    public function TestInvalidUserFirstName()
    {
        $FirstName = $this->getEntity()
                ->setFirstName('Jean4');
        $this->assertHasErrors($FirstName, 1);
    }

    /** @test */
    public function TestValidLastName()
    {
        $this->assertHasErrors($this->getEntity(),  0);
    }

    /** @test */
    public function TestInvalidLastName()
    {
        $LastName = $this->getEntity()
                ->setLastName('Dupont4');
        $this->assertHasErrors($LastName, 1);
    }

    /** @test */
    public function TestValidEmail()
    {
        $this->assertHasErrors($this->getEntity(),  0);
    }

    /** @test */
    public function TestInvalidEmail()
    {
        $email = $this->getEntity()
                ->setEmail('user@domain.f');
        $this->assertHasErrors($email, 1);
    }

    /** @test */
    public function TestValidPassword()
    {
        $this->assertHasErrors($this->getEntity(),  0);
    }

    /** @test */
    public function TestInvalidPassword()
    {
        $password = $this->getEntity()
                ->setPassword('Pkssw&rd');
        $this->assertHasErrors($password, 1);
    }

}