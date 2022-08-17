<div class="pagination"> 
    <?php for ($i = 1; $i <= $pages; $i++ ) { ?>
        <div class="pagination__item">
            <a href="news.php?page=<?= $i ?>" 
            class="pagination__link  <? if ($i == $_GET['page']): ?> pagination pagination__item_active <?php endif; ?>">
                <?= $i ?>
            </a>
        </div>
    <? } ?>
</div>