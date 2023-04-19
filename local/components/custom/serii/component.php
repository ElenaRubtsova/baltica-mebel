<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

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
    "PROPERTY_SERIYA_VALUE" => $arParams['SERIYA_VALUE'],
);
$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 4), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    array_push($ar_resultid, $arFields['ID']);
}
?>


<? foreach ($ar_resultidsect as $key => $itemidsec) { ?>
    <? if ($itemidsec != $arParams['IBLOCK_SECTION_ID']): ?>
        <? $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM");
        $arFilter = array(
            "IBLOCK_ID" => 126,
            "ACTIVE_DATE" => "Y",
            "ACTIVE" => "Y",
            'SECTION_ID' => $itemidsec,
            "PROPERTY_SERIYA_VALUE" => $arParams['SERIYA_VALUE'],
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

//url
if ($arParams['SERIYA_VALUE'] != '') {
    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "CODE");
    $arFilter = array(
        "IBLOCK_ID" => "129",
        "NAME" => $arParams['SERIYA_VALUE'],
        "ACTIVE" => "Y",
    );
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields_serii = $ob->GetFields();
        if ($arFields_serii['CODE'] != '') {
            $arResult['URL_SERII'] = '/serii/' . $arFields_serii['CODE'] . '/';
        }
    }
}

$arResult['ID'] = $ar_resultid;
$arResult['ID_SECT'] = $ar_resultidsect;
$arResult['ID_PR'] = $ar_resultid_pr;

$this->IncludeComponentTemplate();