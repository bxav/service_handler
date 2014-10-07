Add new controller
==================

Just resgister this 3 services: controller, the soap service provider and the soap service


```yaml

    bxav_service_handler.controller:
        class: Bxav\Bundle\CommonSoapBundle\Controller\SoapController
        arguments: [@bxav_service_handler_api.service_provider]
        
    bxav_service_handler_api.service:
        class: %bxav_service_handler_api.service.class%
        arguments: [@bxav_service_handler.service_provider_chain]
        
    bxav_service_handler_api.service_provider:
        class: Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider
        arguments: [@bxav_service_handler_api.service]
        calls:
            - [setUrlLocation, ["@=service('router').generate('bxav_service_handler_api_manager', [], true)"]]
            - [setWsdlUrl, ["@=service('router').generate('bxav_service_handler_api_manager_wsdl', [], true)"]]
            - [setWsdlPath, ["@=service('kernel').locateResource('@BxavServiceHandlerBundle/Resources/config/service.wsdl')"]]
        
```