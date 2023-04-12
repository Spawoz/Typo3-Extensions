<?php

declare(strict_types=1);

namespace SPT\SptStorelocator\Domain\Model;


/**
 * This file is part of the "Store Locator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Arun Chandran
 */

/**
 * Storelocator
 */
class Storelocator extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * titel
     *
     * @var string
     */
    protected $titel = '';

    /**
     * vorschautext
     *
     * @var string
     */
    protected $vorschautext = '';

    /**
     * bild
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $bild = null;

    /**
     * kategorie
     *
     * @var string
     */
    protected $kategorie = '';

    /**
     * adresse
     *
     * @var string
     */
    protected $adresse = '';

    /**
     * geokoordinaten
     *
     * @var string
     */
    protected $geokoordinaten = '';

    /**
     * moreinfo
     *
     * @var string
     */
    protected $moreinfo = '';

    /**
     * latitude
     *
     * @var string
     */
    protected $latitude = '';

    /**
     * longitude
     *
     * @var string
     */
    protected $longitude = '';

    /**
     * Returns the titel
     *
     * @return string
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Sets the titel
     *
     * @param string $titel
     * @return void
     */
    public function setTitel(string $titel)
    {
        $this->titel = $titel;
    }

    /**
     * Returns the vorschautext
     *
     * @return string
     */
    public function getVorschautext()
    {
        return $this->vorschautext;
    }

    /**
     * Sets the vorschautext
     *
     * @param string $vorschautext
     * @return void
     */
    public function setVorschautext(string $vorschautext)
    {
        $this->vorschautext = $vorschautext;
    }

    /**
     * Returns the bild
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getBild()
    {
        return $this->bild;
    }

    /**
     * Sets the bild
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     * @return void
     */
    public function setBild(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bild)
    {
        $this->bild = $bild;
    }

    /**
     * Returns the kategorie
     *
     * @return string
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     *
     * @param string $kategorie
     * @return void
     */
    public function setKategorie(string $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Returns the adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Sets the adresse
     *
     * @param string $adresse
     * @return void
     */
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Returns the geokoordinaten
     *
     * @return string
     */
    public function getGeokoordinaten()
    {
        return $this->geokoordinaten;
    }

    /**
     * Sets the geokoordinaten
     *
     * @param string $geokoordinaten
     * @return void
     */
    public function setGeokoordinaten(string $geokoordinaten)
    {
        $this->geokoordinaten = $geokoordinaten;
    }

    /**
     * Returns the moreinfo
     *
     * @return string
     */
    public function getMoreinfo()
    {
        return $this->moreinfo;
    }

    /**
     * Sets the moreinfo
     *
     * @param string $moreinfo
     * @return void
     */
    public function setMoreinfo(string $moreinfo)
    {
        $this->moreinfo = $moreinfo;
    }

    /**
     * Returns the latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude
     *
     * @param string $latitude
     * @return void
     */
    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     *
     * @param string $longitude
     * @return void
     */
    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;
    }
}
