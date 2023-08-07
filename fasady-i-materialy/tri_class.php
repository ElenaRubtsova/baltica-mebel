<?
\Bitrix\Main\Loader::includeModule("highloadblock");
\Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.min.js');
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery.fancybox.min.css');

class TrigranHLelementsDisplay {
	
	public $HlIds;
    public $ufCodes=[];
	public $arNameIds=[];
	public $arResult=[];

	public function __construct($arIds) {
		$this->HlIds=$arIds;
		//составляем словарь соответствия названия свойства и его значениям в разных HL блоках
        $props = ['UF_GROUP', 'UF_SUBSECT', 'UF_NALICHIE'];//!to do: можно вынести в параметры компонента (в порядке вложенности разделов)
        $this->ufCodes = $props;
        foreach ($props as $prop)
		    $this->GetPropertyIdsByName($prop);
	}

	//составляет массив вида [ "VALUE" => [ "ID" ] ] для свойства типа список
	public function GetPropertyIdsByName($ufcode) {
		if($ufcode=='') return false;
		if($ufcode=='UF_NALICHIE') {
            $materialEnumIds['В наличии'][]=1;
            $materialEnumIds['Под заказ'][]=0;
            $this->arNameIds[$ufcode] = $materialEnumIds;
        }

		$rsType = CUserFieldEnum::GetList(array(), array(
			'USER_FIELD_NAME' => $ufcode,
			));
			foreach($rsType->arResult as $arType) {
				$MatName=$arType["VALUE"];
				$materialEnumIds[$MatName][]=$arType["ID"];
			}
		$this->arNameIds[$ufcode] = $materialEnumIds;
	}

	//готовим массив для вывода в шаблоне
	public function MakeArray() {
		foreach($this->HlIds as $HlId) {
			//получаем данные: каждый элемент массива содержит массив с полями HL блока
			$arData = $this->getDataFromHlblock($HlId, ["UF_MAIN"=>1]);	
			//группируем по свойствам
			$this->GroupByProperties($arData);
			}
	    return $this->arResult;
	}
	
	//Группировка по свойствам и обработка полей
	public function GroupByProperties($data) {
		foreach($data as $element) {
            $group_list_item_names = [];
            $group_list_item_ids = [];
            foreach ($this->ufCodes as $ufCode) {
                /*if($ufcode=='UF_NALICHIE') {
                    if ($element['UF_NALICHIE'])
                        $group_list_item_names[] = 'В наличии';
                    else
                        $group_list_item_names[] = 'Под заказ';
                } else {*/
                    //получаем название свойства из словаря по его ID
                    $group_list_item_id = $element[$ufCode];
                    if (!$group_list_item_id) continue;
                    else $group_list_item_ids[] = $group_list_item_id;
                    $group_list_item_names[] = $this->getPropertyElementName($ufCode, $group_list_item_id);
            }
			
			//обработка изображения и содание превью 
			$file = CFile::GetFileArray($element['UF_FILE']);
			$element["IMG_SRC"]=$file['SRC'];
			$tmpImg=CFile::ResizeImageGet($element['UF_FILE'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_EXACT, true);
			$element["PREVIEW_SRC"]=$tmpImg["src"];

            /*for ($i = 0; $i < count($group_list_item_names); $i++) {
                $group_list_item_id = $group_list_item_ids[$i];
                $group_list_item_name = $group_list_item_names[$i];
                $ufCode = $this->ufCodes[$i];
                //сохраняем ID элемента списка для дополнительной маркировки элементов в шаблоне для проверки
                $this->arResult[$group_list_item_name][$ufCode."_ID"] = $group_list_item_id;
                unset($element[$ufCode]);
            }*/


            $this->processKeys($this->arResult, $group_list_item_names, $element['UF_NAME']);

            /*foreach ($group_list_item_names as $prop) {
                if ($lastProp) {
                    $this->arResult[$lastProp] = [$prop => $element];
                    $lastProp = $prop;
                } else {
                    $this->arResult[$prop] = $element;
                    $lastProp = $prop;
                }
            }
                //Группировка по наличию/под заказ (UF_NALICHIE)
                if($group_list_item_name) {
                    if ($element['UF_NALICHIE'] == true)
                        $this->arResult[$group_list_item_name]["ELEMENTS_V_NALICHII"][]=$element;
                    else
                        $this->arResult[$group_list_item_name]["ELEMENTS_POD_ZAKAZ"][]=$element;
                }*/
		}			
	}

    //добавляет значение в результирующий массив по цепочке переданных ключей
    function processKeys(&$result, $keys, $value) {
        $currentArray = &$result;
        foreach ($keys as $key) {
            if (!isset($currentArray[$key])) {
                $currentArray[$key] = [];
            }
            $currentArray = &$currentArray[$key];
        }
        $currentArray[] = $value;
    }
	
	//возращает название свойства по ID значения списка из словаря
	public function getPropertyElementName($ufcode, $group_list_item_id) {
        foreach($this->arNameIds[$ufcode] as $name=>$arrIds) {
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