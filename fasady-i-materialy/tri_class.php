<?
\Bitrix\Main\Loader::includeModule("highloadblock");
\Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.min.js');
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery.fancybox.min.css');

class TrigranHLelementsDisplay {
	
	public $HlIds;
	public $arMaterialNames;
	public $arResult=[];

	public function __construct($arIds) {
		$this->HlIds=$arIds;
		//составляем словарь соответствия названия типа материала его значениям в разных HL блоках (UF_GROUP)
		$this->GetMaterialsNames('UF_GROUP');
	}
	
	//составляет словарь
	public function GetMaterialsNames($ufcode) {
		if($ufcode=='') return false;
		$rsType = CUserFieldEnum::GetList(array(), array(
			'USER_FIELD_NAME' => $ufcode,
			));
			foreach($rsType->arResult as $arType) {
				$MatName=$arType["VALUE"];
				$materialEnumIds[$MatName][]=$arType["ID"];
			}
		$this->arMaterialNames=$materialEnumIds;
	}
	
	//готовим массив для вывода в шаблоне
	public function MakeArray() {
		foreach($this->HlIds as $HlId) {
			//получаем данные: каждый элемент массива содержит массив с полями HL блока
			$arData = $this->getDataFromHlblock($HlId, ["UF_MAIN"=>1]);	
			//группируем по типу материала
			$this->GroupByType($arData);
			}
	return $this->arResult;
	}
	
	//Группировка по типу материала (UF_GROUP) и обработка полей 
	public function GroupByType($data) {
		foreach($data as $element) {

			//получаем название типа материала (UF_GROUP) из словаря по его ID
			$group_list_item_id=$element["UF_GROUP"];
			if(!$group_list_item_id) continue;
			$group_list_item_name=$this->getGroupElementName($group_list_item_id);
			
			//обработка изображения и содание превью 
			$file = CFile::GetFileArray($element['UF_FILE']);
			$element["IMG_SRC"]=$file['SRC'];
			$tmpImg=CFile::ResizeImageGet($element['UF_FILE'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_EXACT, true);
			$element["PREVIEW_SRC"]=$tmpImg["src"];
			
			//сохраняем ID элемента списка для дополнительной маркировки элементов в шаблоне для проверки
			$this->arResult[$group_list_item_name]["GROUP_ID"]=$group_list_item_id;
			unset($element["UF_GROUP"]);
			
			if($group_list_item_name) $this->arResult[$group_list_item_name]["ELEMENTS"][]=$element;
		}			
	}
	
	//возращает название типа материала (UF_GROUP) по ID значения списка из словаря
	public function getGroupElementName($group_list_item_id) {
			foreach($this->arMaterialNames as $name=>$arrIds) {
				if(in_array($group_list_item_id,$arrIds)) return $name;
			}
			return false;
	}
	
	//Получает все данные из HL блока по его ID и фильтру
	public function getDataFromHlblock($HlBlockId, $arrFilter=[]) {
		$hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getById($HlBlockId)->fetch(); 
		$entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock); 
		$entity_data_class = $entity->getDataClass(); 
	
		$data = $entity_data_class::getList(array(
			"select" => array("ID","UF_*"),
		   "order" => array("ID" => "DESC"),
			"filter" =>$arrFilter
		));
		//echo $data->getSelectedRowsCount();
		while($arData = $data->Fetch()){
			$arResult[]=$arData;
		}
		return $arResult;
	}
}