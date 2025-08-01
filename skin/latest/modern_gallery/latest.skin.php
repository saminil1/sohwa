<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<div class="modern-gallery-grid">
<?
for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $img_width, $img_height);
    
    if($thumb['src']) {
        $img = '<img src="'.$thumb['src'].'" alt="'.$list[$i]['subject'].'" class="gallery-thumb">';
    } else {
        $img = '<div class="no-image"><i class="fas fa-image"></i></div>';
    }
?>
    <div class="gallery-item">
        <a href="<?=$list[$i]['href']?>" class="gallery-link">
            <div class="gallery-image">
                <?=$img?>
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-info">
                <h4 class="gallery-title"><?=$list[$i]['subject']?></h4>
                <span class="gallery-date"><?=date("Y.m.d", strtotime($list[$i]['datetime']))?></span>
            </div>
        </a>
    </div>
<? } ?>
<? if (count($list) == 0) { ?>
    <div class="empty-gallery">등록된 사진이 없습니다.</div>
<? } ?>
</div>

<style>
.modern-gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

.gallery-item {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.gallery-link {
    display: block;
    text-decoration: none;
    color: #333;
}

.gallery-image {
    position: relative;
    padding-top: 75%; /* 4:3 Aspect Ratio */
    overflow: hidden;
    background: #f8f9fa;
}

.gallery-thumb {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.gallery-item:hover .gallery-thumb {
    transform: scale(1.1);
}

.no-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ecf0f1;
    color: #bdc3c7;
    font-size: 2rem;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,63,168,0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay i {
    color: #fff;
    font-size: 1.5rem;
}

.gallery-info {
    padding: 15px;
}

.gallery-title {
    margin: 0 0 5px 0;
    font-size: 0.9375rem;
    font-weight: 500;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.gallery-date {
    color: #95a5a6;
    font-size: 0.8125rem;
}

.empty-gallery {
    grid-column: 1 / -1;
    text-align: center;
    color: #95a5a6;
    padding: 60px 20px;
}

@media (max-width: 768px) {
    .modern-gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
    }
}
</style>