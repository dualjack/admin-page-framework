<?php
/**
 Admin Page Framework v3.5.12 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AdminPageFramework_TableOfContents {
    public function __construct($sHTML, $iDepth = 4, $sTitle = '') {
        $this->sTitle = $sTitle;
        $this->sHTML = $sHTML;
        $this->iDepth = $iDepth;
    }
    public function get() {
        return $this->getTOC() . $this->getContents();
    }
    public function getContents() {
        return $this->sHTML;
    }
    public function getTOC() {
        $iDepth = $this->iDepth;
        $this->sHTML = preg_replace_callback('/<h[2-' . $iDepth . ']*[^>]*>.*?<\/h[2-' . $iDepth . ']>/i', array($this, '_replyToInsertNamedElement'), $this->sHTML);
        $_aOutput = array();
        foreach ($this->_aMatches as $_iIndex => $_sMatch) {
            $_sMatch = strip_tags($_sMatch, '<h1><h2><h3><h4><h5><h6><h7><h8>');
            $_sMatch = preg_replace('/<h([1-' . $iDepth . '])>/', '<li class="toc$1"><a href="#toc_' . $_iIndex . '">', $_sMatch);
            $_sMatch = preg_replace('/<\/h[1-' . $iDepth . ']>/', '</a></li>', $_sMatch);
            $_aOutput[] = $_sMatch;
        }
        $this->sTitle = $this->sTitle ? '<p class="toc-title">' . $this->sTitle . '</p>' : '';
        return '<div class="toc">' . $this->sTitle . '<ul>' . implode(PHP_EOL, $_aOutput) . '</ul>' . '</div>';
    }
    protected $_aMatches = array();
    public function _replyToInsertNamedElement($aMatches) {
        static $_icount = - 1;
        $_icount++;
        $this->_aMatches[] = $aMatches[0];
        return "<span class='toc_header_link' id='toc_{$_icount}'></span>" . PHP_EOL . $aMatches[0];
    }
}