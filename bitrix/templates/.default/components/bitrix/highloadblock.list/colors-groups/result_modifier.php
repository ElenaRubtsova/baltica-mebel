<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule("highloadblock");

function getGroupName($code) {
    $arGroup = array(
        "stoleshnici" => "Столешницы",
        "tkani" => "Ткани",
        "metall" => "Металл",
        "korpus" => "Корпус"
    );
    if ($arGroup[$code] == null)
        return $code;
    return $arGroup[$code];
}


$arResult = [];
function getArrResult_Groups() {

}

function getTkani() : array {//without UF_GROUP
    $group = 'tkani';
    /*--
    -- TSVETTKANI
    --*/
    $hlblockId = 9;
    $hlblock = HighloadBlockTable::getById($hlblockId)->fetch();
    if (!$hlblock) $arResult['ERROR'] = "Ошибка получения данных: инфоблок с индексом ". $hlblockId . "не найден";

    $entity = HighloadBlockTable::compileEntity($hlblock);
    $entityDataClass = $entity->getDataClass();

    $result = $entityDataClass::getList(array(
        'select' => array('UF_NAME', 'UF_FILE'),
        'order' => array('ID' => 'ASC'),
        'filter' => array('!UF_FILE' => false),
    ));

    $newResult = array();

    while ($element = $result->fetch()) {
        $file = CFile::GetFileArray($element['UF_FILE']);
        $newResult[$group][] = [
            'UF_NAME' => $element['UF_NAME'],
            'UF_FILE' => $file['SRC'],
        ];
    }

    return $newResult;
}

function getHlblockData($hlblockId, $group) : array {//without UF_GROUP
    $hlblock = HighloadBlockTable::getById($hlblockId)->fetch();
    if (!$hlblock) $arResult['ERROR'] = "Ошибка получения данных: инфоблок с индексом ". $hlblockId . "не найден";

    $entity = HighloadBlockTable::compileEntity($hlblock);
    $entityDataClass = $entity->getDataClass();

    $result = $entityDataClass::getList(array(
        'select' => array('UF_NAME', 'UF_FILE'),
        'order' => array('ID' => 'ASC'),
        'filter' => array('!UF_FILE' => false),
    ));

    $newResult = array();

    while ($element = $result->fetch()) {
        $file = CFile::GetFileArray($element['UF_FILE']);
        $newResult[$group][] = [
            'UF_NAME' => $element['UF_NAME'],
            'UF_FILE' => $file['SRC'],
        ];
    }

    return $newResult;
}

function getTsvetFasada()
{
    /*--
    -- TSVETFASADA
    --*/

    // Получаем ID Highload блока
    $hlblockId = 8;

    // Получаем класс Highload блока по его ID
    $hlblock = HighloadBlockTable::getById($hlblockId)->fetch();
    if (!$hlblock) {
        $arResult['ERROR'] = "Ошибка получения данных: инфоблок с индексом " . $hlblockId . "не найден";
    }

    // Получаем название таблицы Highload блока
    $entity = HighloadBlockTable::compileEntity($hlblock);
    $entityDataClass = $entity->getDataClass();

    // Выполняем выборку элементов
    $result = $entityDataClass::getList(array(
        'select' => array('UF_NAME', 'UF_GROUP', 'UF_FILE'), // Выбираем все поля элемента
        'order' => array('ID' => 'ASC'), // Сортировка по ID элемента
        'filter' => array('!UF_GROUP' => false, '!UF_FILE' => false), // Фильтр по элементам
    ));
    $newResult = array();

    // Обрабатываем результат выборки
    while ($element = $result->fetch()) {
        //pp($element['UF_GROUP']);
        //pp($element['UF_FILE']);
        $file = CFile::GetFileArray($element['UF_FILE']);
        /*pp($file);
        if ($file)
            echo '<img src="' . $file['SRC'] . '" alt="'.$element['UF_NAME'].'">';
        else
            echo 'Файл не найден.';
        echo '<br>';*/
        $newResult[$element['UF_GROUP']][] = [
            'UF_NAME' => $element['UF_NAME'],
            'UF_FILE' => $file['SRC'],
        ];
    }
    $groups = array();
    $rsType = CUserFieldEnum::GetList(array(), array(
        'ID' => array_keys($newResult)
    ));

    foreach ($rsType->arResult as $arType) {
        $groups[$arType['ID']] = $arType['VALUE'];
    }

    return array_combine($groups, $newResult);
}

function getNameColor($number): string
{
    $num = (int)substr((string)$number, -1);
    if ($num == 0 || ($num >= 5 && $num <= 9)) {
        $ending = 'цветов';
    } elseif ($num == 1) {
        $ending = 'цвет';
    } else {
        $ending = 'цвета';
    }
    return "{$number} {$ending}";
}

$arResult = array_merge($arResult, getTsvetFasada());
$arResult = array_merge($arResult, getTkani());
$arResult = array_merge($arResult, getHlblockData(22, "stoleshnici"));
$arResult = array_merge($arResult, getHlblockData(24, "metall"));
$arResult = array_merge($arResult, getHlblockData(7, "korpus"));