<?
$object = new TrigranHLelementsDisplay([7,8,9,22,24,26]);

/*$result =[];
$keys = ['key1', 'key2', 'key3']; // Массив с ключами
$object->processKeys($result, $keys, 'value1');
$object->processKeys($result, $keys, 'value2');

$keys3 = ['key1', 'key2', 'key4']; // Массив с ключами
$object->processKeys($result, $keys3, 'value');
pp($result);*/
$arResult = $object->MakeArray();
//pp($object->arNameIds);
pp($arResult);

//словарь соответствия названия типа материала его значениям в разных HL блоках (UF_GROUP)
// pp($object->arMaterialNames);

//массив для вывода
 //pp($arResult);

function echoSubGroup() {

}
function echoGroup() {

}

//echo $object->GetCountResultByCategory('ЛДСП');

function echoElement($element, $groupId) { ?>
    <div class="col-xs-6 col-md-2">
        <div id="mat<?=$element["ID"]?>"
             class="mats-element bordered box-shadow">
            <a class="fancy dark_link js-notice-block__title font_sm"
               data-thumb="<?=$element["PREVIEW_SRC"]?>"
               data-fancybox="mats-gall-<?=$groupId?>"
               data-caption="<?=$element["UF_NAME"]?>"
               title="<?=$element["UF_NAME"]?>"
               href="<?=$element["IMG_SRC"]?>">
                <div class="mats-pict">
                    <img class="img-responsive"
                         src="<?=$element["PREVIEW_SRC"]?>">
                </div>

                <div class="mats-name">
                    <?=$element["UF_NAME"]?>
                </div>
            </a>
        </div>
    </div>
<?}
function echoElements($elements, $groupId) { ?>
<div class="row">
    <?foreach ($elements as $element) {
        echoElement($element, $groupId);
    }?>
</div>
<?
}
?>
<div class="row">
	<div class="col-md-12">
	<?foreach ($arResult as $name => $subs) {
        $count = $object->GetCountResultByCategory($name);
        if ($count != 0) {?>
			<div class="accordion-type-1">
				<div class="item-accordion-wrapper bordered box-shadow">
                    <?//=$name?>
                    <?//pp($object->arNameIds)?>
                    <? $groupId = $object->GetPropertyCodeByName($name);
                    if ($groupId!='') {?>

                    <div class="accordion-head colored_theme_hover_bg-block font_md accordion-close collapsed"
                         data-toggle="collapse" data-parent="#mats-accordion<?=$groupId?>"
                         href="#mats-accordion<?=$groupId?>">
						<span class="arrow_open pull-right colored_theme_hover_bg-el"></span>
						<span>
							<?=$name?>
						</span>
						<span class="element-count muted font_xs rounded3">
							<?=$count?>
						</span>
					</div>


                    <div id="mats-accordion<?=$groupId?>" class="panel-collapse collapse" style="height: 0px;">
						<div class="accordion-body">
							<div class="row">
                                <div class="col-md-12">
                                    <? foreach ($subs as $subName => $sub) { ?>
                                        <?//pp(is_array($material[0]));?>
                                        <?//pp($material)?>
                                        <?if (!is_array($sub[0])) {//Фрезеровки?>
                                            <?//pp($sub)?>
                                            <h3><?=$subName?></h3>
                                            <?foreach ($sub as $name => $group) {?>
                                                <h4><?=$name?></h4>
                                                <?echoElements($group, $groupId);?>
                                            <?}?>
                                        <?} else {?>
                                            <h3><?=$subName?></h3>
                                            <?echoElements($sub, $groupId);?>
                                        <?}?>
                                    <?}?>
                                </div>
							</div>
						</div><!--accordion-body-->
					</div><!--panel-collapse-->

                    <?}?>
				</div><!--item-accordion-wrapper-->
			</div><!--accordion-type-1-->
        <?}?>
	<?}?>
	</div>
</div>