<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: DealItem
 *
 * @package Serfhos\Teamleader\Model
 */
class DealItem extends AbstractModel
{

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @var double
     */
    protected $lineTotalExclVat;

    /**
     * @var double
     */
    protected $lineTotalInclVat;

    /**
     * @var string
     */
    protected $vatRate;

    /**
     * @var integer
     */
    protected $account;

    /**
     * @var double
     */
    protected $amount;

    /**
     * @var double
     */
    protected $pricePerUnit;

    /**
     * @var integer
     */
    protected $productId;

    /**
     * Returns the Text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the Text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the Subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets the Subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns the LineTotalExclVat
     *
     * @return float
     */
    public function getLineTotalExclVat()
    {
        return $this->lineTotalExclVat;
    }

    /**
     * Sets the LineTotalExclVat
     *
     * @param float $lineTotalExclVat
     * @return void
     */
    public function setLineTotalExclVat($lineTotalExclVat)
    {
        $this->lineTotalExclVat = (double) $lineTotalExclVat;
    }

    /**
     * Returns the LineTotalInclVat
     *
     * @return float
     */
    public function getLineTotalInclVat()
    {
        return $this->lineTotalInclVat;
    }

    /**
     * Sets the LineTotalInclVat
     *
     * @param float $lineTotalInclVat
     * @return void
     */
    public function setLineTotalInclVat($lineTotalInclVat)
    {
        $this->lineTotalInclVat = (double) $lineTotalInclVat;
    }

    /**
     * Returns the VatRate
     *
     * @return string
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * Sets the VatRate
     *
     * @param string $vatRate
     * @return void
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    }

    /**
     * Returns the Account
     *
     * @return int
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Sets the Account
     *
     * @param int $account
     * @return void
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * Returns the Amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the Amount
     *
     * @param float $amount
     * @return void
     */
    public function setAmount($amount)
    {
        $this->amount = (double) $amount;
    }

    /**
     * Returns the PricePerUnit
     *
     * @return float
     */
    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }

    /**
     * Sets the PricePerUnit
     *
     * @param float $pricePerUnit
     * @return void
     */
    public function setPricePerUnit($pricePerUnit)
    {
        $this->pricePerUnit = (double) $pricePerUnit;
    }

    /**
     * Returns the ProductId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Sets the ProductId
     *
     * @param int $productId
     * @return void
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

}
