Reseller Club Api Bundle
=============


Client for ResellerClub Http Api


Use
---

```php
$client = new ResellerClubClient(
    new \GuzzleHttp\Client(), 
    $apiUrl, 
    $userId, 
    $apiKey
);

// resgister new customer
$customer = new Customer($username);
$customer->setName($name)
         ->setPasswd($pass)
         ->etc();
// ...         
$customerManager = new CustomerManager($client);
$customer = $customerManager->register($customer);


// check domain availability
$domainRegister = new DomainRegister($this->resellerClubClient);
$bool = $domainRegister->isDomainAvailable($domain, $tld);

// resgister new domain
$domainRegister = new DomainRegister($client, $nameserver);
$registrationResponse = $domainRegister->register($domain, $tld, $customer);

```
Check Behat ResellerClubContext for used details



Test
----


Phpspec:
```yaml
#phpspec.yml
suites:
    resellerclub:
        namespace: Bxav\Component\ResellerClub
        spec_path: src/Bxav/Component/ResellerClub
        
```        
 
 
Behat:
```yaml
#behat.yml
    suites:
         
          resellerclub:
              contexts:
                - Bxav\Component\ResellerClub\Behat\ResellerClubContext:
                    apiUrl:   'https://test.httpapi.com/api'
                    userId:   'userId'
                    apiKey:   'apiKey'
                    nameservers:
                      - 'some.mercury.orderbox-dns.com'
                      - 'some.mars.orderbox-dns.com'
              filters:
                tags: "@resellerclub"
                
```

bin/behat --lang=en --suite=resellerclub