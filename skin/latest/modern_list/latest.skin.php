<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<ul class="modern-latest-list">
<?
for ($i=0; $i<count($list); $i++) {
    $comment_cnt = "";
    if ($list[$i]['comment_cnt'])
        $comment_cnt = " <span class=\"comment-count\">({$list[$i]['comment_cnt']})</span>";
        
    $icon_new = "";
    if ($list[$i]['icon_new'])
        $icon_new = " <span class=\"icon-new\">N</span>";
        
    $icon_hot = "";
    if ($list[$i]['icon_hot'])
        $icon_hot = " <span class=\"icon-hot\">H</span>";
?>
    <li>
        <a href="<?=$list[$i]['href']?>" class="latest-item">
            <span class="latest-subject">
                <?=$list[$i]['subject']?>
                <?=$comment_cnt?>
                <?=$icon_new?>
                <?=$icon_hot?>
            </span>
            <span class="latest-date"><?=date("m.d", strtotime($list[$i]['datetime']))?></span>
        </a>
    </li>
<? } ?>
<? if (count($list) == 0) { ?>
    <li class="empty">게시물이 없습니다.</li>
<? } ?>
</ul>

<style>
.modern-latest-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.modern-latest-list li {
    border-bottom: 1px solid #f1f3f4;
    transition: background-color 0.3s;
}

.modern-latest-list li:last-child {
    border-bottom: none;
}

.modern-latest-list li:hover {
    background-color: #f8f9fa;
}

.latest-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    text-decoration: none;
    color: #333;
}

.latest-subject {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding-right: 10px;
}

.latest-date {
    color: #95a5a6;
    font-size: 0.875rem;
    flex-shrink: 0;
}

.comment-count {
    color: #3498db;
    font-size: 0.875rem;
    margin-left: 5px;
}

.icon-new {
    display: inline-block;
    background: #e74c3c;
    color: #fff;
    font-size: 0.75rem;
    padding: 2px 5px;
    border-radius: 3px;
    margin-left: 5px;
}

.icon-hot {
    display: inline-block;
    background: #f39c12;
    color: #fff;
    font-size: 0.75rem;
    padding: 2px 5px;
    border-radius: 3px;
    margin-left: 5px;
}

.empty {
    text-align: center;
    color: #95a5a6;
    padding: 30px 0;
}
</style>