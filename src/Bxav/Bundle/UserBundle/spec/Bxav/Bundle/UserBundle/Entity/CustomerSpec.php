<?php

namespace spec\Bxav\Bundle\UserBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\UserBundle\Entity\Customer');
    }
}
