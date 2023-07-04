<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>

<? if ($arResult['ITEMS']): ?>
    <div class="content_wrapper_block lookbooks text-inside ">
        <div class="maxwidth-theme">
            <div class="item-views text_inside mobile-adaptive ">
                <div class="items row flexbox c_4 swipeignore mobile-overflow mobile-margin-16 mobile-compact">
                    <? foreach ($arResult['ITEMS'] as $arItem) {
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        $sUrl = $arItem['PROPERTIES']['URL']['VALUE'];
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-12--500  item-width-261">
                            <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="item hover_zoom" title="Двойной щелчок - Изменить элемент">
                                <? if ($sUrl): ?>
                                <a href="<?=$sUrl;?>" title="<?=($arItem['PREVIEW_PICTURE']['TITLE'] ? $arItem['PREVIEW_PICTURE']['TITLE'] : $arItem['NAME']);?>">
                                <? endif; ?>
                                    <div class="image rounded3 shine">
                                        <div class="img_inner">
                                            <span class="lazy rounded3 set-position center bg-fon-img darken-bg-animate"
                                                  data-src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                  style="background-image:url(<?=\Aspro\Functions\CAsproMax::showBlankImg($arItem['PREVIEW_PICTURE']['SRC']);?>)"></span>
                                        </div>
                                    </div>
                                    <div class="inner-text text-center">
                                        <div class="title-inner">
                                            <div class="title font_md">
                                                <?=$arItem['NAME'];?>
                                            </div>
                                        </div>
                                    </div>
                                <? if ($sUrl): ?>
                                </a>
                                <? endif; ?>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div> <!-- maxwidth-theme -->
    </div>
<? endif; ?>