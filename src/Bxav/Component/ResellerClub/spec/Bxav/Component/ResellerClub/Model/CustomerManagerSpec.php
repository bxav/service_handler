<?php
namespace spec\Bxav\Component\ResellerClub\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Component\ResellerClub\Model\ResellerClubClient;
use Bxav\Component\ResellerClub\Model\Customer;
use Bxav\Component\ResellerClub\Model\Address;
use Bxav\Component\ResellerClub\Model\Phone;

class CustomerManagerSpec extends ObjectBehavior
{

    protected $client;

    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Component\ResellerClub\Model\CustomerManager');
    }

    function let(ResellerClubClient $client)
    {
        $this->beConstructedWith($client);
        $this->client = $client;
    }
    
    function it_should_register_customer(Customer $customer, Address $addr, Phone $phone)
    {
        $customer->getId()->shouldBeCalled();
        $customer->getUsername()->willReturn('superpouetpouet@anal.pain');
        $customer->getPasswd()->willReturn('secret');
        $customer->getName()->willReturn('Superpouetpouet');
        $customer->getCompany()->willReturn('PouetCorp');
        $customer->getAddress()->willReturn($addr);
        $customer->getPhone()->willReturn($phone);
        $customer->getLang()->willReturn('en');        
        $this->client->post('/customers/signup.json', Argument::type('array'))->willReturn(["123456"]);
            
        $customer->setId(123456)->shouldBeCalled();
        $this->client->get('/contacts/default.json', Argument::type('array'))->willReturn([
            'Contact' => [
                'registrant' => '123456',
                'billing' => '123456',
                'admin' => '123456',
                'tech' => '123456'
            ]
        ]);
        $customer->setContacts(Argument::any())->shouldBeCalled();
        
        $this->register($customer)->shouldReturn($customer);
    }
    
    function it_should_delete_customer(Customer $customer)
    {
        $this->client->get('/customers/delete.json', Argument::type('array'))->willReturn([true]);
    
        $this->delete($customer)->shouldReturn(true);
    }
}
