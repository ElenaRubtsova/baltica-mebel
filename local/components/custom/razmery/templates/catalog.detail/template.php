<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<?
//print_r($arParams);
//pp($arResult["DOP_PARAMS"]);
?>

<? if (isset($arResult["DOP_PARAMS"]['SHIRINA_DLINA']['VALUES'][0])) { ?>
    <? //pp($arResult["DOP_PARAMS"]);
    foreach ($arResult["DOP_PARAMS"] as $code => $prop) {
        //pp(count($prop['VALUES']));
        //$arParams['PROPERTIES'][$code]['VALUE'] /= 10;
        ?>
        <div class="bx_item_detail_size" style=""
             data-display_type="LI">
        <? if(count($prop['VALUES']) > 0) :?>
            <span class="show_class bx_item_section_name"><span><?=$prop['NAME']?>
                    <? //pp(count($prop['VALUES']));?>
                    <? if(count($prop['VALUES']) > 1) :?>
                    <span class="sku_mdash">—</span><span
                            class="val"><?=$arParams['PROPERTIES'][$code]['VALUE']?></span></span>
                <? endif;?>
            </span>
        <? endif;?>
            <div class="bx_size_scroller_container scrollblock scrollblock--ob-auto">
                <div class="bx_size">
                    <ul id="bx_117848907_188306_prop_3580_list"
                        class="list_values_wrapper">
                        <? foreach ($prop['VALUES'] as $size) {
                            if ($size['VALUE'] !== '') {
                                //pp($size);?>
                                <a href="<?=$size['A_URL'];?>">
                                    <li class="item <? if ($size['ACTIVE'] == 'Y'): ?>active<? endif; ?>"
                                        data-treevalue="3580_263770"
                                        data-showtype="li"
                                        data-onevalue="263770"
                                        title="<?=$prop['NAME']?>: <?=$size['VALUE']?>">
                                        <i></i><span
                                                class="cnt"><?=$size['VALUE']?></span>
                                    </li>
                                </a>
                            <? }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    <? } ?>
<? } ?>

