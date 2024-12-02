<?php

namespace Magenteiro\TimeNow\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\Stdlib\DateTime\TimeZone;

class Test implements HttpGetActionInterface {

    private TimeZone $timezone;
    private ResultFactory $resultFactory;

    public function __construct(Timezone $timezone, ResultFactory $resultFactory)
    {
        $this->timezone = $timezone;
        $this->resultFactory = $resultFactory;
    }

    public function execute(){
        die('esta classe pertence ao controller test');
        echo($this->timezone->getConfigTimezone() . "<br>");
        echo($this->timezone->convertConfigTimeToUtc($this->timezone->date()) . "<br>");
        // $content = $this->timezone->date()->format('d/m/Y H:i');
        // $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        // $result->setContents($content);
        // return $result;
    }
}
