<?php
namespace Magenteiro\Sharer\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;

class Sharer extends Template
{
    private StoreManagerInterface $storeManager;

    public function __construct(Template\Context $context, StoreManagerInterface $storeManager)
    {
        $data = [];
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
    }

    public function getCurrentUrl()
    {
        $url = urlencode($this->storeManager->getStore()->getCurrentUrl());
        return $url;
    }
}
