<?php

namespace Magenteiro\AdminController\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action {
    protected $pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute(){
        return $this->pageFactory->create();
    }

    public function _isAllowed(){
        return $this->_authorization->isAllowed('Magenteiro_AdminController::item');
    }

}
