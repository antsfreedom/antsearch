####安装

```
composer require --prefer-dist antsfree/antsearch "0.5.*"
```

#####composer 
```
{
    "require": {
        "antsfree/antsearch": "0.5.*"
    }
}
```

### 基本服务方法使用

```
use Antsearch;

// 增加索引
Antsearch::addIndex($data);

// 删除索引
Antsearch::deleteIndex($data);

// 查找索引
Antsearch::searchIndex($search_text);

// 更新索引
Antsearch::updateIndex($data);

// 清空索引
Antsearch::cleanIndex();

// 获取索引总数
Antsearch::getIndexTotalNum();

// 检测索引服务状态
Antsearch::checkSearchService();

// 获取热门搜索词汇
Antsearch::getHotWords();

// 获取搜索词匹配数量
Antsearch::getMatchNum();

// 获取搜索词汇搜索频次
Antsearch::getSearchRate();
```

### artisan 命令说明

| 序号 | artisan命令 | console释义 | 备注 | 
| --- | --- | --- | --- |
| 1 | php artisan antsearch:search {$key} | 内容搜索 | 支持setFuzzy模糊查询，支持特定字段定向查询（column:key) |
| 2 | php artisan xs:clean | 清空索引 | 平滑清空索引 |
| 3 | php artisan xs:rebuild | 重建索引 | 一步重建索引 |
| 4 | php artisan xs:flush | 强势刷新索引缓存 | 无需等待，即刻使用索引搜索 | 
