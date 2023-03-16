<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arParams['OBSHCHIY_ID'] != '') {
    $arSelect = array(
        "ID",
        "IBLOCK_ID",
        "NAME",
        "PROPERTY_SHIRINA_DLINA_VALUE",
        "PROPERTY_VYSOTA_VALUE",
        "PROPERTY_GLUBINA_VALUE",
        "DETAIL_PAGE_URL",
    );
    $arFilter = array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "ACTIVE" => "Y",
        "PROPERTY_OBSHCHIY_IDENTIFIKATOR_DLYA_SAYTA" => $arParams['OBSHCHIY_ID'],
    );
    $res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE"][] = array(
            "DLINA_VALUE" => $arFields["PROPERTY_SHIRINA_DLINA_VALUE_VALUE"],
            "A_URL" => $arFields["DETAIL_PAGE_URL"],
        );
        $arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE"][] = array(
            "VYSOTA_VALUE" => $arFields["PROPERTY_VYSOTA_VALUE_VALUE"],
            "A_URL" => $arFields["DETAIL_PAGE_URL"],
        );
        $arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE"][] = array(
            "GLUBINA_VALUE" => $arFields["PROPERTY_GLUBINA_VALUE_VALUE"],
            "A_URL" => $arFields["DETAIL_PAGE_URL"],
        );
    }
    function array_unique_key($array, $key)
    {
        $tmp = $key_array = array();
        $i = 0;
        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $tmp[$i] = $val;
            }
            $i++;
        }
        return $tmp;
    }

    $arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE"] = array_unique_key($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE"],
        'DLINA_VALUE');
    $arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE"] = array_unique_key($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE"],
        'VYSOTA_VALUE');
    $arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE"] = array_unique_key($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE"],
        'GLUBINA_VALUE');
    $arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE_COUNT"] = count($arResult["DOP_PARAMS"]["SHIRINA_DLINA_VALUE"]);
    $arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE_COUNT"] = count($arResult["DOP_PARAMS"]["SHIRINA_VYSOTA_VALUE"]);
    $arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE_COUNT"] = count($arResult["DOP_PARAMS"]["SHIRINA_GLUBINA_VALUE"]);
}
$this->IncludeComponentTemplate();