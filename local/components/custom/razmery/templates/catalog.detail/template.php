<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
//print_r($arParams);
?>

<div>
    <? if ($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE_COUNT"] <= 1) { ?>
        <div class="razmer_bloc">
            <div class="razmer_bloc_tit">
                <? if (!empty($arParams['PROPERTIES']['VYSOTA']['VALUE'])) { ?>Высота -
                    <span><? echo $arParams['PROPERTIES']['VYSOTA']['VALUE'] / 10 ?>
                    см</span><? } ?>

            </div>
            <? if (!empty($arParams['PROPERTIES']['VYSOTA']['VALUE'])) { ?>
                <div class="bloc_razmer">
                <a class="razmer_item activ"
                   style="order: <? echo $arParams['PROPERTIES']['VYSOTA']['VALUE'] / 1 ?>;"><? echo $arParams['PROPERTIES']['VYSOTA']['VALUE'] / 10 ?></a>
                </div><? } ?>
        </div>
    <? } ?>
    <? if ($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE_COUNT"] > '1') { ?>
        <div class="razmer_bloc">
            <div class="razmer_bloc_tit">Высота -
                <span><? echo $arParams['PROPERTIES']['VYSOTA']['VALUE'] / 10 ?> см</span></div>
            <div class="bloc_razmer">
                <? foreach ($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE"] as $key => $ardop): ?>
                    <? if ($ardop['VYSOTA_VALUE'] == $arParams['PROPERTIES']['VYSOTA']['VALUE']) { ?>
                        <a class="razmer_item activ"
                           style="order: <? echo $ardop['VYSOTA_VALUE'] / 1 ?>;"><? echo $ardop['VYSOTA_VALUE'] / 10 ?></a>
                    <? } else { ?>
                        <a class="razmer_item" href="<?=$ardop['A_URL']?>"
                           style="order: <? echo $ardop['VYSOTA_VALUE'] / 1 ?>;"><? echo $ardop['VYSOTA_VALUE'] / 10 ?></a>
                    <? } ?>
                <? endforeach; ?>
            </div>
        </div>
    <? } ?>


    <? if ($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE_COUNT"] <= 1) { ?>
        <div class="razmer_bloc">
            <div class="razmer_bloc_tit">
                <? if (!empty($arParams['PROPERTIES']['GLUBINA']['VALUE'])) { ?>Глубина -
                    <span><? echo $arParams['PROPERTIES']['GLUBINA']['VALUE'] / 10 ?>
                    см</span><? } ?>
            </div>
            <? if (!empty($arParams['PROPERTIES']['GLUBINA']['VALUE'])) { ?>
                <div class="bloc_razmer">
                <a class="razmer_item activ"
                   style="order: <? echo $arParams['PROPERTIES']['GLUBINA']['VALUE'] / 1 ?>;"><? echo $arParams['PROPERTIES']['GLUBINA']['VALUE'] / 10 ?></a>
                </div><? } ?>
        </div>
    <? } ?>


    <? if ($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE_COUNT"] > '1') { ?>
        <div class="razmer_bloc">
            <div class="razmer_bloc_tit">Глубина -
                <span><? echo $arParams['PROPERTIES']['GLUBINA']['VALUE'] / 10 ?> см </span>
            </div>
            <div class="bloc_razmer">
                <? foreach ($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE"] as $key => $ardop): ?>
                    <? if ($ardop['GLUBINA_VALUE'] == $arParams['PROPERTIES']['GLUBINA']['VALUE']) { ?>
                        <a class="razmer_item activ"
                           style="order: <? echo $ardop['GLUBINA_VALUE'] / 1 ?>;"><? echo $ardop['GLUBINA_VALUE'] / 10 ?></a>
                    <? } else { ?>
                        <a class="razmer_item" href="<?=$ardop['A_URL']?>"
                           style="order: <? echo $ardop['GLUBINA_VALUE'] / 1 ?>;"><? echo $ardop['GLUBINA_VALUE'] / 10 ?></a>
                    <? } ?>

                <? endforeach; ?>
            </div>
        </div>
    <? } ?>

    <? if ($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE_COUNT"] <= 1) { ?>
        <div class="razmer_bloc">
            <div class="razmer_bloc_tit">
                <? if (!empty($arParams['SHIRINA_DLINA'])) { ?>Ширина -
                    <span><? echo $arParams['SHIRINA_DLINA'] / 10 ?>
                    см</span><? } ?>
            </div>
            <? if (!empty($arParams['SHIRINA_DLINA'])) { ?>
                <div class="bloc_razmer">
                <a class="razmer_item activ"
                   style="order: <? echo $arParams['SHIRINA_DLINA'] / 1 ?>;"><? echo $arParams['SHIRINA_DLINA'] / 10 ?></a>
                </div><? } ?>
        </div>
    <? } ?>

    <? if ($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE_COUNT"] > '1') { ?>
        <div class="razmer_bloc">
            <div class="razmer_bloc_tit">Ширина -
                <span><? echo $arParams['SHIRINA_DLINA'] / 10 ?> см</span>
            </div>
            <div class="bloc_razmer">
                <? foreach ($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE"] as $key => $ardop): ?>
                    <? if ($ardop['DLINA_VALUE'] == $arParams['SHIRINA_DLINA']) { ?>
                        <a class="razmer_item activ"
                           style="order: <? echo $ardop['DLINA_VALUE'] / 1 ?>;"><? echo $ardop['DLINA_VALUE'] / 10 ?></a>
                    <? } else { ?>
                        <a class="razmer_item" href="<?=$ardop['A_URL']?>"
                           style="order: <? echo $ardop['DLINA_VALUE'] / 1 ?>;"><? echo $ardop['DLINA_VALUE'] / 10 ?></a>
                    <? } ?>
                <? endforeach; ?>
            </div>
        </div>
    <? } ?>
    <? /*if(($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE_COUNT"] <= 1) && ($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE_COUNT"] <= 1) && ($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE_COUNT"] <= 1 ) && (!empty($arParams['SHIRINA_DLINA'])) && (!empty($arParams['PROPERTIES']['VYSOTA']['VALUE'])) && (!empty($arParams['PROPERTIES']['GLUBINA']['VALUE']))){?>
<div class="razmer_bloc">
	<?if($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE_COUNT"] <= 1){?>
	<div class="razmer_bloc_tit">
		<?if (!empty($arParams['SHIRINA_DLINA'])) {?>Ширина - <? echo $arParams['SHIRINA_DLINA'] / 10 ?> см<?}?>
	</div>
	<?}?>
	<?if($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE_COUNT"] <= 1){?>
	<div class="razmer_bloc_tit">
		<?if (!empty($arParams['PROPERTIES']['VYSOTA']['VALUE'])) {?>Высота - <? echo $arParams['PROPERTIES']['VYSOTA']['VALUE'] / 10 ?> см<?}?>
	</div>
	<?}?>
	<?if($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE_COUNT"] <= 1 ){?>
	<div class="razmer_bloc_tit">
		<?if (!empty($arParams['PROPERTIES']['GLUBINA']['VALUE'])) {?>Глубина - <? echo $arParams['PROPERTIES']['GLUBINA']['VALUE'] / 10 ?> см<?}?>
	</div>
	<?}?>
	<?<div class="bloc_razmer">
		<a class="razmer_item activ">
			<?if (!empty($arParams['SHIRINA_DLINA'])) {?> x <?}?>
			<?if (!empty($arParams['PROPERTIES']['VYSOTA']['VALUE'])) {?> x <?}?>
			<?if (!empty($arParams['PROPERTIES']['GLUBINA']['VALUE'])) {?><?}?>
		</a>
	</div>?>
</div>
<?}*/ ?>
    <script type="text/javascript">
        /*
$(".razmer_item").removeAttr('onclick');
$('.dop_color').on('click', function() {
$('html,body').animate({scrollTop:$('.tabs').offset().top-130+"px"},{duration:1E3});

$('#desc').removeClass("active");
$('.char').removeClass("active");
$('.stores').removeClass("active");
$('.reviews').removeClass("active");
$('.buy').removeClass("active");
$('.payment').removeClass("active");
$('.tabs li:eq(0)').removeClass("active");
$('.tabs li:eq(1)').addClass("active");
$('.tabs li:eq(2)').removeClass("active");
$('.tabs li:eq(3)').removeClass("active");
$('.tabs li:eq(4)').removeClass("active");
$('.tabs li:eq(5)').removeClass("active");
$('.custom_tab').addClass("active");
});
$('.form_blok_lnop.red').on('click', function() {
$('html,body').animate({scrollTop:$('.tabs').offset().top-130+"px"},{duration:1E3});
$('#desc').removeClass("active");
$('.char').removeClass("active");
$('.stores').removeClass("active");
$('.reviews').removeClass("active");
$('.buy').removeClass("active");
$('.payment').removeClass("active");
$('.tabs li:eq(0)').removeClass("active");
$('.tabs li:eq(1)').addClass("active");
$('.tabs li:eq(2)').removeClass("active");
$('.tabs li:eq(3)').removeClass("active");
$('.tabs li:eq(4)').removeClass("active");
$('.tabs li:eq(5)').removeClass("active");
$('.custom_tab').addClass("active");
});
$('.napolnenie').on('click', function() {
$('html,body').animate({scrollTop:$('#napolnenie').offset().top-170+"px"},{duration:1E3});
});*/
    </script>
</div>