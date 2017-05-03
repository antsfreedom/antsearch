<?php
namespace Antsfree\Antsearch;

use Antsfree\Antsearch\Sdk\XS;
use Antsfree\Antsearch\Sdk\XSDocument as Doc;

class AntsearchService
{
    /**
     * 表示: 全文搜索模式
     */
    const FULLTEXT_MODE = 1;

    /**
     * 表示: 标题搜索模式
     */
    const TITLE_MODE = 0;

    /**
     * 默认最大热词显示
     */
    const MAX_HOT_WORD_NUM = 50;

    protected $xs;

    public function __construct()
    {
        $ini_file = __DIR__ . "/config/xs.ini";
        $this->xs = new XS($ini_file);
    }

    /**
     * 索引入口
     *
     * @return mixed
     */
    public function index()
    {
        return $this->xs->index;
    }

    /**
     * 搜索入口
     *
     * @return mixed
     */
    public function search()
    {
        return $this->xs->search;
    }

    /**
     * 索引文档实例化
     *
     * @return Doc
     */
    public function getDocumentInstance()
    {
        return new Doc();
    }

    /**
     * 增加索引方法
     *
     * @param $data
     */
    public function addIndex($data)
    {
        $doc = $this->getDocumentInstance();
        $doc->setFields($data);
        $this->index()->add($doc)->flushIndex();
    }

    /**
     * 更新索引方法
     *
     * @param $data
     */
    public function updateIndex($data)
    {
        $doc = $this->getDocumentInstance();
        $doc->setFields($data);
        $this->index()->update($data)->flushIndex();
    }

    /**
     * 删除指定索引方法
     *
     * @param $data
     */
    public function deleteIndex($data)
    {
        $this->index()->del($data)->flushIndex();
    }

    /**
     * 清空索引方法
     */
    public function cleanIndex()
    {
        return 222;
        $this->index()->clean();
    }

    /**
     * 重建索引方法
     *
     * @param $data
     */
    public function rebuildIndex($data)
    {
        $doc = $this->getDocumentInstance();
        $doc->setFields($data);
        $this->index()->beginRebuild();
        $this->index()->add($doc);
        $this->index()->endRebuild();
    }

    /**
     * 索引搜索
     *
     * @param $search_array
     */
    public function searchIndex($search_array)
    {
        // 搜索模式
        $search_mode = isset($search_array['search_mode']) && $search_array['search_mode'] ? self::FULLTEXT_MODE : self::TITLE_MODE;
        // 搜索内容
        $search_text = $search_array['search_text'];
        // 查询
        if ($search_mode) {
            $this->search()->search($search_text);
        } else {
            $this->search()->search('title:' . $search_text);
        }
    }

    /**
     * 获取索引总数
     *
     * @return mixed
     */
    public function getIndexTotalNum()
    {
        $total = $this->search()->dbTotal();

        return $total;
    }

    /**
     * 获取热词
     *
     * @return array
     */
    public function getHotWords()
    {
        // 获取热词,默认最大 50 个.currnum 表示本周
        $words = $this->search()->getHotQuery(self::MAX_HOT_WORD_NUM, 'currnum') ?: [];

        return $words;
    }

    /**
     * 获取搜索内容匹配数量
     *
     * @param $text
     * @return int
     */
    public function getMatchNum($text)
    {
        $count = $this->search()->setQuery($text)->count() ?: 0;

        return $count;
    }

}