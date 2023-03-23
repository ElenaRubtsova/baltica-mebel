<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
//print_r($arParams);
//pp($arResult["DOP_PARAMS"]);
?>

<?// echo (empty($arResult["DOP_PARAMS"]['VYSOTA']['VALUES']));
if (!empty($arResult["DOP_PARAMS"]['VYSOTA']['VALUES'])) {
    foreach ($arResult["DOP_PARAMS"] as $code => $prop) {
        $arParams['PROPERTIES'][$code]['VALUE'] /= 10;
        $realsize = $arParams['PROPERTIES'][$code]['VALUE'];
        ?>
        <?//pp($prop);?>
        <div class="bx_item_detail_size" style=""
             data-display_type="LI">
            <span class="show_class bx_item_section_name"><span><?=$prop['NAME']?><span
                                class="sku_mdash">—</span><span
                                class="val"><?=$arParams['PROPERTIES'][$code]['VALUE']?></span></span></span>
            <div class="bx_size_scroller_container scrollblock scrollblock--ob-auto">
                <div class="bx_size">
                    <ul id="bx_117848907_188306_prop_3580_list"
                        class="list_values_wrapper">
                        <? foreach ($prop['VALUES'] as $size) {
                            $size['VALUE'] /= 10;
                            ?>
                            <li class="item <? if ($realsize === $size['VALUE']): ?>active<? endif; ?>"
                                data-treevalue="3580_263770"
                                data-showtype="li"
                                data-onevalue="263770"
                                title="<?=$prop['NAME']?>: <?=$size['VALUE']?>">
                                <i></i><span
                                        class="cnt"><?=$size['VALUE']?></span>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
    <? }
} ?>

<!-- block serii-->

<div><!--
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
                    <span><? echo $arParams['SHIRINA_DLINA'] / 10 ?>см</span>
                <? } ?>
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
-->
    <?
    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "CODE");
    $arFilter = array(
        "IBLOCK_ID" => "129",
        "NAME" => $arResult['PROPERTIES']['SERIYA']['VALUE'],
        "ACTIVE" => "Y",
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields_serii = $ob->GetFields();
    }
    ?>
    <? if ($arFields_serii['CODE'] != '') {
        $Url_serii = '/serii/' . $arFields_serii['CODE'] . '/';
    } ?>

    <? if ($arParams['PROPERTIES']['SERIYA']['VALUE'] != '') { ?>
        <div class=""><a class="" href="<?=$Url_serii?>"><span class="btn btn-default btn-sm more type_block has-ripple">
                    Все товары коллекции <?=$arParams['PROPERTIES']['SERIYA']['VALUE']?></span></a></div>
    <? } else { ?>
        <div class=""><a class=""><span class="btn btn-default btn-sm more type_block has-ripple">
                    Похожие товары</span></a></div>
    <? } ?>

    <? $ar_resultid = array(); ?>
    <? $ar_resultidsect = array(); ?>
    <? $ar_resultid_pr = array(); ?>

    <?
    $rsSections = CIBlockSection::GetByID($arParams['IBLOCK_SECTION_ID']);
    $arSection = $rsSections->Fetch();
    $id_main = $arSection['IBLOCK_SECTION_ID'];
    ?>
    <?
    if (CModule::IncludeModule("iblock")) {
        $arFilter = array('IBLOCK_ID' => 126, 'GLOBAL_ACTIVE' => 'Y', 'SECTION_ID' => $id_main);
        $db_list = CIBlockSection::GetList(array($by => $order), $arFilter, true);
        while ($ar_result = $db_list->GetNext()) {
            array_push($ar_resultidsect, $ar_result['ID']);
        }
    }
    ?>

    <?
    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM");
    $arFilter = array(
        "IBLOCK_ID" => 126,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y",
        'SECTION_ID' => $arParams['IBLOCK_SECTION_ID'],
        "PROPERTY_SERIYA_VALUE" => $arParams['PROPERTIES']['SERIYA']['VALUE'],
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 4), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        array_push($ar_resultid, $arFields['ID']);
    }
    ?>


    <? foreach ($ar_resultidsect as $key => $itemidsec) { ?>
        <? if ($itemidsec != $arParams['IBLOCK_SECTION_ID']):?>
            <? $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM");
            $arFilter = array(
                "IBLOCK_ID" => 126,
                "ACTIVE_DATE" => "Y",
                "ACTIVE" => "Y",
                'SECTION_ID' => $itemidsec,
                "PROPERTY_SERIYA_VALUE" => $arParams['PROPERTIES']['SERIYA']['VALUE'],
            );
            $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 1), $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                array_push($ar_resultid, $arFields['ID']);
            }
            ?>
        <? endif ?>
    <? } ?>

    <?
    $min_pr = $arParams['MIN_PRICE']['VALUE'] * 0.8;
    $max_pr = $arParams['MIN_PRICE']['VALUE'] * 1.2;
    $min_hv = (int)$arParams['PROPERTIES']['VYSOTANUMBER']['VALUE'] * 0.8;
    $max_hv = (int)$arParams['PROPERTIES']['VYSOTANUMBER']['VALUE'] * 1.2;
    $min_hs = (int)$arParams['PROPERTIES']['SHIRINA_DLINANUMBER']['VALUE'] * 0.8;
    $max_hs = (int)$arParams['PROPERTIES']['SHIRINA_DLINANUMBER']['VALUE'] * 1.2;
    $min_hg = (int)$arParams['PROPERTIES']['GLUBINANUMBER']['VALUE'] * 0.8;
    $max_hg = (int)$arParams['PROPERTIES']['GLUBINANUMBER']['VALUE'] * 1.2;
    ?>

    <?
    $arSelect = array("ID");
    $arFilter = array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "ACTIVE" => "Y",
        "IBLOCK_SECTION_ID" => $arParams['IBLOCK_SECTION_ID'],
        array("LOGIC" => "AND", ">=CATALOG_PRICE_8" => $min_pr, "<=CATALOG_PRICE_8" => $max_pr),
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 2), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $ar_resultid_pr[] = $arFields['ID'];
    }
    ?>

    <?
    $arSelect_razmer = array("ID");
    $arFilter_razmer = array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "ACTIVE" => "Y",
        "IBLOCK_SECTION_ID" => $arParams['IBLOCK_SECTION_ID'],
        array(
            "LOGIC" => "AND",
            ">=PROPERTY_SHIRINA_DLINANUMBER" => $min_hs,
            "<=PROPERTY_SHIRINA_DLINANUMBER" => $max_hs,
        ),
    );
    $res = CIBlockElement::GetList(array(), $arFilter_razmer, false, array("nPageSize" => 2), $arSelect_razmer);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $ar_resultid_pr[] = $arFields['ID'];
    }
    echo $_REQUEST["PRODUCT_ID"];
    ?>


    <? if ($arParams['PROPERTIES']['SERIYA']['VALUE'] != '') { ?>
        <? global $arrCatalogFilterser;
        $arrCatalogFilterser = array('ID' => $ar_resultid); ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "catalog_list_simple",
            array(
                "ACTION_VARIABLE" => "action",
                "ADD_PICT_PROP" => "-",
                "ADD_PROPERTIES_TO_BASKET" => "Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "ADD_TO_BASKET_ACTION" => "ADD",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
                "BASKET_URL" => "/personal/basket.php",
                "BRAND_PROPERTY" => "-",
                "BROWSER_TITLE" => "-",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "COMPATIBLE_MODE" => "Y",
                "COMPONENT_TEMPLATE" => "catalog_list_simple",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "CONVERT_CURRENCY" => "Y",
                "CURRENCY_ID" => "RUB",
                "CUSTOM_FILTER" => "",
                "DATA_LAYER_NAME" => "dataLayer",
                "DETAIL_URL" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "DISCOUNT_PERCENT_POSITION" => "bottom-right",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_COMPARE" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_SORT_FIELD" => "sort",
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER" => "asc",
                "ELEMENT_SORT_ORDER2" => "desc",
                "ENLARGE_PRODUCT" => "PROP",
                "ENLARGE_PROP" => "-",
                "FILTER_NAME" => "arrCatalogFilterser",
                "HIDE_NOT_AVAILABLE" => "N",
                "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                "IBLOCK_ID" => "126",
                "IBLOCK_TYPE" => "aspro_max_catalog",
                "INCLUDE_SUBSECTIONS" => "Y",
                "LABEL_PROP" => "",
                "LABEL_PROP_MOBILE" => "",
                "LABEL_PROP_POSITION" => "top-left",
                "LAZY_LOAD" => "Y",
                "LINE_ELEMENT_COUNT" => "5",
                "LOAD_ON_SCROLL" => "N",
                "MESSAGE_404" => "",
                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                "MESS_BTN_BUY" => "Купить",
                "MESS_BTN_DETAIL" => "Подробнее",
                "MESS_BTN_LAZY_LOAD" => "Показать ещё",
                "MESS_BTN_SUBSCRIBE" => "Подписаться",
                "MESS_NOT_AVAILABLE" => "Нет в наличии",
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "OFFERS_CART_PROPERTIES" => array(),
                "OFFERS_FIELD_CODE" => array(0 => "", 1 => "",),
                "OFFERS_LIMIT" => "5",
                "OFFERS_PROPERTY_CODE" => array(
                    0 => "DL",
                    1 => "TSVET_TKANI",
                    2 => "COLOR_REF",
                    3 => "SIZES_SHOES",
                    4 => "SIZES_CLOTHES",
                    5 => "",
                ),
                "OFFERS_SORT_FIELD" => "sort",
                "OFFERS_SORT_FIELD2" => "id",
                "OFFERS_SORT_ORDER" => "asc",
                "OFFERS_SORT_ORDER2" => "desc",
                "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
                "OFFER_TREE_PROPS" => "",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Товары",
                "PAGE_ELEMENT_COUNT" => "4",
                "PARTIAL_PRODUCT_PROPERTIES" => "Y",
                "PRICE_CODE" => array(0 => "ИМ Балтика Мебель", 1 => "ИМ Балтика Мебель акционная",),
                "PRICE_VAT_INCLUDE" => "Y",
                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
                "PRODUCT_DISPLAY_MODE" => "Y",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRODUCT_PROPERTIES" => array(),
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PRODUCT_QUANTITY_VARIABLE" => "",
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
                "PRODUCT_SUBSCRIPTION" => "Y",
                "PROPERTY_CODE" => array(0 => "", 1 => "NEWPRODUCT", 2 => "",),
                "PROPERTY_CODE_MOBILE" => "",
                "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                "RCM_TYPE" => "personal",
                "SECTION_CODE" => "",
                "SECTION_CODE_PATH" => "",
                "SECTION_ID" => "",
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
                "SEF_MODE" => "Y",
                "SEF_RULE" => "",
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SHOW_ALL_WO_SECTION" => "N",
                "SHOW_CLOSE_POPUP" => "N",
                "SHOW_DISCOUNT_PERCENT" => "Y",
                "SHOW_FROM_SECTION" => "N",
                "SHOW_MAX_QUANTITY" => "N",
                "SHOW_OLD_PRICE" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "SHOW_RATING" => "N",
                "SHOW_SLIDER" => "Y",
                "SLIDER_INTERVAL" => "3000",
                "SLIDER_PROGRESS" => "N",
                "TEMPLATE_THEME" => "blue",
                "USE_ENHANCED_ECOMMERCE" => "Y",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "USE_PRICE_COUNT" => "N",
                "USE_PRODUCT_QUANTITY" => "N",
            )
        ); ?>
    <? } else { ?>
        <? global $arrCatalogFilterser;
        $arrCatalogFilterser = array('ID' => $ar_resultid_pr); ?>

        <? if ($ar_resultid_pr != '') { ?>
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.section",
                "catalog_list_simple",
                array(
                    "ACTION_VARIABLE" => "action",
                    "ADD_PICT_PROP" => "-",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
                    "BASKET_URL" => "/personal/basket.php",
                    "BRAND_PROPERTY" => "-",
                    "BROWSER_TITLE" => "-",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "COMPATIBLE_MODE" => "Y",
                    "COMPONENT_TEMPLATE" => "catalog_list_simple",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "CONVERT_CURRENCY" => "Y",
                    "CURRENCY_ID" => "RUB",
                    "CUSTOM_FILTER" => "",
                    "DATA_LAYER_NAME" => "dataLayer",
                    "DETAIL_URL" => "",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                    "DISCOUNT_PERCENT_POSITION" => "bottom-right",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_COMPARE" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_FIELD2" => "id",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "ENLARGE_PRODUCT" => "PROP",
                    "ENLARGE_PROP" => "-",
                    "FILTER_NAME" => "arrCatalogFilterser",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                    "IBLOCK_ID" => "126",
                    "IBLOCK_TYPE" => "aspro_max_catalog",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "LABEL_PROP" => "",
                    "LABEL_PROP_MOBILE" => "",
                    "LABEL_PROP_POSITION" => "top-left",
                    "LAZY_LOAD" => "Y",
                    "LINE_ELEMENT_COUNT" => "5",
                    "LOAD_ON_SCROLL" => "N",
                    "MESSAGE_404" => "",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_BTN_LAZY_LOAD" => "Показать ещё",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
                    "OFFERS_CART_PROPERTIES" => array(),
                    "OFFERS_FIELD_CODE" => array(0 => "", 1 => "",),
                    "OFFERS_LIMIT" => "5",
                    "OFFERS_PROPERTY_CODE" => array(
                        0 => "DL",
                        1 => "TSVET_TKANI",
                        2 => "COLOR_REF",
                        3 => "SIZES_SHOES",
                        4 => "SIZES_CLOTHES",
                        5 => "",
                    ),
                    "OFFERS_SORT_FIELD" => "sort",
                    "OFFERS_SORT_FIELD2" => "id",
                    "OFFERS_SORT_ORDER" => "asc",
                    "OFFERS_SORT_ORDER2" => "desc",
                    "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
                    "OFFER_TREE_PROPS" => "",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Товары",
                    "PAGE_ELEMENT_COUNT" => "4",
                    "PARTIAL_PRODUCT_PROPERTIES" => "Y",
                    "PRICE_CODE" => array(0 => "ИМ Балтика Мебель", 1 => "ИМ Балтика Мебель акционная",),
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRODUCT_PROPERTIES" => array(),
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
                    "PRODUCT_SUBSCRIPTION" => "Y",
                    "PROPERTY_CODE" => array(0 => "", 1 => "NEWPRODUCT", 2 => "",),
                    "PROPERTY_CODE_MOBILE" => "",
                    "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                    "RCM_TYPE" => "personal",
                    "SECTION_CODE" => "",
                    "SECTION_CODE_PATH" => "",
                    "SECTION_ID" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SECTION_URL" => "",
                    "SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
                    "SEF_MODE" => "Y",
                    "SEF_RULE" => "",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SHOW_ALL_WO_SECTION" => "N",
                    "SHOW_CLOSE_POPUP" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "Y",
                    "SHOW_FROM_SECTION" => "N",
                    "SHOW_MAX_QUANTITY" => "N",
                    "SHOW_OLD_PRICE" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "SHOW_RATING" => "N",
                    "SHOW_SLIDER" => "Y",
                    "SLIDER_INTERVAL" => "3000",
                    "SLIDER_PROGRESS" => "N",
                    "TEMPLATE_THEME" => "blue",
                    "USE_ENHANCED_ECOMMERCE" => "Y",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "USE_PRICE_COUNT" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                )
            ); ?>
        <? } ?>
    <? } ?>
</div>