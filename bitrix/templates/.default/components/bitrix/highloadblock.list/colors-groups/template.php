<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ERROR']))
{
	echo $arResult['ERROR'];
	return false;
}

$page = $APPLICATION->GetCurPage();
$num = $_GET['page'] ? (int)$_GET['page'] : 1;
$max = count($arResult['ЛДСП']);
$newResult = array();
?>

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
                    <?/* if ($num == 1) { */?>
                    <li class="<?=($num == 2) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=2"><span>2</span></a></li>
                    <li class="<?=($num == 3) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=3"><span>3</span></a></li>
                    ...
                <? } elseif ($num == 4) { ?>
                    <li class="<?=($num == 2) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=2"><span>2</span></a></li>
                    <li class="<?=($num == 3) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=3"><span>3</span></a></li>
                    <li class="<?=($num == 4) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=4"><span>4</span></a></li>
                    ...
                <? } elseif ($num > 4 && $num < ($max-3)) { ?>
                        ...
                        <li class=""><a href="<?=$page;?>?page=<?=$num-1;?>"><span><?=$num-1;?></span></a></li>
                        <li class="fx-active"><span><?=$num;?></span></li>
                        <li class=""><a href="<?=$page;?>?page=<?=$num+1;?>"><span><?=$num+1;?></span></a></li>
                        ...
                <? } elseif ($num >= ($max-3)) { ?>
                    ...
                    <li class="<?=($num == ($max-3)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-3);?>"><span><?=($max-3);?></span></a></li>
                    <li class="<?=($num == ($max-2)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-2);?>"><span><?=($max-2);?></span></a></li>
                    <li class="<?=($num == ($max-1)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-1);?>"><span><?=($max-1);?></span></a></li>
                <? } elseif ($num > ($max-3)) { ?>
                    ...
                    <li class="<?=($num == ($max-2)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-2);?>"><span><?=($max-2);?></span></a></li>
                    <li class="<?=($num == ($max-1)) ?"fx-active" :"";?>"><a href="<?=$page;?>?page=<?=($max-1);?>"><span><?=($max-1);?></span></a></li>
                <? } ?>
            <? } ?>
            <? $max = count($arResult['ЛДСП']);?>
            <? if ($num < ($max - 2)) { ?>
            <? } ?>
            <li class="<?=($num == $max) ? "fx-active" : ""?>"><a href="<?=$page;?>?page=<?=$max;?>"><span><?=$max;?></span></a></li>

            <li class="fx-pag-next"><a href="<?=$page;?>?page=<?=$num+1;?>"><span>Вперед</span></a></li>
            <li class="fx-pag-all"><a href="<?=$page;?>?page=page-all" rel="nofollow"><span>Все</span></a></li>
        </ul>
        <div style="clear:both"></div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<? if (!empty($arResult)) {
//pp($arrResult);?>
<h1>Материалы и цвета</h1>
<div class="accordion-wrap">
    <div class="text-right">
        <button type="button" id="control" class="btn btn-bordered btn-sm accordion-toogle">
            <span id="show" class="show">Раскрыть все</span>
            <span id="hide" class="hide">Свернуть все</span>
        </button>
    </div>
    <div class="accordion">
        <? foreach ($arResult as $group => $arElements) { //pp($arrElements);?>
        <div class="accordion-card">
            <div class="accordion-card-header" id="heading-<?=$group?>">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse-<?=$group?>"
                        aria-expanded="false" aria-controls="collapse-<?=$group?>">
                    <?=getGroupName($group);?>
                    <sup class=""><?=getNameColor(count($arElements));?></sup>
                    <span class="plus"></span>
                </button>
            </div>
            <div id="collapse-<?=$group?>" class="collapse" aria-labelledby="heading-<?=$group?>" style="">
                <div class="accordion-card-body">
                    <!--<div class="row desc">
                        <div class="col-md-8">
                            <p>текст</p>
                        </div>
                        <div class="col-md-4"></div>
                    </div>-->
                    <div class="asingakub-gesoupem <?=$group;?>">
                    <? $i = 0; //pp($arrElements);
                    foreach ($arElements as $element) { ?>
                        <div class="kartochka">
                            <a class="fancybox" href="<?=$element['UF_FILE']?>"
                               data-fancybox="color-gallery"
                               data-caption="<?=$element['UF_NAME'];?>">
                                <img src="<?=$element['UF_FILE']?>" alt="<?=$element['UF_NAME'];?>" />
                            </a>
                            <p><?=$element['UF_NAME'];?></p>
                        </div>
                    <? } ?>
                    </div>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</div>
<? } ?>

<script>
    var button = document.getElementById("control");

    function clickAll() {
        var buttons = document.querySelectorAll('[data-toggle="collapse"]');
        var spanShow = button.querySelector(".show");
        var spanHide = button.querySelector(".hide");

        var idActive = spanShow.id;
        if (idActive == "show") {
            for (var i = 0; i < buttons.length; i++) {
                if (buttons[i].className == 'collapsed')
                    buttons[i].click();
            }
        } else {
            for (var i = 0; i < buttons.length; i++) {
                if (buttons[i].className == '')
                    buttons[i].click();
            }
        }

        spanShow.className = "hide";
        spanHide.className = "show";
    }

    button.addEventListener("click", clickAll);

    $(document).ready(function() {

        $(".fancybox").fancybox({
            loop: true
        });

        $("[data-fancybox='color-gallery']").fancybox();
    });
</script>
