<?php

namespace {{package_name}}\{{module_name}}\Controller\{{section_ucf}};

class {{action_ucf}} extends \Magento\Framework\App\Action\Action {

	protected $resultPageFactory;

	public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ){
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute(){
        return $this->resultPageFactory->create();
    }
}