#WORK IN PROGRESS

# Teamleader
Generic library for Teamleader API

---
## Information
The library is based on the documentation found in http://apidocs.teamleader.be.

## Usage

Set credentials in the credentials (singleton) class;

::

    \Serfhos\Teamleader\Configuration\ApiCredentials::getInstance()
        ->setGroup($group)->setSecret($secret);

Now you can easily use each separate request based on the documentation.

::

    $crmRequest = new \Serfhos\Teamleader\Request\CrmRequest();
    // get the first 100 contacts found
    var_dump($crmRequest->getContacts());
