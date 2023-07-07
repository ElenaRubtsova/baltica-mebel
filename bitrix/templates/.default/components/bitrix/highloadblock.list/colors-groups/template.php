<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ERROR']))
{
	echo $arResult['ERROR'];
	return false;
}

$newResult = array();
?>

<style>
    .accordion-wrap {
    }
    .text-right {
        text-align: right;
    }
    .accordion {}
    .accordion-card {}
    .accordion-card-header {}
    .accordion-card-body {}
    .row {}
    .row-colors {}
    /*.flex {
       display: flex;
       flex-wrap: wrap;
    }
    .flex > * {
        flex: 1 1 250px;
        margin: 10px;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 20px;
        padding: 10px;
    }*/
    .asingakub-gesoupem {
        --auto-grid-min-size: 11rem;

        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(var(--auto-grid-min-size), 10fr));
        grid-gap: 0rem;
        margin: 0rem;
        padding-left: 0;
        pointer-events: none;
        text-align: center;
    }
    .asingakub-gesoupem > * {
        transition: 300ms opacity, 300ms transform;
    }
    .kartochka {
        list-style: none;
        font-size: 17px;
    }
    .kartochka img {
        box-shadow: 0 2px 28px rgba(109, 109, 109, 0.36);
        border-radius: 5px;
    }
    .kartochka p {
        padding-top: 10px;
    }
</style>
<div class="accordion-wrap">
    <ul class="asingakub-gesoupem">
    <div class="kartochka">
        <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
             <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
        </a>
        <p>Желтый</p>
    </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
        <div class="kartochka">
            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>" data-fancybox="color-gallery-<?=$i++;?>>" data-caption="<?=$element['UF_NAME'];?>">
                <img src="/upload/resize_cache/webp/uf/067/067f744ce68064f0208817d0003f32b9.webp" alt="<?=$element['UF_NAME'];?>">
            </a>
            <p>Желтый</p>
        </div>
    </ul>
</div>
<?
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule("highloadblock");

// Получаем ID Highload блока
$hlblockId = 8;

// Получаем класс Highload блока по его ID
$hlblock = HighloadBlockTable::getById($hlblockId)->fetch();

if ($hlblock) {
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
        'UF_NAME' => ucfirst($element['UF_NAME']),
        'UF_FILE' => $file['SRC'],
    ];
}
$groups = array();
$rsType = CUserFieldEnum::GetList(array(), array(
    'ID' => array_keys($newResult)
));
foreach($rsType->arResult as $arType) {
    $groups[$arType['ID']] = $arType['VALUE'];
}
$arrResult = array_combine($groups, $newResult);
//pp($arrResult);?>

<h1>Материалы и цвета</h1>
<div class="accordion-wrap">
    <div class="text-right">
        <button type="button" class="btn btn-bordered btn-sm accordion-toogle">
            <span class="show">Раскрыть все</span>
            <span class="hide">Свернуть все</span>
        </button>
    </div>
    <div class="accordion">
        <? foreach ($arrResult as $group => $arrElements) { //pp($arrElements); ?>
        <div class="accordion-card">
            <div class="accordion-card-header" id="heading-<?=$group?>">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse-<?=$group?>"
                        aria-expanded="false" aria-controls="collapse-<?=$group?>">
                    <?=$group;?>
                    <sup class=""><?=count($arrElements);?> цветов</sup>
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
                    <div class="row row-colors">
                    <? $i = 0;//pp($arrElements);
                    foreach ($arrElements as $element) { ?>
                        <div class="color-item col-4 col-sm-2">
                        <?// Выводим данные элемента
                        //pp($element);
                            /*echo $element['UF_NAME'] . '<br>';
                            print_r($element['UF_GROUP']);echo '<br>';
                            echo 'file: '.$element['UF_FILE'] . '<br>';*/
                            /*$file = CFile::GetFileArray($element['UF_FILE']);
                            if ($file)
                                echo '<img src="' . $file . '" alt="'.$element['UF_NAME'].'">';
                            else
                                echo 'Файл не найден.';
                            echo '<br>'; */?>
                            <a class="image color-fancybox" href="<?=$element['UF_FILE']?>"
                               data-fancybox="color-gallery-<?=$i++;?>>"
                               data-caption="<?=$element['UF_NAME'];?>">
                                <img src="<?=$element['UF_FILE']?>" alt="<?=$element['UF_NAME'];?>"> <!--width="172" height="172"-->
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