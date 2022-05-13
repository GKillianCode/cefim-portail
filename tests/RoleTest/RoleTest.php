<?php

namespace App\Tests\RoleTest;

use App\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RoleTest extends KernelTestCase
{

    public function getEntity(): Role
    {
        return (new Role())
            ->setName('ROLE_USER');
    }

    public function assertHasErrors(Role $Role, int $number = 0): void
    {
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($Role);
        $this->assertCount($number, $error);
    }


    public function TestValidRole(): void
    {
        $Role = $this->getEntity();
        $this->assertHasErrors($Role, 0);
    }

    /** @test */
    public function TestInvalidRole(): void
    {
        $Role = $this->getEntity();
        $Role->setName('ROLE-USER');
        $this->assertHasErrors($Role, 1);
    }



}