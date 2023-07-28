<?/*if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();*/

$current_page = $_POST['page'];

function echo_Pagination($num, $max) { ?>
    <div class="fx-pagination">
    <div class="fx-pagination-container">
        <ul>
            <li class="fx-pag-prev"><a href="<?=$page;?>?page=<?=$num-1;?>"><span>Назад</span></a></li>
            <li class="<?=($num == 1) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=1"><span>1</span></a></li>
            <? if ($max <= 5) {
                for ($i = 2; $i < $max; $i++) { ?>
                    <li class="<?=($num == $i) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=$i?>>"><span><?=$i?></span></a></li>
                <? }
            } else { ?>
                <? if ($num >= 1 && $num <= 3) { ?>
                    <li class="<?=($num == 2) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=2"><span>2</span></a></li>
                    <li class="<?=($num == 3) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=3"><span>3</span></a></li>
                    ...
                <? } elseif ($num >= 4 && $num <= ($max-3)) { ?>
                        ...
                        <li class=""><a href="<?=$page;?>?page=<?=$num-1;?>"><span><?=$num-1;?></span></a></li>
                        <li class="fx-active"><span><?=$num;?></span></li>
                        <li class=""><a href="<?=$page;?>?page=<?=$num+1;?>"><span><?=$num+1;?></span></a></li>
                        ...
                <? } elseif ($num > ($max-3)) { ?>
                    ...
                    <li class="<?=($num == ($max-2)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-2);?>"><span><?=($max-2);?></span></a></li>
                    <li class="<?=($num == ($max-1)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-1);?>"><span><?=($max-1);?></span></a></li>
                <? } ?>
            <? } ?>
            <li class="<?=($num == $max) ? "fx-active" : ""?>"><a href="<?=$page;?>?page=<?=$max;?>"><span><?=$max;?></span></a></li>

            <li class="fx-pag-next"><a href="<?=$page;?>?page=<?=$num+1;?>"><span>Вперед</span></a></li>
            <li class="fx-pag-all"><a href="<?=$page;?>?page=page-all" rel="nofollow"><span>Все</span></a></li>
        </ul>
        <div style="clear:both"></div>
    </div>
</div> <?
}

echo_Pagination(1, 5);