<?php

namespace Magenteiro\HideWishList\Helper;

class Data extends \Magento\WishList\Helper\Data
{
    public function isAllow()
    {
        return $this->_isCustomerLogIn() && parent::isAllow();
    }
}
