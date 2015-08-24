<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Contact
 *
 * @package Serfhos\Teamleader\Model
 */
class Contact extends AbstractModel
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $forename;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var string
     */
    protected $gsm;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $website;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $zipcode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var array
     */
    protected $extraAddresses;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var int
     */
    protected $dob;

    /**
     * @var string
     */
    protected $iban;

    /**
     * @var string
     */
    protected $bic;

    /**
     * @var \DateTime
     */
    protected $dateAdded;

    /**
     * @var \DateTime
     */
    protected $dateEdited;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var array
     */
    protected $linkedCompanyIds;

    /**
     * @var array
     */
    protected $tags;

    /**
     * Returns the Name
     *
     * @return string
     */
    public function getName()
    {
        if ($this->name === null) {
            $this->name = trim($this->getForename() . ' ' . $this->getSurname());
        }
        return $this->name;
    }

    /**
     * Sets the Name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the Forename
     *
     * @return string
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * Sets the Forename
     *
     * @param string $forename
     * @return void
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
    }

    /**
     * Returns the Surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Sets the Surname
     *
     * @param string $surname
     * @return void
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * Returns the Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the Email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the Telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the Telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns the Gsm
     *
     * @return string
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Sets the Gsm
     *
     * @param string $gsm
     * @return void
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;
    }

    /**
     * Returns the Fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Sets the Fax
     *
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * Returns the Website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Sets the Website
     *
     * @param string $website
     * @return void
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * Returns the Street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the Street
     *
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Returns the Number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the Number
     *
     * @param string $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Returns the Zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Sets the Zipcode
     *
     * @param string $zipcode
     * @return void
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * Returns the City
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the City
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the Country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the Country
     *
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Returns the ExtraAddresses
     *
     * @return array
     */
    public function getExtraAddresses()
    {
        return $this->extraAddresses;
    }

    /**
     * Sets the ExtraAddresses
     *
     * @param array $extraAddresses
     * @return void
     */
    public function setExtraAddresses(array $extraAddresses)
    {
        $this->extraAddresses = $extraAddresses;
    }

    /**
     * Returns the Language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Sets the Language
     *
     * @param string $language
     * @return void
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Returns the Gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the Gender
     *
     * @param string $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Returns the Dob
     *
     * @return int
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Sets the Dob
     *
     * @param int $dob
     * @return void
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * Returns the Iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Sets the Iban
     *
     * @param string $iban
     * @return void
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * Returns the Bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Sets the Bic
     *
     * @param string $bic
     * @return void
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
    }

    /**
     * Returns the DateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Sets the DateAdded
     *
     * @param \DateTime $dateAdded
     * @return void
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $this->parseDate($dateAdded);
    }

    /**
     * Returns the DateEdited
     *
     * @return \DateTime
     */
    public function getDateEdited()
    {
        return $this->dateEdited;
    }

    /**
     * Sets the DateEdited
     *
     * @param \DateTime $dateEdited
     * @return void
     */
    public function setDateEdited($dateEdited)
    {
        $this->dateEdited = $this->parseDate($dateEdited);
    }

    /**
     * Returns the Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the Status
     *
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the LinkedCompanyIds
     *
     * @return array
     */
    public function getLinkedCompanyIds()
    {
        return $this->linkedCompanyIds;
    }

    /**
     * Sets the LinkedCompanyIds
     *
     * @param array $linkedCompanyIds
     * @return void
     */
    public function setLinkedCompanyIds($linkedCompanyIds)
    {
        if (is_string($linkedCompanyIds)) {
            $linkedCompanyIds = explode(',', $linkedCompanyIds);
        }
        $this->linkedCompanyIds = $linkedCompanyIds;
    }

    /**
     * Returns the Tags
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the Tags
     *
     * @param array $tags
     * @return void
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

}