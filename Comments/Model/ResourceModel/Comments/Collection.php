<?php

namespace Magenteirto\Comments\Model\ResourceModel\Comments;

use Magenteiro\Comments\Model\Comments as CommentsModel;
use Magenteiro\Comments\Model\ResourceModel\Comments as CommentsResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(CommentsModel::class, CommentsResourceModel::class);
    }
}
