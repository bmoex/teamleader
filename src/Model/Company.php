<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Company
 *
 * @package Serfhos\Teamleader\Model
 */
class Company extends AbstractModel
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $taxCode;

    /**
     * @var string
     */
    protected $businessType;

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
    protected $zipCode;

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
    protected $website;

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
    protected $fax;

    /**
     * @var string
     */
    protected $iban;

    /**
     * @var string
     */
    protected $bic;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var int
     */
    protected $dateAdded;

    /**
     * @var int
     */
    protected $dateEdited;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $vatLiability;

    /**
     * @var string
     */
    protected $paymentTerm;

    /**
     * @var int
     */
    protected $pricelistId;

    /**
     * @var int
     */
    protected $accountManagerId;

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
     * Returns the TaxCode
     *
     * @return string
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * Sets the TaxCode
     *
     * @param string $taxCode
     * @return void
     */
    public function setTaxCode($taxCode)
    {
        $this->taxCode = $taxCode;
    }

    /**
     * Returns the BusinessType
     *
     * @return string
     */
    public function getBusinessType()
    {
        return $this->businessType;
    }

    /**
     * Sets the BusinessType
     *
     * @param string $businessType
     * @return void
     */
    public function setBusinessType($businessType)
    {
        $this->businessType = $businessType;
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
     * Returns the ZipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Sets the ZipCode
     *
     * @param string $zipCode
     * @return void
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
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
     * Returns the DateAdded
     *
     * @return int
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Sets the DateAdded
     *
     * @param int $dateAdded
     * @return void
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    /**
     * Returns the DateEdited
     *
     * @return int
     */
    public function getDateEdited()
    {
        return $this->dateEdited;
    }

    /**
     * Sets the DateEdited
     *
     * @param int $dateEdited
     * @return void
     */
    public function setDateEdited($dateEdited)
    {
        $this->dateEdited = $dateEdited;
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
     * Returns the VatLiability
     *
     * @return string
     */
    public function getVatLiability()
    {
        return $this->vatLiability;
    }

    /**
     * Sets the VatLiability
     *
     * @param string $vatLiability
     * @return void
     */
    public function setVatLiability($vatLiability)
    {
        $this->vatLiability = $vatLiability;
    }

    /**
     * Returns the PaymentTerm
     *
     * @return string
     */
    public function getPaymentTerm()
    {
        return $this->paymentTerm;
    }

    /**
     * Sets the PaymentTerm
     *
     * @param string $paymentTerm
     * @return void
     */
    public function setPaymentTerm($paymentTerm)
    {
        $this->paymentTerm = $paymentTerm;
    }

    /**
     * Returns the PricelistId
     *
     * @return int
     */
    public function getPricelistId()
    {
        return $this->pricelistId;
    }

    /**
     * Sets the PricelistId
     *
     * @param int $pricelistId
     * @return void
     */
    public function setPricelistId($pricelistId)
    {
        $this->pricelistId = $pricelistId;
    }

    /**
     * Returns the AccountManagerId
     *
     * @return int
     */
    public function getAccountManagerId()
    {
        return $this->accountManagerId;
    }

    /**
     * Sets the AccountManagerId
     *
     * @param int $accountManagerId
     * @return void
     */
    public function setAccountManagerId($accountManagerId)
    {
        $this->accountManagerId = $accountManagerId;
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

    /**
     * Add a tag value
     *
     * @param integer $tag
     * @return void
     */
    public function addTag($tag)
    {
        $this->tags[] = $tag;
        $this->tags = array_unique($this->tags);
    }

    /**
     * Remove a tag value
     *
     * @param integer $tag
     * @return void
     */
    public function removeTag($tag)
    {
        $index = array_search($tag, $this->tags);
        if ($index !== false) {
            unset($this->tags[$index]);
        }
    }

}