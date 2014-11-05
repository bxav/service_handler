<?php

namespace spec\Bxav\Component\ResellerClub\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Component\ResellerClub\Model\ResellerClubClient;
use Bxav\Component\ResellerClub\Model\JsonResponse;
use Bxav\Component\ResellerClub\Model\Customer;
use Bxav\Component\ResellerClub\Model\Response;

class DomainRegisterSpec extends ObjectBehavior
{
    protected $client;
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Component\ResellerClub\Model\DomainRegister');
    }
    
    function let(ResellerClubClient $client)
    {
        $this->beConstructedWith($client);
        $this->client = $client;
    }
   
    function it_should_check_the_availability_of_a_domain(JsonResponse $response)
    {
        $domain = "tralala";
        $tld = "email";
        
        $response->offsetGet("$domain.$tld")->willReturn(['status' => 'available']);
        $this->client
             ->get("/domains/available.json", ['domain-name' => $domain, 'tlds' => $tld])
             ->willReturn($response);
        $this->isDomainAvailable($domain, $tld)->shouldReturn(true);
    }

    function it_should_register_a_domain(Customer $customer, Response $response)
    {
        $response->offsetGet('status')->willReturn('Success');
        $this->client->post('/domains/register.json', Argument::type('array'))->willReturn($response);
        
        $this->register("tralala", "email", $customer)->shouldReturn(true);
    }
}
