<?php
namespace spec\Bxav\Component\ResellerClub\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;
use Bxav\Component\ResellerClub\Model\XmlResponse;

class ResellerClubClientSpec extends ObjectBehavior
{

    protected $client;

    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Component\ResellerClub\Model\ResellerClubClient');
    }

    function let(Client $client)
    {
        $this->beConstructedWith($client, 'https://test.httpapi.com/api', '007007', 'IbelieveIcanFly');
        $this->client = $client;
    }

    function it_should_make_get_request(ResponseInterface $responce)
    {
        $responce->getHeader("Content-Type")->willReturn('blablajsonblabla');
        $responce->getBody()->willReturn('{}');
        $this->client->get(Argument::any(), Argument::any())
            ->willReturn($responce);
        
        $this->get(Argument::type('string'))
            ->shouldBeAnInstanceOf('Bxav\Component\ResellerClub\Model\JsonResponse');
    }
    
    function it_should_make_post_request(ResponseInterface $responce)
    {
        $responce->getHeader("Content-Type")->willReturn('blablaxmlblabla');
        $responce->getBody()->willReturn('<xml></xml>');
        $this->client->post(Argument::any(), Argument::any())
            ->willReturn($responce);
        $responce->xml()->willReturn(new \SimpleXMLElement('<xml></xml>'));
        
        $this->post(Argument::type('string'))
            ->shouldBeAnInstanceOf('Bxav\Component\ResellerClub\Model\XmlResponse');
    }
}
