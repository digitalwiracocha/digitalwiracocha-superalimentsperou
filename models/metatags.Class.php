<?php
abstract class MetaTags {
    
    private $balisetitle;
    private $metaDescription;
    private $metaKeywords;
    
   
public function __construct($balisetitle, $metaDescription, $metaKeywords) {            
        $this->balisetitle = $balisetitle;
        $this->metaDescription = $metaDescription;
        $this->metaKeywords = $metaKeywords;
    }
    

    public function getBaliseTitle() {
        return $this->balisetitle;
    }   
    public function setBaliseTitle($balisetitle) {
        $this->balisetitle = $balisetitle;
    }   
    public function getMetaDescription() {
        return $this->metaDescription;
    }
    public function setMetaDescription($metaDescription) {
        $this->metaDescription = $metaDescription;
    }
    public function getMetaKeywords() {
        return $this->metaKeywords;
    }
    public function setMetaKeywords($metaKeywords) {
        $this->metaKeywords = $metaKeywords;
    }
}
