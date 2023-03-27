<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
//echo $arParams['OBSHCHIY_ID'];
//if ($arParams['OBSHCHIY_ID'] == '')
//$arParams['OBSHCHIY_ID'] =
//function set_params()
function init_params(array &$arParams, array &$arResult)
{
    if ($arParams['PROPERTIES']['SHIRINA_DLINA']['VALUE'] == '') {
        return false;
    }
    //global $arResult;
    //global $arParams;
    $arResult["DOP_PARAMS"] = array(
        'SHIRINA_DLINA' => array(),
        'VYSOTA' => array(),
        'GLUBINA' => array(),
    );
    foreach ($arResult["DOP_PARAMS"] as $code => &$prop) {
        //echo $code;
        $prop['NAME'] = $arParams['PROPERTIES'][$code]['NAME'];
        $prop["VALUES"][] = array(
            //"NAME" => $prop[$code]["NAME"],
            "VALUE" => $arParams['PROPERTIES'][$code]['VALUE'],
            "ACTIVE" => 'Y',
        );
    }
    return true;
}

init_params($arParams, $arResult);
//pp($arParams['PROPERTIES']);
/*foreach ($arParams['PROPERTIES'] as $code => $prop) { //$code
    $param = $arResult["DOP_PARAMS"][$code];
    $param["NAME"] = $prop[$code]['NAME'];
    $param["VALUES"][] = array(
        "VALUE" => $prop[$code]['VALUE'] / 10,
        "ACTIVE" => 'Y'
    );
    foreach ($arResult["DOP_PARAMS"] as $key => $param) { //$param
        $param["NAME"] = $arParams['PROPERTIES'][$code]['NAME'];
        $param["VALUES"][] = array(
            "VALUE" => $arFields["PROPERTY_SHIRINA_DLINA_VALUE_VALUE"],
        );
        $props['ACTIVE'] = 'Y';
        $props['VALUE'] = ($props['VALUE'] / 10);
    }
}*/
//}
//pp($arResult["DOP_PARAMS"]);
/*
$arResult["DOP_PARAMS"]["SHIRINA_DLINA"]["VALUES"] = array(
    //"NAME" => $arFields["NAME"],    //Комод Идея 858*450*500
    "VALUE" => $arFields["PROPERTY_SHIRINA_DLINA_VALUE_VALUE"] / 10,
    "A_URL" => $arFields["DETAIL_PAGE_URL"],
);
$arResult["DOP_PARAMS"]["VYSOTA"]["VALUES"]= array(
    //"NAME" => $arFields["NAME"],
    "VALUE" => $arFields["PROPERTY_VYSOTA_VALUE_VALUE"] / 10,
    "A_URL" => $arFields["DETAIL_PAGE_URL"],
);
$arResult["DOP_PARAMS"]["GLUBINA"]["VALUES"] = array(
    //"NAME" => $arFields["NAME"],
    "VALUE" => $arFields["PROPERTY_GLUBINA_VALUE_VALUE"] / 10,
    "A_URL" => $arFields["DETAIL_PAGE_URL"],
);*/
//echo $arParams['OBSHCHIY_ID'];
if ($arParams['OBSHCHIY_ID'] != '') {//echo 9;
    //pp($arResult["DOP_PARAMS"]);
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
    //pp($res->SelectedRowsCount());
    if ($res->SelectedRowsCount() != 0) {
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            //pp($arFields);
            /*if (empty($arFields)) {
                foreach ($arResult["DOP_PARAMS"] as $code => &$par) {
                    $arResult["DOP_PARAMS"][$code]["VALUES"][] = array(
                        "VALUE" => $arFields["PROPERTY_".$code."_VALUE_VALUE"],
                    );
                }
                pp($arResult["DOP_PARAMS"]);
            }*/
            /*$arResult["DOP_PARAMS"]["DLINA"] = array(
                "NAME" => "Длина",
                "VALUES" => array(
                    "NAME" => $arFields["NAME"],
                    "VALUE" => $arFields["PROPERTY_SHIRINA_DLINA_VALUE_VALUE"],
                    "A_URL" => $arFields["DETAIL_PAGE_URL"],
                )
            );*/
            $arResult["DOP_PARAMS"]["SHIRINA_DLINA"]["VALUES"][] = array(
                //"NAME" => $arFields["NAME"],    //Комод Идея 858*450*500
                "VALUE" => $arFields["PROPERTY_SHIRINA_DLINA_VALUE_VALUE"] / 10,
                "A_URL" => $arFields["DETAIL_PAGE_URL"],
            );
            $arResult["DOP_PARAMS"]["VYSOTA"]["VALUES"][] = array(
                //"NAME" => $arFields["NAME"],
                "VALUE" => $arFields["PROPERTY_VYSOTA_VALUE_VALUE"] / 10,
                "A_URL" => $arFields["DETAIL_PAGE_URL"],
            );
            $arResult["DOP_PARAMS"]["GLUBINA"]["VALUES"][] = array(
                //"NAME" => $arFields["NAME"],
                "VALUE" => $arFields["PROPERTY_GLUBINA_VALUE_VALUE"] / 10,
                "A_URL" => $arFields["DETAIL_PAGE_URL"],
            );
        }
        //pp($arFields);
        //echo empty($arFields);
        //if (empty($arResult["DOP_PARAMS"]["VYSOTA"]["VALUES"])) {
        //pp($arResult["DOP_PARAMS"]);
        /*foreach ($arResult["DOP_PARAMS"] as $code => &$par) {
            $par['NAME'] = $arParams['PROPERTIES'][$code]['NAME'];
            $par['VALUES']['VALUE'] = $arParams['PROPERTIES'][$code]['VALUE'] / 10;
            //$props['VALUE'] = ($props['VALUE'] / 10);
            $par['VALUES']['ACTIVE'] = 'Y';
        }
        //pp($arResult["DOP_PARAMS"]);*/
        //} else {
        //pp($arResult["DOP_PARAMS"]);
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

        //pp($arResult["DOP_PARAMS"]);
        $arResult["DOP_PARAMS"]["SHIRINA_DLINA"]["VALUES"] = array_unique_key($arResult["DOP_PARAMS"]["SHIRINA_DLINA"]["VALUES"],
            'VALUE');
        $arResult["DOP_PARAMS"]["VYSOTA"]["VALUES"] = array_unique_key($arResult["DOP_PARAMS"]["VYSOTA"]["VALUES"],
            'VALUE');
        $arResult["DOP_PARAMS"]["GLUBINA"]["VALUES"] = array_unique_key($arResult["DOP_PARAMS"]["GLUBINA"]["VALUES"],
            'VALUE');
        //$arResult["DOP_PARAMS"]["DLINA_COUNT"] = count($arResult["DOP_PARAMS"]["DLINA"]);
        //$arResult["DOP_PARAMS"]["VYSOTA_COUNT"] = count($arResult["DOP_PARAMS"]["VYSOTA"]);
        //$arResult["DOP_PARAMS"]["GLUBINA_COUNT"] = count($arResult["DOP_PARAMS"]["GLUBINA"]);
        foreach ($arResult["DOP_PARAMS"] as $code => &$par) {
            //echo $arParams['PROPERTIES'][$code]['NAME'];
            foreach ($par as $key => $props) {
                if ($props['VALUE'] === $arParams['PROPERTIES'][$code]['VALUE']) {
                    $props['ACTIVE'] = 'Y';
                }
                $props['VALUE'] = ($props['VALUE'] / 10);
            }
        }
        sort($arResult["DOP_PARAMS"]["SHIRINA_DLINA"]["VALUES"]);
        sort($arResult["DOP_PARAMS"]["VYSOTA"]["VALUES"]);
        sort($arResult["DOP_PARAMS"]["GLUBINA"]["VALUES"]);
    }
}
if ($arParams['PROPERTIES']['SERIYA']['VALUE'] != '') {
    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "CODE");
    $arFilter = array(
        "IBLOCK_ID" => "129",
        "NAME" => $arParams['PROPERTIES']['SERIYA']['VALUE'],
        "ACTIVE" => "Y",
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields_serii = $ob->GetFields();
    }
    if ($arFields_serii['CODE'] != '') {
        $arResult['URL_SERII'] = '/serii/' . $arFields_serii['CODE'] . '/';
    }
}
//pp($arResult["DOP_PARAMS"]);
$this->IncludeComponentTemplate();
return $arResult["DOP_PARAMS"];