<?
$object = new TrigranHLelementsDisplay([7,8,9,22,24,26]);
$arResult = $object->MakeArray();

//словарь соответствия названия типа материала его значениям в разных HL блоках (UF_GROUP)
// pp($object->arMaterialNames);

//массив для вывода
// pp($arResult);
?>
<div class="row">
	<div class="col-md-12">
	<?foreach ($arResult as $name => $material) {?>
			<div class="accordion-type-1">
				<div class="item-accordion-wrapper bordered box-shadow">
					<div class="accordion-head colored_theme_hover_bg-block font_md accordion-close collapsed" data-toggle="collapse" data-parent="#mats-accordion<?=$material["GROUP_ID"]?>" href="#mats-accordion<?=$material["GROUP_ID"]?>">
						<span class="arrow_open pull-right colored_theme_hover_bg-el"></span>
						<span>
							<?=$name?>
						</span>
						<span class="element-count muted font_xs rounded3">
							<?=count($material["ELEMENTS"])?>
						</span>
					</div>
					<div id="mats-accordion<?=$material["GROUP_ID"]?>" class="panel-collapse collapse" style="height: 0px;">
						<div class="accordion-body">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
									<?foreach ($material["ELEMENTS"] as $element) {?>
										<div class="col-xs-6 col-md-2">
											<div id="mat<?=$element["ID"]?>" class="mats-element bordered box-shadow">
												<a class="fancy dark_link js-notice-block__title font_sm" data-thumb="<?=$element["PREVIEW_SRC"]?>" data-fancybox ="mats-gall-<?=$material["GROUP_ID"]?>" data-caption="<?=$element["UF_NAME"]?>" title="<?=$element["UF_NAME"]?>" href="<?=$element["IMG_SRC"]?>">
													<div class="mats-pict">
														<img class="img-responsive"src="<?=$element["PREVIEW_SRC"]?>">
													</div>
													
													<div class="mats-name">
														<?=$element["UF_NAME"]?>
													</div>
												</a>
											</div>
										</div>
									<?}?>
									</div>
								</div>
							</div>
						</div><!--accordion-body-->
					</div><!--panel-collapse-->
				</div><!--item-accordion-wrapper-->
			</div><!--accordion-type-1-->
	<?}?>
	</div>
</div>