<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	__IncludeLang($_SERVER["DOCUMENT_ROOT"].$templateFolder."/lang/".LANGUAGE_ID."/template.php");

use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\Localization\Loc;

global $arTheme;

$arBlockOrder = explode(",", $arParams["DETAIL_BLOCKS_ORDER"]);
$arTabOrder = explode(",", $arParams["DETAIL_BLOCKS_TAB_ORDER"]);

$bCombineStoresMode = ($arTheme['STORE_AMOUNT_VIEW']['VALUE'] == "COMBINE_AMOUNT");


if($arTheme['USE_DETAIL_TABS']['VALUE'] != 'Y')
	$arBlockOrder = explode(",", $arParams["DETAIL_BLOCKS_ALL_ORDER"]);
?>
<?if($arResult["ID"]):?>
	<?//tizers?>
	<?if($templateData['LINK_TIZERS'] && $arParams['IBLOCK_TIZERS_ID']):?>
		<?$GLOBALS['arrTizersFilter'] = array('ID' => $templateData['LINK_TIZERS']);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"front_tizers",
			array(
				"IBLOCK_TYPE" => "aspro_max_content",
				"IBLOCK_ID" => $arParams['IBLOCK_TIZERS_ID'],
				"NEWS_COUNT" => "4",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ID",
				"SORT_ORDER2" => "DESC",
				"SMALL_BLOCK" => "Y",
				"FILTER_NAME" => "arrTizersFilter",
				"FIELD_CODE" => array(
					0 => "PREVIEW_PICTURE",
					1 => "PREVIEW_TEXT",
					2 => "DETAIL_PICTURE",
					3 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "ICON",
					1 => "URL",
				),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => $arParams['CACHE_TYPE'],
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "N",
				"PREVIEW_TRUNCATE_LEN" => "250",
				"ACTIVE_DATE_FORMAT" => "d F Y",
				"SET_TITLE" => "N",
				"SHOW_DETAIL_LINK" => "N",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "ajax",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
				"PAGER_SHOW_ALL" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"COMPONENT_TEMPLATE" => "front_tizers",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_LAST_MODIFIED" => "N",
				"INCLUDE_SUBSECTIONS" => "Y",
				"STRICT_SECTION_CHECK" => "N",
				"TYPE_IMG" => "left",
				"CENTERED" => "Y",
				"SIZE_IN_ROW" => "4",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SHOW_404" => "N",
				"MESSAGE_404" => ""
			),
			false, array("HIDE_ICONS" => "Y")
		);?>
	<?endif;?>

	<?//sales?>
	<?if($templateData['LINK_SALES'] && $arParams['IBLOCK_LINK_SALE_ID']):?>
		<?ob_start()?>
			<?$GLOBALS['arrSalesFilter'] = array('ID' => $templateData['LINK_SALES']);?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"linked_sales",
				array(
					"IBLOCK_TYPE" => "aspro_max_content",
					"IBLOCK_ID" => $arParams['IBLOCK_LINK_SALE_ID'],
					"NEWS_COUNT" => "20",
					"SORT_BY1" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_BY2" => "ID",
					"SORT_ORDER2" => "DESC",
					"FILTER_NAME" => "arrSalesFilter",
					"FIELD_CODE" => array(
						0 => "NAME",
						1 => "DETAIL_PAGE_URL",
						3 => "DETAIL_TEXT",
					),
					"PROPERTY_CODE" => array(
						0 => "",
					),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => $arParams['CACHE_TYPE'],
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "Y",
					"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
					"CACHE_GROUPS" => "N",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_TITLE" => "N",
					"SET_STATUS_404" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "Y",
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"VIEW_TYPE" => "list",
					"IMAGE_POSITION" => "left",
					"COUNT_IN_LINE" => "3",
					"SHOW_TITLE" => "Y",
					"AJAX_OPTION_ADDITIONAL" => ""
				),
				false, array("HIDE_ICONS" => "Y")
			);?>
		<?$html=ob_get_clean();?>
		<?$APPLICATION->AddViewContent('PRODUCT_SIDE_INFO', $html, 100);?>
	<?endif;?>

	<?$i = 0;
	$templateData["STORES"]["SITE_ID"] = SITE_ID;
	$bShowDocs = ($templateData["FILES"]);
	$bShowAdditionalGallery = ($templateData["ADDITIONAL_GALLERY"]);
	$bShowDetailText = ($templateData['DETAIL_TEXT']);
	$bShowDetailTextTab = ($bShowDetailText || $bShowDocs || $bShowAdditionalGalleryTab ? ++$i : '');
	$bShowPropsTab = ($templateData['CHARACTERISTICS'] ? ++$i : '');
	$bShowVideoTab = (!empty($templateData['VIDEO']) || !empty($templateData['VIDEO_IFRAME']) ? ++$i : '');
	$bShowFaqTab = (!empty($templateData['LINK_FAQ']) ? ++$i : '');
	$bShowProjecTab = (!empty($templateData['LINK_PROJECTS']) ? ++$i : '');
	$bShowHowBuyTab = (($arParams["SHOW_HOW_BUY"] == "Y") ? ++$i : '');
	$bShowPaymentTab = (($arParams["SHOW_PAYMENT"] == "Y") ? ++$i : '');
	$bShowDeliveryTab = (($arParams["SHOW_DELIVERY"] == "Y") ? ++$i : '');
	$bShowCustomTab = (($arParams['SHOW_ADDITIONAL_TAB'] == 'Y') ? ++$i : '');
	$bShowStoresTab = ($templateData["STORES"]['USE_STORES'] && $templateData["STORES"]["STORES"] ? ++$i : '');
	$bShowReviewsTab = ( ($arParams["USE_REVIEW"] == "Y" && ($templateData["YM_ELEMENT_ID"] || IsModuleInstalled("forum")) ) ? ++$i : '');

	if($bShowPropsTab && $arParams["PROPERTIES_DISPLAY_LOCATION"] != "TAB")
		--$i;?>

	<?foreach($arBlockOrder as $code):?>
		<?//complect?>
		<?if($code == 'complect' && $templateData['CATALOG_SETS']['SET_ITEMS'] && $arParams['SHOW_KIT_PARTS'] == "Y"):?>
			<div class="ordered-block">
				<div class="ordered-block__title option-font-bold font_lg"><?=($arParams["T_KOMPLECT"] ? $arParams["T_KOMPLECT"] : Loc::getMessage('KOMPLECT_TITLE'));?></div>
				<div class="complect set_wrapp set_block bordered rounded3">
					<div class="row flexbox flexbox--row">
						<?foreach($templateData['CATALOG_SETS']["SET_ITEMS"] as $iii => $arSetItem):?>
							<div class="col-sm-3">
								<div class="item box-shadow">
									<div class="item_inner">
										<div class="image">
											<?$arSetItem["SET"] = "Y";?>
											<?\Aspro\Functions\CAsproMaxItem::showImg($arParams, $arSetItem, false);?>
											<?if($templateData['CATALOG_SETS']["SET_ITEMS_QUANTITY"]):?>
												<div class="quantity font_sxs">x<?=$arSetItem["QUANTITY"];?></div>
											<?endif;?>
										</div>
										<div class="item_info">
											<div class="item-title">
												<a href="<?=$arSetItem["DETAIL_PAGE_URL"]?>" class="dark_link font_xs"><span><?=$arSetItem["NAME"]?></span></a>
											</div>
											<?if($arParams["SHOW_KIT_PARTS_PRICES"] == "Y"):?>
												<div class="cost prices clearfix">
													<?
													$arCountPricesCanAccess = 0;
													foreach($arSetItem["PRICES"] as $key => $arPrice){
														if($arPrice["CAN_ACCESS"]){
															$arCountPricesCanAccess++;
														}
													}

													if($arSetItem["MEASURE"][$arSetItem["ID"]]["MEASURE"]["SYMBOL_RUS"])
														$strMeasure = $arSetItem["MEASURE"][$arSetItem["ID"]]["MEASURE"]["SYMBOL_RUS"];
													?>
													<?if(isset($arSetItem['PRICE_MATRIX']) && $arSetItem['PRICE_MATRIX']):?>
														<?
														// USE_PRICE_COUNT
														if(\CMax::GetFrontParametrValue('SHOW_POPUP_PRICE') == 'Y' && (count($arSetItem['PRICE_MATRIX']['ROWS']) > 1 || count($arSetItem['PRICE_MATRIX']['COLS']) > 1)){
															echo CMax::showPriceRangeTop($arSetItem, $arParams, Loc::getMessage("CATALOG_ECONOMY"));
														}
														echo CMax::showPriceMatrix($arSetItem, $arParams, $strMeasure, $arAddToBasketData);
														?>
													<?else:?>
														<?\Aspro\Functions\CAsproMaxItem::showItemPrices($arParams, $arSetItem["PRICES"], $strMeasure, $min_price_id, ($arParams["SHOW_DISCOUNT_PERCENT_NUMBER"] == "Y" ? "N" : "Y"));?>
													<?endif;?>
												</div>
											<?endif;?>
										</div>
									</div>
								</div>
								<?if($templateData['CATALOG_SETS']["SET_ITEMS"][$iii + 1]):?>
									<div class="separator"></div>
								<?endif;?>
							</div>
						<?endforeach;?>
					</div>
				</div>
			</div>
		<?//nabor?>
		<?elseif($code == 'nabor'):?>
			<?if($templateData['OFFERS_INFO']['OFFERS']):?>
				<?if($templateData['OFFERS_INFO']['OFFER_GROUP']):?>
					<?foreach($templateData['OFFERS_INFO']['OFFERS'] as $arOffer):?>
						<?if(!$arOffer['OFFER_GROUP']) continue;?>
						<span id="<?=$templateData['ID_OFFER_GROUP'].$arOffer['ID']?>" style="display: none;">
							<?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor", "main",
								array(
									"IBLOCK_ID" => $templateData['OFFERS_INFO']["OFFERS_IBLOCK"],
									"ELEMENT_ID" => $arOffer['ID'],
									"PRICE_CODE" => $arParams["PRICE_CODE"],
									"BASKET_URL" => $arParams["BASKET_URL"],
									"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
									"CACHE_TYPE" => $arParams["CACHE_TYPE"],
									"CACHE_TIME" => $arParams["CACHE_TIME"],
									"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
									"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
									"BUNDLE_ITEMS_COUNT" => $arParams["BUNDLE_ITEMS_COUNT"],
									"SHOW_MEASURE" => $arParams["SHOW_MEASURE"],
									"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
									"TITLE" => $arParams["T_NABOR"],
									"CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],
									"CURRENCY_ID" => $arParams["CURRENCY_ID"]
								), $component, array("HIDE_ICONS" => "Y")
							);?>
						</span>
					<?endforeach;?>
				<?endif;?>
			<?else:?>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor", "main",
					array(
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"ELEMENT_ID" => $arResult["ID"],
						"PRICE_CODE" => $arParams["PRICE_CODE"],
						"BASKET_URL" => $arParams["BASKET_URL"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
						"BUNDLE_ITEMS_COUNT" => $arParams["BUNDLE_ITEMS_COUNT"],
						"SHOW_MEASURE" => $arParams["SHOW_MEASURE"],
						"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
						"TITLE" => $arParams["T_NABOR"],
						"CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],
						"CURRENCY_ID" => $arParams["CURRENCY_ID"]
					), $component, array("HIDE_ICONS" => "Y")
				);?>
			<?endif;?>
		<?//tabs?>
		<?elseif($code == 'tabs'):?>
			<?if($bShowDetailTextTab || $bShowPropsTab || $bShowVideoTab || $bShowHowBuyTab || $bShowPaymentTab || $bShowDeliveryTab || $bShowStoresTab || $bShowCustomTab || $bShowReviewsTab):?>
				<div class="ordered-block js-store-scroll">
					<?if($i > 1):?>
						<div class="tabs arrow_scroll">
							<ul class="nav nav-tabs font_upper_md">
								<?$iTab = 0;?>
								<?foreach($arTabOrder as $value):?>
									<?//show desc block?>
									<?if($value == "desc"):?>
										<?/*if($bShowDetailTextTab || ($arParams["PROPERTIES_DISPLAY_LOCATION"] != "TAB" && $bShowPropsTab)):*/?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>"><a href="#desc" data-toggle="tab"><?=($arParams["T_DESC"] ? $arParams["T_DESC"] : Loc::getMessage("T_DESC"));?></a></li>
										<?/*endif;*/?>
									<?endif;?>
									<?//show char block?>
									<?/*if($value == "char"):?>
										<?if($bShowPropsTab && $arParams["PROPERTIES_DISPLAY_LOCATION"] == "TAB"):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>"><a href="#props" data-toggle="tab"><?=($arParams["T_CHARACTERISTICS"] ? $arParams["T_CHARACTERISTICS"] : Loc::getMessage("T_CHARACTERISTICS"));?></a></li>
										<?endif;?>
									<?endif;*/?>
									<?//show howbuy block?>
									<?if($value == "buy"):?>
										<?if($bShowHowBuyTab):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>"><a href="#buy" data-toggle="tab"><?=$arParams["TITLE_HOW_BUY"];?></a></li>
										<?endif;?>
									<?endif;?>
									<?//show payment block?>
									<?if($value == "payment"):?>
										<?if($bShowPaymentTab):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>"><a href="#payment" data-toggle="tab"><?=$arParams["TITLE_PAYMENT"];?></a></li>
										<?endif;?>
									<?endif;?>
									<?//show delivery block?>
									<?/*if($value == "delivery"):?>
										<?if($bShowDeliveryTab):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>"><a href="#delivery" data-toggle="tab"><?=$arParams["TITLE_DELIVERY"];?></a></li>
										<?endif;?>
									<?endif;*/?>
									<?//show stores block?>
									<?if($value == "stores"):?>
										<?if($bShowStoresTab):?>




											<li class="bordered rounded3 st_nal <?if ($templateData['TOTAL_COUNT'] == 0) {?>di_non <?}?><?=(!($iTab++) ? 'active' : '')?>"><a href="#stores" data-toggle="tab"><?=$arParams["TAB_STOCK_NAME"];?></a></li>
										<?endif;?>
									<?endif;?>
									<?//show custom_tab block?>
									<?if($value == "custom_tab"):?>
										<?if($bShowCustomTab):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>"><a href="#custom_tab" data-toggle="tab"><?=$arParams["TAB_DOPS_NAME"];?></a></li>
										<?endif;?>
									<?endif;?>
									<?//show reviews block?>
									<?if($value == "reviews"):?>
										<?if($bShowReviewsTab):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>">
												<a href="#reviews" data-toggle="tab"><?=$arParams["TAB_REVIEW_NAME"];?><?$APPLICATION->ShowViewContent('PRODUCT_REVIWS_COUNT_INFO')?></a></li>
										<?endif;?>
									<?endif;?>
									<?//show video block?>
									<?if($value == "video"):?>
										<?if($bShowVideoTab):?>
											<li class="bordered rounded3 <?=(!($iTab++) ? 'active' : '')?>">
												<a href="#video" data-toggle="tab">
													<?=$arParams["TAB_VIDEO_NAME"];?>
													<?if(count($templateData["VIDEO"]) > 1):?>
														<span class="count empty">&nbsp;(<?=count($templateData["VIDEO"])?>)</span>
													<?endif;?>
												</a>
											</li>
										<?endif;?>
									<?endif;?>
								<?endforeach;?>
							</ul>
						</div>
					<?endif;?>
					<div class="tab-content<?=($i <= 1 ? ' not_tabs' : '')?>">
						<?$iTab = 0;?>
						<?foreach($arTabOrder as $value):?>
							<?//detail text?>
							<?if($value == "desc"):?>
								<?/*if($bShowDetailTextTab || ($arParams["PROPERTIES_DISPLAY_LOCATION"] != "TAB" && $bShowPropsTab)):*/?>
									<div class="tab-pane <?=(!($iTab++) ? 'active' : '')?>" id="desc">
										
										<?if($arParams["PROPERTIES_DISPLAY_LOCATION"] != "TAB" && $bShowPropsTab):?>
											<div class="ordered-block">
												<div class="ordered-block__title option-font-bold font_lg">
													<?=($arParams["T_CHARACTERISTICS"] ? $arParams["T_CHARACTERISTICS"] : Loc::getMessage("T_CHARACTERISTICS"));?>
												</div>
												<?$APPLICATION->ShowViewContent('PRODUCT_PROPS_INFO')?>
											</div>
										<?endif;?>
										<?if($bShowDetailText):?>
											<?if($i == 1):?>

												<div class="ordered-block__title option-font-bold font_lg xpandable-block">
													<?=($arParams["T_DESC"] ? $arParams["T_DESC"] : Loc::getMessage("T_DESC"));?>
												</div>

											<?endif;?>
											<input type="checkbox" class="read-more-checker" id="read-more-checker" />
											<div class="limiter">
												<?$APPLICATION->ShowViewContent('PRODUCT_DETAIL_TEXT_INFO')?>
												 <div class="bottom"></div>
											</div>
											<label for="read-more-checker" class="read-more-button"></label>
										<?endif;?>
										<?if($bShowDocs):?>
											<div class="ordered-block">
												<div class="ordered-block__title option-font-bold font_lg">
													<?=$arParams["BLOCK_DOCS_NAME"];?>
												</div>
												<?$APPLICATION->ShowViewContent('PRODUCT_FILES_INFO')?>
											</div>
										<?endif;?>
										<?if($bShowAdditionalGallery):?>
											<?$APPLICATION->ShowViewContent('PRODUCT_ADDITIONAL_GALLERY_INFO')?>
										<?endif;?>
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=($arParams["T_CHARACTERISTICS"] ? $arParams["T_CHARACTERISTICS"] : Loc::getMessage("T_CHARACTERISTICS"));?>
											</div>
										<?endif;?>
										<div class="hact">
										<?$APPLICATION->ShowViewContent('PRODUCT_PROPS_INFO')?>
										<?$prop=CIBlockElement::GetByID($arResult['ID'])->GetNextElement()->GetProperties();?>
										</div>
<?foreach($prop['FILES']['VALUE'] as $key => $file_now_m){?>
	<?$arFilenow = CFile::GetFileArray($file_now_m);?>
	<?if($arFilenow['CONTENT_TYPE'] == 'application/pdf'):?>
		<a class="instr" download href="<?=$arFilenow['SRC'];?>">
			<img src="<?=SITE_TEMPLATE_PATH?>/images/pdf.png">
			<span>Инструкция по сборке</span>
		</a>
	<?endif;?>
<?}?>
									</div>
								<?/*ifendif;*/?>
							<?endif;?>
							<?//props?>
							<?/*if($value == "char"):?>
								<?if($bShowPropsTab && $arParams["PROPERTIES_DISPLAY_LOCATION"] == "TAB"):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="props">
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=($arParams["T_CHARACTERISTICS"] ? $arParams["T_CHARACTERISTICS"] : Loc::getMessage("T_CHARACTERISTICS"));?>
											</div>
										<?endif;?>
										<?$APPLICATION->ShowViewContent('PRODUCT_PROPS_INFO')?>
									</div>
								<?endif;?>
							<?endif;*/?>
							<?//how buy?>
							<?if($value == "buy"):?>
								<?if($bShowHowBuyTab):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="buy">
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TITLE_HOW_BUY"];?>
											</div>
										<?endif;?>
										<?$APPLICATION->ShowViewContent('PRODUCT_HOW_BUY_INFO')?>
									</div>
								<?endif;?>
							<?endif;?>
							<?//payment?>
							<?if($value == "payment"):?>
								<?if($bShowPaymentTab):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="payment">
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TITLE_PAYMENT"];?>
											</div>
										<?endif;?>
										<?$APPLICATION->ShowViewContent('PRODUCT_PAYMENT_INFO')?>

										<?$APPLICATION->ShowViewContent('PRODUCT_DELIVERY_INFO')?>
									</div>

								<?endif;?>
							<?endif;?>
							<?//delivery?>
							<?/*if($value == "delivery"):?>
								<?if($bShowDeliveryTab):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="delivery">
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TITLE_DELIVERY"];?>
											</div>
										<?endif;?>
										<?$APPLICATION->ShowViewContent('PRODUCT_DELIVERY_INFO')?>
									</div>
								<?endif;?>
							<?endif;*/?>
							<?//custom_tab?>
							<?if($value == "custom_tab"):?>
								<?if($bShowCustomTab):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="custom_tab">
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TAB_DOPS_NAME"];?>
											</div>
										<?endif;?>
										<?$APPLICATION->ShowViewContent('PRODUCT_CUSTOM_TAB_INFO')?>
										<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"where-to-buy",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COMPONENT_TEMPLATE" => "where-to-buy",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "131",
		"IBLOCK_TYPE" => "New_template",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE",
		"CUSTOM_SECTION_SORT" => array("UF_SORT" => "DESC"),
	)
);?>
									</div>
								<?endif;?>
							<?endif;?>
							<?//show video block?>
							<?if($value == "video"):?>
								<?if($bShowVideoTab):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="video">
										<?if($i == 1):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TAB_VIDEO_NAME"];?>
											</div>
										<?endif;?>
										<?$APPLICATION->ShowViewContent('PRODUCT_VIDEO_INFO')?>
									</div>
								<?endif;?>
							<?endif;?>
							<?//show stores block?>
							<?if($value == "stores"):?>
								<?if($bShowStoresTab):?>
									<div class="tab-pane <?=$value;?> <?=(!($iTab++) ? 'active' : '')?>" id="stores">
										<?if($i == 1 || $bCombineStoresMode):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TAB_STOCK_NAME"];?>
											</div>
										<?endif;?>
										<div class="stores_tab">
											<div class="loading_block"><div class="loading_block_content"></div></div>
										</div>
									</div>
								<?endif;?>
							<?endif;?>
							<?//show reviews block?>
							<?if($value == "reviews"):?>
								<?if($bShowReviewsTab):?>
									<div class="tab-pane <?=$value;?> <?=$arParams['REVIEWS_VIEW']?> <?=(!($iTab++) ? 'active' : '')?>" id="reviews">
										<?if($i == 1 && $arParams['REVIEWS_VIEW'] == 'STANDART'):?>
											<div class="ordered-block__title option-font-bold font_lg">
												<?=$arParams["TAB_REVIEW_NAME"];?>
											</div>
										<?endif;?>
										<div id="reviews_content" class="<?=$arParams['REVIEWS_VIEW'] == 'EXTENDED' ? '' : 'bordered rounded3'?>">
											<?if($templateData["YM_ELEMENT_ID"]):?>
												<?$APPLICATION->IncludeComponent(
													"aspro:api.yamarket.reviews_model.max",
													"main",
													Array(
														"YANDEX_MODEL_ID" => $templateData["YM_ELEMENT_ID"]
													)
												);?>
											<?elseif(IsModuleInstalled("forum") && $arParams['REVIEWS_VIEW'] == 'STANDART'):?>
												<?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area");?>
													<?$APPLICATION->IncludeComponent(
														"bitrix:forum.topic.reviews",
														"main",
														Array(
															"CACHE_TYPE" => $arParams["CACHE_TYPE"],
															"CACHE_TIME" => $arParams["CACHE_TIME"],
															"MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
															"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
															"FORUM_ID" => $arParams["FORUM_ID"],
															"ELEMENT_ID" => $arResult["ID"],
															"IBLOCK_ID" => $arParams["IBLOCK_ID"],
															"AJAX_POST" => $arParams["REVIEW_AJAX_POST"],
															"SHOW_RATING" => "N",
															"SHOW_MINIMIZED" => "Y",
															"SECTION_REVIEW" => "Y",
															"POST_FIRST_MESSAGE" => "Y",
															"MINIMIZED_MINIMIZE_TEXT" => GetMessage("HIDE_FORM"),
															"MINIMIZED_EXPAND_TEXT" => GetMessage("ADD_REVIEW"),
															"SHOW_AVATAR" => "N",
															"SHOW_LINK_TO_FORUM" => "N",
															"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
														),	false
													);?>
												<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "");?>
											<?elseif(IsModuleInstalled("blog") && $arParams['REVIEWS_VIEW'] == 'EXTENDED' && ($arParams['USE_REVIEW'] == 'Y' || $arParams["DETAIL_USE_COMMENTS"] == 'Y') ):?>
												<div class="ordered-block__title option-font-bold font_lg">
													<?=$arParams["TAB_REVIEW_NAME"];?>
													<span class="element-count-wrapper">
														<span class="element-count muted font_xs rounded3" style="display: none;">
														</span>
													</span>
												</div>
												<div class="right_reviews_info">
													<div class="rating-wrapper">
														<div class="votes_block nstar with-text">
															<div class="ratings">
																<div class="inner_rating">
																	<?for($i=1;$i<=5;$i++):?>
																		<div class="item-rating"><?=CMax::showIconSvg("star", SITE_TEMPLATE_PATH."/images/svg/catalog/star_small.svg");?></div>
																	<?endfor;?>
																</div>
															</div>
														</div>
														<div class="rating-value">
															<span class="count"></span>
															<span class="maximum_value"><?=Loc::getMessage("VOTES_RESULT_NONE")?></span>
														</div>
													</div>
													<div class="show-comment btn btn-xs btn-default">
														<?=GetMessage('ADD_REVIEW')?>
													</div>
												</div>
												<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/rating_likes.js"); ?>
												<?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area");?>
												<?ob_start()?>
													<?$APPLICATION->IncludeComponent(
														"bitrix:catalog.comments",
														"catalog",
														array(
															'CACHE_TYPE' => $arParams['CACHE_TYPE'],
															'CACHE_TIME' => $arParams['CACHE_TIME'],
															'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
															"COMMENTS_COUNT" => (isset($arParams["MESSAGES_PER_PAGE"]) ? $arParams["MESSAGES_PER_PAGE"] : $arParams['COMMENTS_COUNT']),
															"ELEMENT_CODE" => "",
															"ELEMENT_ID" => $arResult["ID"],
															"IBLOCK_ID" => $arParams["IBLOCK_ID"],
															"IBLOCK_TYPE" => "aspro_max_catalog",
															"SHOW_DEACTIVATED" => "N",
															"TEMPLATE_THEME" => "blue",
															"URL_TO_COMMENT" => "",
															"AJAX_POST" => "Y",
															"WIDTH" => "",
															"COMPONENT_TEMPLATE" => ".default",
															"BLOG_USE" => 'Y',
															"PATH_TO_SMILE" => '/bitrix/images/blog/smile/',
															"EMAIL_NOTIFY" => $arParams["DETAIL_BLOG_EMAIL_NOTIFY"],
															"SHOW_SPAM" => "Y",
															"SHOW_RATING" => "Y",
															"RATING_TYPE" => "like_graphic_catalog_reviews",
															"MAX_IMAGE_SIZE" => $arParams["MAX_IMAGE_SIZE"],
															"BLOG_URL" => $arParams["BLOG_URL"],
														),
														false, array("HIDE_ICONS" => "Y")
													);?>
													<?=\Aspro\Functions\CAsproMax::showComments(1)?>
													<?$html=ob_get_clean();?>
													<?if($html && strpos($html, 'error') === false):?>
														<div class="ordered-block comments-block">
															<?=$html;?>
														</div>
														<div class="line-after"></div>
													<?endif;?>

												<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "");?>
											<?endif;?>
										</div>
									</div>
								<?endif;?>
							<?endif;?>
						<?endforeach;?>
					</div>

					
<?/* global $USER;
if ($USER->IsAdmin()) {
    echo "<pre>";
    print_r($arResult);
    echo "</pre>";
}*/?>







<?/*if($prop['FILES']['VALUE'][0] != ""):?>
<?$arFile = CFile::GetFileArray($prop['FILES']['VALUE'][0]);?>

	<a class="instr" download href="<?=$arFile['SRC'];?>">
		<img src="/local/templates/aspro_max/images/pdf.png">
		<span>Инструкция по сборке</span>
	</a>

<? global $USER;
if ($USER->IsAdmin()) {
    echo "<pre>";
    print_r($arFile['CONTENT_TYPE'] == 'application/pdf');
    echo "</pre>";
}?>

<?endif;*/?>




<?if($prop['FILLING_ACCESSORIES']['VALUE'] != ""):?>
<?
global $arrCatalogFilter1;
$arrCatalogFilter1 = array(property_CML2_ARTICLE => $prop['FILLING_ACCESSORIES']['VALUE']);
?>
<h2 id="napolnenie">Наполнение и аксессуары</h2>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"catalog_simple",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
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
		"COMPONENT_TEMPLATE" => "catalog_simple",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
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
		"FILTER_NAME" => "arrCatalogFilter1",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "126",
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "4",
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
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => array(0=>"DL",1=>"TSVET_TKANI",2=>"COLOR_REF",3=>"SIZES_SHOES",4=>"SIZES_CLOTHES",5=>"",),
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
		"PRICE_CODE" => array(0=>"ИМ Балтика Мебель",1=>"ИМ Балтика Мебель акционная",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(0=>"",1=>"NEWPRODUCT",2=>"",),
		"PROPERTY_CODE_MOBILE" => "",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
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
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?>
<?endif;?>




<? $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'],'ID'=>$arResult['IBLOCK_SECTION_ID'], 'GLOBAL_ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(Array(), $arFilter, false, Array("UF_STOVAR"));
if($UF_STOVAR = $db_list->GetNext()):
    $UFSTOVAR=$UF_STOVAR["UF_STOVAR"]; 
endif;?>

<?
$arSelect = Array("ID","SHOW_COUNTER","catalog_PRICE_8");
$arFilter = Array("IBLOCK_ID"=> $arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=> $UFSTOVAR[0], "ACTIVE"=>"Y", ">CATALOG_PRICE_8" => 0);
$res = CIBlockElement::GetList(Array("catalog_PRICE_8"=>"asc","SHOW_COUNTER"=>"asc"), $arFilter, false, Array("nPageSize"=>3), $arSelect);
while($ob = $res->GetNextElement()){
 $arFields = $ob->GetFields();
  $arrCatalogFilter2_1[] = $arFields['ID'];
}

$arSelect = Array("ID","SHOW_COUNTER","catalog_PRICE_8");
$arFilter = Array("IBLOCK_ID"=> $arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=> $UFSTOVAR[1], "ACTIVE"=>"Y", ">CATALOG_PRICE_8" => 0);
$res = CIBlockElement::GetList(Array("catalog_PRICE_8"=>"asc","SHOW_COUNTER"=>"asc"), $arFilter, false, Array("nPageSize"=>3), $arSelect);
while($ob = $res->GetNextElement()){
 $arFields = $ob->GetFields();
  $arrCatalogFilter2_2[] = $arFields['ID'];
}

$arSelect = Array("ID","SHOW_COUNTER","catalog_PRICE_8");
$arFilter = Array("IBLOCK_ID"=> $arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=> $UFSTOVAR[2], "ACTIVE"=>"Y", ">CATALOG_PRICE_8" => 0);
$res = CIBlockElement::GetList(Array("catalog_PRICE_8"=>"asc","SHOW_COUNTER"=>"asc"), $arFilter, false, Array("nPageSize"=>3), $arSelect);
while($ob = $res->GetNextElement()){
 $arFields = $ob->GetFields();
  $arrCatalogFilter2_3[] = $arFields['ID'];
}

$arSelect = Array("ID");
$arFilter = Array("IBLOCK_ID"=> $arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=> $UFSTOVAR[3], "ACTIVE"=>"Y", ">CATALOG_PRICE_8" => 0);
$res = CIBlockElement::GetList(Array("catalog_PRICE_8"=>"asc","SHOW_COUNTER"=>"asc"), $arFilter, false, Array("nPageSize"=>3), $arSelect);
while($ob = $res->GetNextElement()){
 $arFields = $ob->GetFields();
  $arrCatalogFilter2_4[] = $arFields['ID'];
}

$arrCatalogFilter2_V1[] = $arrCatalogFilter2_1[0];		
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_2[0];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_3[0];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_4[0];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_1[1];		
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_2[1];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_3[1];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_4[1];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_1[2];		
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_2[2];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_3[2];
$arrCatalogFilter2_V1[] = $arrCatalogFilter2_4[2];


$arrCatalogFilter2_V2[] = $arrCatalogFilter2_1[1];
$arrCatalogFilter2_V2[] = $arrCatalogFilter2_2[1];
$arrCatalogFilter2_V2[] = $arrCatalogFilter2_3[1];
$arrCatalogFilter2_V2[] = $arrCatalogFilter2_4[1];
$arrCatalogFilter2_V3[] = $arrCatalogFilter2_1[2];
$arrCatalogFilter2_V3[] = $arrCatalogFilter2_2[2];
$arrCatalogFilter2_V3[] = $arrCatalogFilter2_3[2];
$arrCatalogFilter2_V3[] = $arrCatalogFilter2_4[2];
?>

<?if($UFSTOVAR != ""):?>

<?
global $arrCatalogFilter2V1;
global $arrCatalogFilter2V2;
global $arrCatalogFilter2V3;
$arrCatalogFilter2V1 = array(ID => $arrCatalogFilter2_V1);
$arrCatalogFilter2V2 = array(ID => $arrCatalogFilter2_V2);
$arrCatalogFilter2V3 = array(ID => $arrCatalogFilter2_V3);

//var_dump($arrCatalogFilter2V1);
?>


<?/*

<h2>С этим товаром покупают:</h2>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"catalog_simple_new",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
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
		"COMPONENT_TEMPLATE" => "catalog_simple",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DATA_LAYER_NAME" => "dataLayer",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "",
		"ELEMENT_SORT_ORDER2" => "",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "-",
		"FILTER_NAME" => "arrCatalogFilter2V1",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "126",
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "4",
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
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => array(0=>"DL",1=>"TSVET_TKANI",2=>"COLOR_REF",3=>"SIZES_SHOES",4=>"SIZES_CLOTHES",5=>"",),
		"OFFERS_SORT_FIELD" => "",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER" => "",
		"OFFERS_SORT_ORDER2" => "",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "12",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(0=>"ИМ Балтика Мебель",1=>"ИМ Балтика Мебель акционная",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(0=>"",1=>"NEWPRODUCT",2=>"",),
		"PROPERTY_CODE_MOBILE" => "",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
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
		"USE_PRODUCT_QUANTITY" => "N"
	)
);*/?>
<?/*$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"catalog_simple",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
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
		"COMPONENT_TEMPLATE" => "catalog_simple",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DATA_LAYER_NAME" => "dataLayer",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "",
		"ELEMENT_SORT_ORDER2" => "",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "-",
		"FILTER_NAME" => "arrCatalogFilter2V2",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "126",
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "4",
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
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => array(0=>"DL",1=>"TSVET_TKANI",2=>"COLOR_REF",3=>"SIZES_SHOES",4=>"SIZES_CLOTHES",5=>"",),
		"OFFERS_SORT_FIELD" => "",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER" => "",
		"OFFERS_SORT_ORDER2" => "",
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
		"PRICE_CODE" => array(0=>"ИМ Балтика Мебель",1=>"ИМ Балтика Мебель акционная",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(0=>"",1=>"NEWPRODUCT",2=>"",),
		"PROPERTY_CODE_MOBILE" => "",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
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
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"catalog_simple",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
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
		"COMPONENT_TEMPLATE" => "catalog_simple",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DATA_LAYER_NAME" => "dataLayer",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "",
		"ELEMENT_SORT_ORDER2" => "",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "-",
		"FILTER_NAME" => "arrCatalogFilter2V3",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "126",
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "4",
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
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => array(0=>"DL",1=>"TSVET_TKANI",2=>"COLOR_REF",3=>"SIZES_SHOES",4=>"SIZES_CLOTHES",5=>"",),
		"OFFERS_SORT_FIELD" => "",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER" => "",
		"OFFERS_SORT_ORDER2" => "",
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
		"PRICE_CODE" => array(0=>"ИМ Балтика Мебель",1=>"ИМ Балтика Мебель акционная",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(0=>"",1=>"NEWPRODUCT",2=>"",),
		"PROPERTY_CODE_MOBILE" => "",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
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
		"USE_PRODUCT_QUANTITY" => "N"
	)
	);*/?>
<?endif;?>










				</div>
			<?endif;?>
		<?//offers?>
		<?elseif($code == 'offers' && $templateData["OFFERS_INFO"]["OFFERS_MORE"]):?>
			<div class="ordered-block js-offers-scroll <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TAB_OFFERS_NAME"];?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_OFFERS_INFO')?>
			</div>
		<?//detail text?>
		<?elseif($code == 'desc' && $bShowDetailTextTab):?>
			<?if($bShowDetailText):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=($arParams["T_DESC"] ? $arParams["T_DESC"] : Loc::getMessage("T_DESC"));?>
					</div>
					<?$APPLICATION->ShowViewContent('PRODUCT_DETAIL_TEXT_INFO')?>
				</div>
			<?endif;?>
			<?//docs?>
			<?if($bShowDocs):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["BLOCK_DOCS_NAME"];?>
					</div>
					<?$APPLICATION->ShowViewContent('PRODUCT_FILES_INFO')?>
				</div>
			<?endif;?>
		<?//props?>
		<?elseif($code == 'char' && $bShowPropsTab):?>
			<div class="ordered-block <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=($arParams["T_CHARACTERISTICS"] ? $arParams["T_CHARACTERISTICS"] : Loc::getMessage("T_CHARACTERISTICS"));?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_PROPS_INFO')?>
			</div>
		<?//howbuy?>
		<?elseif($code == 'buy' && $bShowHowBuyTab):?>
			<div class="ordered-block <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TITLE_HOW_BUY"];?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_HOW_BUY_INFO')?>
			</div>
		<?//payment?>
		<?elseif($code == 'payment' && $bShowPaymentTab):?>
			<div class="ordered-block <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TITLE_PAYMENT"];?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_PAYMENT_INFO')?>
			</div>
		<?//delivery?>
		<?elseif($code == 'delivery' && $bShowDeliveryTab):?>
			<div class="ordered-block <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TITLE_DELIVERY"];?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_DELIVERY_INFO')?>
			</div>
		<?//show video block?>
		<?elseif($code == "video" && $bShowVideoTab):?>
			<div class="ordered-block <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TAB_VIDEO_NAME"];?>
					<?if(count($templateData["VIDEO"]) > 1):?>
						<span class="count empty">&nbsp;(<?=count($templateData["VIDEO"])?>)</span>
					<?endif;?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_VIDEO_INFO')?>
			</div>
		<?//show reviews block?>
		<?elseif($code == "reviews" && $bShowReviewsTab):?>
			<div class="ordered-block <?=$code?> <?=$arParams['REVIEWS_VIEW']?>">
				<?if($arParams['REVIEWS_VIEW'] == 'EXTENDED'):?>
					<div class="reviews-title__wrapper">

						<div class="ordered-block__title option-font-bold font_lg">
							<?=$arParams["TAB_REVIEW_NAME"];?>
							<span class="element-count-wrapper">
								<span class="element-count muted font_xs rounded3" style="display: none;">
								</span>
							</span>
						</div>

						<div class="right_reviews_info">
							<div class="rating-wrapper" style="display: none;">
								<div class="votes_block nstar with-text">
									<div class="ratings">
										<div class="inner_rating">
											<?for($i=1;$i<=5;$i++):?>
												<div class="item-rating"><?=CMax::showIconSvg("star", SITE_TEMPLATE_PATH."/images/svg/catalog/star_small.svg");?></div>
											<?endfor;?>
										</div>
									</div>
								</div>
								<div class="rating-value">
									<span class="count"></span>
									<span class="maximum_value">/5</span>
								</div>
							</div>
							<div class="show-comment btn btn-xs btn-default">
								<?=GetMessage('ADD_REVIEW')?>
							</div>
						</div>

					</div>
				<?else:?>
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["TAB_REVIEW_NAME"];?>
					</div>
				<?endif?>
				<div id="reviews_content" class="<?=$arParams['REVIEWS_VIEW'] == 'EXTENDED' ? '' : 'bordered rounded3'?>">
					<?if($templateData["YM_ELEMENT_ID"]):?>
						<?$APPLICATION->IncludeComponent(
							"aspro:api.yamarket.reviews_model.max",
							"main",
							Array(
								"YANDEX_MODEL_ID" => $templateData["YM_ELEMENT_ID"]
							)
						);?>
					<?elseif(IsModuleInstalled("forum") && $arParams['REVIEWS_VIEW'] == 'STANDART'):?>
						<?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area");?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:forum.topic.reviews",
								"main",
								Array(
									"CACHE_TYPE" => $arParams["CACHE_TYPE"],
									"CACHE_TIME" => $arParams["CACHE_TIME"],
									"MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
									"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
									"FORUM_ID" => $arParams["FORUM_ID"],
									"ELEMENT_ID" => $arResult["ID"],
									"IBLOCK_ID" => $arParams["IBLOCK_ID"],
									"AJAX_POST" => $arParams["REVIEW_AJAX_POST"],
									"SHOW_RATING" => "N",
									"SHOW_MINIMIZED" => "Y",
									"SECTION_REVIEW" => "Y",
									"POST_FIRST_MESSAGE" => "Y",
									"MINIMIZED_MINIMIZE_TEXT" => GetMessage("HIDE_FORM"),
									"MINIMIZED_EXPAND_TEXT" => GetMessage("ADD_REVIEW"),
									"SHOW_AVATAR" => "N",
									"SHOW_LINK_TO_FORUM" => "N",
									"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
								),	false
							);?>
						<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "");?>
					<?elseif(IsModuleInstalled("blog") && $arParams['REVIEWS_VIEW'] == 'EXTENDED' && ($arParams['USE_REVIEW'] == 'Y' || $arParams["DETAIL_USE_COMMENTS"] == 'Y') ):?>
						<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/rating_likes.js"); ?>
						<?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area");?>
						<?ob_start()?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:catalog.comments",
								"catalog",
								array(
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME'],
									'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
									"COMMENTS_COUNT" => (isset($arParams["MESSAGES_PER_PAGE"]) ? $arParams["MESSAGES_PER_PAGE"] : $arParams['COMMENTS_COUNT']),
									"ELEMENT_CODE" => "",
									"ELEMENT_ID" => $arResult["ID"],
									"IBLOCK_ID" => $arParams["IBLOCK_ID"],
									"IBLOCK_TYPE" => "aspro_max_catalog",
									"SHOW_DEACTIVATED" => "N",
									"TEMPLATE_THEME" => "blue",
									"URL_TO_COMMENT" => "",
									"AJAX_POST" => "Y",
									"WIDTH" => "",
									"COMPONENT_TEMPLATE" => "catalog",
									"BLOG_USE" => 'Y',
									"PATH_TO_SMILE" => '/bitrix/images/blog/smile/',
									"EMAIL_NOTIFY" => $arParams["DETAIL_BLOG_EMAIL_NOTIFY"],
									"SHOW_SPAM" => "Y",
									"SHOW_RATING" => "Y",
									"RATING_TYPE" => "like_graphic_catalog_reviews",
									'SORT_PROP' => $_COOKIE['REVIEW_SORT_PROP'] ? $_COOKIE['REVIEW_SORT_PROP'] : 'UF_ASPRO_COM_RATING',
									'SORT_ORDER' => $_COOKIE['REVIEW_SORT_ORDER'] ? $_COOKIE['REVIEW_SORT_ORDER'] : 'SORT_DESC',
									"BLOG_URL" => $arParams["BLOG_URL"],
								),
								false, array("HIDE_ICONS" => "Y")
							);?>
							<?=\Aspro\Functions\CAsproMax::showComments()?>
							<?$html=ob_get_clean();?>
							<?if($html && strpos($html, 'error') === false):?>
								<div class="ordered-block comments-block">
									<?=$html;?>
								</div>
								<div class="line-after"></div>
							<?endif;?>

						<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "");?>
					<?endif;?>
				</div>
			</div>
		<?//custom_tab?>
		<?elseif($code == 'custom_tabs' && $bShowCustomTab):?>
			<div class="ordered-block <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TAB_DOPS_NAME"];?>
				</div>
				<?$APPLICATION->ShowViewContent('PRODUCT_CUSTOM_TAB_INFO')?>
			</div>
		<?//gifts?>
		<?elseif($code == 'gifts'):?>
			<?$APPLICATION->ShowViewContent('PRODUCT_GIFT_INFO')?>
		<?//stores?>
		<?elseif($code == 'stores' && $bShowStoresTab):?>
			<div class="ordered-block js-store-scroll <?=$code?>">
				<div class="ordered-block__title option-font-bold font_lg">
					<?=$arParams["TAB_STOCK_NAME"];?>
				</div>
				<div class="stores_tab">
					<div class="loading_block"><div class="loading_block_content"></div></div>
				</div>
			</div>
		<?//services?>
		<?elseif($code == 'services' && $templateData['LINK_SERVICES']):?>
			<?ob_start();?>
				<?$GLOBALS['arrServicesFilter'] = array('ID' => $templateData['LINK_SERVICES']);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"news-list",
					array(
						"IBLOCK_TYPE" => "aspro_max_content",
						"IBLOCK_ID" => $arParams['IBLOCK_SERVICES_ID'],
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "ID",
						"SORT_ORDER2" => "DESC",
						"FILTER_NAME" => "arrServicesFilter",
						"FIELD_CODE" => array(
							0 => "NAME",
							1 => "DETAIL_PAGE_URL",
							2 => "PREVIEW_TEXT",
							3 => "PREVIEW_PICTURE",
						),
						"PROPERTY_CODE" => array(
							0 => "",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => $arParams['CACHE_TYPE'],
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "Y",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"CACHE_GROUPS" => "N",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "�������",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"VIEW_TYPE" => "list",
						"IMAGE_POSITION" => "left",
						"COUNT_IN_LINE" => "3",
						"SHOW_TITLE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"BORDERED" => "Y",
						"LINKED_MODE" => "Y",
					),
					false, array("HIDE_ICONS" => "Y")
				);?>
			<?$html=ob_get_clean();?>
			<?if($html && trim($html) && strpos($html, 'error') === false):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["BLOCK_SERVICES_NAME"];?>
					</div>
					<?=$html;?>
				</div>
			<?endif;?>
		<?//news?>
		<?elseif($code == 'news' && $templateData['LINK_NEWS']):?>
			<?ob_start();?>
				<?$GLOBALS['arrNewsFilter'] = array('ID' => $templateData['LINK_NEWS']);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"news-list",
					array(
						"IBLOCK_TYPE" => "aspro_max_content",
						"IBLOCK_ID" => $arParams['IBLOCK_LINK_NEWS_ID'],
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "ID",
						"SORT_ORDER2" => "DESC",
						"FILTER_NAME" => "arrNewsFilter",
						"FIELD_CODE" => array(
							0 => "NAME",
							1 => "DETAIL_PAGE_URL",
							2 => "PREVIEW_TEXT",
							3 => "PREVIEW_PICTURE",
							4 => "DATE_ACTIVE_FROM",
						),
						"PROPERTY_CODE" => array(
							0 => "PERIOD",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => $arParams['CACHE_TYPE'],
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "Y",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"CACHE_GROUPS" => "N",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "�������",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"VIEW_TYPE" => "list",
						"IMAGE_POSITION" => "left",
						"COUNT_IN_LINE" => "3",
						"SHOW_TITLE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"BORDERED" => "Y",
						"LINKED_MODE" => "Y",
					),
					false, array("HIDE_ICONS" => "Y")
				);?>
			<?$html=ob_get_clean();?>
			<?if($html && trim($html) && strpos($html, 'error') === false):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["TAB_NEWS_NAME"];?>
					</div>
					<?=$html;?>
				</div>
			<?endif;?>
		<?//blog?>
		<?elseif($code == 'blog' && $templateData['LINK_BLOG']):?>
			<?ob_start();?>
				<?$GLOBALS['arrBlogFilter'] = array('ID' => $templateData['LINK_BLOG']);?>

				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"news-list",
					array(
						"IBLOCK_TYPE" => "aspro_max_content",
						"IBLOCK_ID" => $arParams['IBLOCK_LINK_BLOG_ID'],
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "ID",
						"SORT_ORDER2" => "DESC",
						"FILTER_NAME" => "arrBlogFilter",
						"FIELD_CODE" => array(
							0 => "NAME",
							1 => "DETAIL_PAGE_URL",
							2 => "PREVIEW_TEXT",
							3 => "PREVIEW_PICTURE",
							4 => "DATE_ACTIVE_FROM",
						),
						"PROPERTY_CODE" => array(
							0 => "PERIOD",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => $arParams['CACHE_TYPE'],
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "Y",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"CACHE_GROUPS" => "N",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "�������",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"VIEW_TYPE" => "list",
						"IMAGE_POSITION" => "left",
						"COUNT_IN_LINE" => "3",
						"SHOW_TITLE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"BORDERED" => "Y",
						"LINKED_MODE" => "Y",
					),
					false, array("HIDE_ICONS" => "Y")
				);?>
			<?$html=ob_get_clean();?>
			<?if($html && trim($html) && strpos($html, 'error') === false):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["TAB_BLOG_NAME"];?>
					</div>
					<?=$html;?>
				</div>
			<?endif;?>
		<?//staff?>
		<?elseif($code == 'staff' && $templateData['LINK_STAFF']):?>
			<?ob_start();?>
				<?$GLOBALS['arrStaffFilter'] = array('ID' => $templateData['LINK_STAFF']);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					$arParams["STAFF_VIEW_TYPE"],
					array(
						"IBLOCK_TYPE" => "aspro_max_content",
						"IBLOCK_ID" => $arParams['IBLOCK_LINK_STAFF_ID'],
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "ID",
						"SORT_ORDER2" => "DESC",
						"FILTER_NAME" => "arrStaffFilter",
						"FIELD_CODE" => array(
							0 => "NAME",
							1 => "DETAIL_PAGE_URL",
							2 => "PREVIEW_TEXT",
							3 => "PREVIEW_PICTURE",
						),
						"PROPERTY_CODE" => array(
						    0 => "POST",
						    1 => "PHONE",
						    2 => "EMAIL",
						    3 => "SEND_MESSAGE_BUTTON",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => $arParams['CACHE_TYPE'],
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "Y",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"CACHE_GROUPS" => "N",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "�������",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"VIEW_TYPE" => "list",
						"IMAGE_POSITION" => "left",
						"COUNT_IN_LINE" => "3",
						"SHOW_TITLE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"BORDERED" => "Y",
						"LINKED_MODE" => "Y",
					),
					false, array("HIDE_ICONS" => "Y")
				);?>
			<?$html=ob_get_clean();?>
			<?if($html && trim($html) && strpos($html, 'error') === false):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["TAB_STAFF_NAME"];?>
					</div>
					<?=$html;?>
				</div>
			<?endif;?>
		<?//vacancy?>
		<?elseif($code == 'vacancy' && $templateData['LINK_VACANCY']):?>
			<?ob_start();?>
				<?$GLOBALS['arrVacancyFilter'] = array('ID' => $templateData['LINK_VACANCY']);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"vacancy",
					array(
						"IBLOCK_TYPE" => "aspro_max_content",
						"IBLOCK_ID" => $arParams['IBLOCK_LINK_VACANCY_ID'],
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "ID",
						"SORT_ORDER2" => "DESC",
						"FILTER_NAME" => "arrVacancyFilter",
						"FIELD_CODE" => array(
							0 => "NAME",
							1 => "DETAIL_PAGE_URL",
							2 => "PREVIEW_TEXT",
							3 => "PREVIEW_PICTURE",
						),
						"PROPERTY_CODE" => array(
							0 => "PAY",
							1 => "CITY",
							2 => "WORK_TYPE",
							3 => "QUALITY",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => $arParams['CACHE_TYPE'],
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "Y",
						"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
						"CACHE_GROUPS" => "N",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "�������",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"VIEW_TYPE" => "list",
						"IMAGE_POSITION" => "left",
						"COUNT_IN_LINE" => "3",
						"SHOW_TITLE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"BORDERED" => "Y",
						"LINKED_MODE" => "Y",
					),
					false, array("HIDE_ICONS" => "Y")
				);?>
			<?$html=ob_get_clean();?>
			<?if($html && trim($html) && strpos($html, 'error') === false):?>
				<div class="ordered-block <?=$code?>">
					<div class="ordered-block__title option-font-bold font_lg">
						<?=$arParams["TAB_VACANCY_NAME"];?>
					</div>
					<?=$html;?>
				</div>
			<?endif;?>
		<?//goods?>
		<?elseif($code == 'goods'):?>
			<?if($arParams['DETAIL_LINKED_GOODS_TABS'] != 'N'):?>
				<?//tabs mode?>
				
				<div class="ordered-block <?=$code?>">
					<?$bNavTabs = false;?>
					<?if($templateData['ASSOCIATED'] && $templateData['EXPANDABLES']):?>
						<?
						$bShowAssociatedTab = \Aspro\Functions\CAsproMax::checkAvailable($templateData['ASSOCIATED'], array('REGION'));
						$bShowExpandablesTab = \Aspro\Functions\CAsproMax::checkAvailable($templateData['EXPANDABLES'], array('REGION'));
						?>
						<?if($bShowAssociatedTab || $bShowExpandablesTab):?>
							<div class="tabs arrow_scroll bottom-line" data-plugin-options='{"axis": "x", "scrollInertia": 200, "snapAmount": 70, "scrollButtons": {"enable": true}}'>
								<ul class="nav nav-tabs">
									<?if($bShowAssociatedTab):?>
										<li class="active"><a href="#assoc" data-toggle="tab" class="linked"><?=$arParams["DETAIL_ASSOCIATED_TITLE"];?></a></li>
									<?endif;?>
									<?if($bShowExpandablesTab):?>
										<li class="<?=$bShowAssociatedTab ? '' : 'active'?>"><a href="#expandables" data-toggle="tab" class="linked"><?=$arParams["DETAIL_EXPANDABLES_TITLE"];?></a></li>
									<?endif;?>
								</ul>
							</div>
						<div class="tab-content">
						<?$bNavTabs = true;?>
						<?endif;?>
					<?endif;?>

					<?if($templateData['ASSOCIATED']):?>
						<?
						$bShowAssociatedTab = \Aspro\Functions\CAsproMax::checkAvailable($templateData['ASSOCIATED'], array('REGION'));
						?>
						<?if($bShowAssociatedTab):?>
							<?if($bNavTabs):?>
								<div class="tab-pane active cur" id="assoc">
							<?else:?>
								<div class="ordered-block__title option-font-bold font_lg">
									<?=$arParams["DETAIL_ASSOCIATED_TITLE"];?>
								</div>
								<div class="cur">
							<?endif;?>

								<div class="assoc-block js-load-block loader_circle" data-block="assoc" data-file="<?=$APPLICATION->GetCurPage()?>">
									<div class="stub"></div>
									<?CMax::checkRestartBuffer(true, 'assoc');?>
										<?if(CMax::checkAjaxRequest()):?>
											<?$APPLICATION->ShowAjaxHead();?>
											<?
											$GLOBALS['arrProductsFilter'] = [];
											$GLOBALS['arrProductsFilter'] = $templateData['ASSOCIATED'];
											?>
											<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'/include/detail.linked_products_block.php');?>
										<?endif;?>
									<?CMax::checkRestartBuffer(true, 'assoc');?>
								</div>

							</div>
						<?endif;?>
					<?endif;?>

					<?if($templateData['EXPANDABLES']):?>
						<?
						$bShowExpandablesTab = \Aspro\Functions\CAsproMax::checkAvailable($templateData['EXPANDABLES'], array('REGION'));
						?>
						<?if($bShowExpandablesTab):?>
							<?if($bNavTabs):?>
								<div class="tab-pane <?=(!$templateData['ASSOCIATED'] ? "active cur" : "");?>" id="expandables">
							<?else:?>
								<div class="ordered-block__title option-font-bold font_lg">
									<?=$arParams["DETAIL_EXPANDABLES_TITLE"];?>
								</div>
								<div class="cur">
							<?endif;?>

								<div class="expandables-block js-load-block loader_circle" data-block="expandables" data-file="<?=$APPLICATION->GetCurPage()?>">
									<div class="stub"></div>
									<?CMax::checkRestartBuffer(true, 'expandables');?>
										<?if(CMax::checkAjaxRequest()):?>
											<?if(!$templateData['ASSOCIATED'])
												$APPLICATION->ShowAjaxHead();?>
											<?$GLOBALS['arrProductsFilter'] = [];?>
											<?$GLOBALS['arrProductsFilter'] = $templateData['EXPANDABLES'];?>
											<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'/include/detail.linked_products_block.php');?>
										<?endif;?>
									<?CMax::checkRestartBuffer(true, 'expandables');?>
								</div>

							</div>
						<?endif;?>
					<?endif;?>

					<?if($templateData['ASSOCIATED'] && $templateData['EXPANDABLES']):?>
						<?if($bShowAssociatedTab || $bShowExpandablesTab):?>
							</div>
						<?endif;?>
					<?endif;?>
				</div>
			<?else:?>
				<?if($templateData['ASSOCIATED']):?>
					<?
					$bShowAssociatedTab = \Aspro\Functions\CAsproMax::checkAvailable($templateData['ASSOCIATED'], array('REGION'));
					?>
					<?if($bShowAssociatedTab):?>
						<div class="ordered-block <?=$code?> cur">
							<div class="ordered-block__title option-font-bold font_lg">
								<?=$arParams["DETAIL_ASSOCIATED_TITLE"];?>
							</div>
							<div class="assoc-block js-load-block loader_circle" data-block="assoc" data-file="<?=$APPLICATION->GetCurPage()?>">
								<div class="stub"></div>
								<?CMax::checkRestartBuffer(true, 'assoc');?>
									<?if(CMax::checkAjaxRequest()):?>
										<?$APPLICATION->ShowAjaxHead();?>
										<?$GLOBALS['arrProductsFilter'] = [];?>
										<?$GLOBALS['arrProductsFilter'] = $templateData['ASSOCIATED'];?>
										<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'/include/detail.linked_products_block.php');?>
									<?endif;?>
								<?CMax::checkRestartBuffer(true, 'assoc');?>
							</div>
						</div>
					<?endif;?>
				<?endif;?>
				<?if($templateData['EXPANDABLES']):?>
					<?
					$bShowExpandablesTab = \Aspro\Functions\CAsproMax::checkAvailable($templateData['EXPANDABLES'], array('REGION'));
					?>
					<?if($bShowExpandablesTab):?>
						<div class="ordered-block <?=$code?> cur">
							<div class="ordered-block__title option-font-bold font_lg">
								<?=$arParams["DETAIL_EXPANDABLES_TITLE"];?>
							</div>
							<div class="expandables-block js-load-block loader_circle" data-block="expandables" data-file="<?=$APPLICATION->GetCurPage()?>">
								<div class="stub"></div>
								<?CMax::checkRestartBuffer(true, 'expandables');?>
									<?if(CMax::checkAjaxRequest()):?>
										<?$APPLICATION->ShowAjaxHead();?>
										<?$GLOBALS['arrProductsFilter'] = [];?>
										<?$GLOBALS['arrProductsFilter'] = $templateData['EXPANDABLES'];?>
										<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/detail.linked_products_block.php');?>
									<?endif;?>
								<?CMax::checkRestartBuffer(true, 'expandables');?>
							</div>
						</div>
					<?endif;?>
				<?endif;?>
			<?endif;?>
		<?endif;?>
	<?endforeach;?>
<?endif;?>
<?if (isset($templateData['TEMPLATE_LIBRARY']) && !empty($templateData['TEMPLATE_LIBRARY'])){
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
		$loadCurrency = Loader::includeModule('currency');
	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency){?>
		<script type="text/javascript">
			BX.Currency.setCurrencies(<? echo $templateData['CURRENCIES']; ?>);
		</script>
	<?}
}?>
<script type="text/javascript">
	viewItemCounter('<?=$arResult["ID"];?>','<?=current($arParams["PRICE_CODE"]);?>');
	var viewedCounter = {
		path: '/bitrix/components/bitrix/catalog.element/ajax.php',
		params: {
			AJAX: 'Y',
			SITE_ID: "<?= SITE_ID ?>",
			PRODUCT_ID: "<?= $arResult['ID'] ?>",
			PARENT_ID: "<?= $arResult['ID'] ?>"
		}
	};
	BX.ready(
		BX.defer(function(){
			$('body').addClass('detail_page');
			BX.ajax.post(
				viewedCounter.path,
				viewedCounter.params
			);
		})
	);
</script>

<?$des = new \Bitrix\Main\Page\FrameStatic('des');$des->startDynamicArea();?>
<script>
	insertElementStoreBlock = function(html){
		if(
			typeof map === 'object' &&
			map && typeof map.destroy === 'function'
		){
			// there is a map on the page
			map.destroy();
		}

		html = html.replace('this.parentNode.removeChild(script);', 'try{this.parentNode.removeChild(script);} catch(e){}');
		html = html.replace('(document.head || document.documentElement).appendChild(script);', '(typeof ymaps === \'undefined\') && (document.head || document.documentElement).appendChild(script);');

		$('.stores .stores_tab').html(html);

		if($('.stores .stores_tab').siblings('.ordered-block__title').length){
			if($('.stores > .ordered-block__title + .stores-title').length){
				$('.stores > .ordered-block__title + .stores-title').remove();
			}

			$('.stores .stores_tab .stores-title').insertAfter($('.stores .stores_tab').siblings('.ordered-block__title'));
		}

		$('.block_container .items, .block_container .detail_items').mCustomScrollbar({
			mouseWheel: {
				scrollAmount: 150,
				preventDefault: true
			}
		});
	}

	setElementStore = function(check, oid){
		if(typeof check !== 'undefined' && check == "Y")
			return;

		if($('.stores_tab').length )
		{
			var objUrl = parseUrlQuery(),
				oidValue = '',
				add_url = '';
			if('clear_cache' in objUrl)
			{
				if(objUrl.clear_cache == 'Y')
					add_url = '?clear_cache=Y';
			}
			if('oid' in objUrl)
			{
				if(parseInt(objUrl.oid)>0)
					oidValue = objUrl.oid;
			}
			if(typeof oid !== 'undefined' && parseInt(oid)>0)
			{
				oidValue = oid;
			}
			if(oidValue)
			{
				if(add_url)
					add_url +='&oid='+oidValue;
				else
					add_url ='?oid='+oidValue;
			}

			$.ajax({
				type:"POST",
				url:arMaxOptions['SITE_DIR']+"ajax/productStoreAmount.php"+add_url,
				data:<?=CUtil::PhpToJSObject($templateData["STORES"], false, true, true)?>,
				success: function(html){
					if(html.indexOf('new ymaps.Map') !== -1){
						// there is a map in response
						if(typeof setElementStore.mapListner === 'undefined'){
							setElementStore.wait = false;

							window.addEventListener('message', setElementStore.mapListner = function(event){
								if(typeof event.data === 'string'){
									if(
										event.data.indexOf('ready') !== -1 &&
										event.origin.indexOf('maps.ya') !== -1
									){
										// message ready recieved from yandex maps
										setTimeout(function(){
											if(typeof setElementStore.lastHtml !== 'undefined'){
												// insert the last
												insertElementStoreBlock(setElementStore.lastHtml);
												delete setElementStore.lastHtml;
											}
											else{
												setElementStore.wait = false;
											}
										}, 50);
									}
								}
							});
						}

						if(setElementStore.wait){
							// save response until not ready
							setElementStore.lastHtml = html;
						}
						else{
							// insert the first
							setElementStore.wait = true;
							insertElementStoreBlock(html);
						}
					}
					else{
						// there is no a map on the page
						insertElementStoreBlock(html);
					}
				}
			});
		}
	}
	BX.ready(
		BX.defer(function(){
			setElementStore('<?=$templateData["STORES"]["OFFERS"];?>');
		})
	);
</script>
<?$des->finishDynamicArea();?>
<?if($_GET["RID"]){?><script>$(document).ready(function(){$("<div class='rid_item' data-rid='<?=htmlspecialcharsbx($_GET["RID"]);?>'></div>").appendTo($('body'));});</script><?}?>