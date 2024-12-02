<?php

namespace Magenteiro\TimeNow\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Stdlib\DateTime\TimeZone;

class Index implements HttpGetActionInterface {

    private TimeZone $timezone;
    private Raw $resultFactory;

    public function __construct(Timezone $timezone, Raw $resultFactory)
    {
        $this->timezone = $timezone;
        $this->resultFactory = $resultFactory;
    }

    public function execute(){

        $content = $this->timezone->date()->format('d/m/Y H:i');
        $this->resultFactory->setContents($content);
        return $this->resultFactory;

    }
}
