<?xml version="1.0" ?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
    <router id="standard">
        <route frontName="{{front_name}}" id="{{front_name}}">
            <module name="{{package_name}}_{{module_name}}"/>
        </route>
    </router>
</config>