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

function getPage($num, $arElements) {}

function echo_Elements($left, $right, $arElements) {
    for ($i = $left; $i < $right; $i++) {
        $element = $arElements[$i]; ?>
        <div class="kartochka">
            <a class="fancybox" href="<?=$element['UF_FILE']?>"
               data-fancybox="color-gallery"
               data-caption="<?=$element['UF_NAME'];?>">
                <img src="<?=$element['UF_FILE']?>" alt="<?=$element['UF_NAME'];?>" />
            </a>
            <p><?=$element['UF_NAME'];?></p>
        </div>
    <? }
}

function echo_Pagination($num, $max) { ?>
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
            <!--<div style="clear:both"></div>--> <?
}