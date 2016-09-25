<?xml version="1.0" ?>
<page layout="1column" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <body>
    <referenceContainer name="content">
        <block class="{{package_name}}\{{module_name}}\Block\{{section_ucf}}\{{action_ucf}}" name="{{section_lc}}.{{action_lc}}" template="{{package_name}}_{{module_name}}::{{section_ucf}}/{{action_lc}}.phtml"/>
    </referenceContainer>
    </body>
</page