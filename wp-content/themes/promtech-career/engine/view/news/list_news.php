
<?php foreach($args['news'] as $news) : ?>
<div class="news-list__item">
    <div class="news-item__picture">
        <a href="<?=$news->news_url;?>">
            <img src="<?=$news->img?>" alt="" class="news-item__img">
        </a>
    </div>
    <div class="news-item__content">
        <div class="tags news-tags">
            <!-- r($j = 0; $j < count($news[$i]['tags']); $j++){?>
                <div class="tag">$news[$i]['tags'][$j]?></div>
            }?> -->
        </div>
        <div class="news-item__title">
            <a href="<?=$news->news_url;?>"><?=$news->post_title; ?></a>
        </div>
        <div class="news-item__data"><?=$news->date;?></div>
        <div class="news-item__text"><?=$news->short_text;?></div>
        <div class="news-item__see-also">
            <a href="<?=$news->news_url;?>" class="link">Читать полностью</a>
        </div>
    </div>
</div>
<div class="search-tags tags">
    <?php foreach($news->category as $cat) : ?>
    <label for="#Tag0" class="tag label-tag"><?=$cat->name;?>                                            
        <input type="checkbox" name="tag0" class="hidden-checkbox" id="Tag0">
    </label>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>
