<?php
namespace Antsfree\AntSearch;

class XS
{
    protected $xs;

    public function __construct()
    {
        $ini_file = __DIR__."/config/xs.ini";
        $this->xs = new \XS($ini_file);
    }

    public function index()
    {
        return $this->xs->index;
    }

    public function search()
    {
        return $this->xs->search;
    }

    /**
     * Get new document instance
     * @return \XSDocument
     */
    public function getDocumentInstance(){
        return new \XSDocument;
    }

    public function addIndex($data)
    {
        $doc = $this->getDocumentInstance();
        $doc->setFields($data);
        $this->index()->add($doc)->flushIndex();
    }

    public function updateIndex()
    {
        $a = 1;
        return $a;
    }
}