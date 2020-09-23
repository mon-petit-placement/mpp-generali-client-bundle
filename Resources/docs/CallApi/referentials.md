For some attribute, you will need specific code that you can get by asking the ReferentialHandler like this:
###Example //TODO revoir pour une section à part
``` php
$allowedCodeOrigin = $this->subscriptionFactory->getReferentialCodes(ReferentialHandler::REFERENTIAL_FUND_ORIGINS);
$allowedDetailCode = $this->subscriptionFactory->getSubReferentialCode(ReferentialHandler::REFERENTIAL_FUND_ORIGINS, $subReferential);
```