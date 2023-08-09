<?
\Bitrix\Main\Loader::includeModule("highloadblock");
\Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.min.js');
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery.fancybox.min.css');

class TrigranHLelementsDisplay {
	
	public $HlIds;
    public $ufCodes=[];
	public $arNameIds=[];
	public $arNameSorts=[];
	public $arResult=[];

	public function __construct($arIds) {
		$this->HlIds=$arIds;
		//составляем словарь соответствия названия свойства и его значениям в разных HL блоках
        $props = ['UF_GROUP', 'UF_SUBSECT'];//!to do: можно вынести в параметры компонента (в порядке вложенности разделов)
        $this->ufCodes = $props;
        foreach ($props as $prop)
		    $this->GetPropertyIdsByName($prop);
	}

	//составляет массив вида [ "UF_CODE" => [ "ID" ] ] для свойства типа список
	public function GetPropertyIdsByName($ufcode) {
		if($ufcode=='') return false;
		if($ufcode=='UF_NALICHIE') {
            $materialEnumIds['В наличии'][]=1;
            $materialEnumIds['Под заказ'][]=0;
            $this->arNameIds[$ufcode] = $materialEnumIds;
        }
        else {
            $rsType = CUserFieldEnum::GetList(array(), array(
                'USER_FIELD_NAME' => $ufcode,
            ));
            foreach($rsType->arResult as $arType) {
                $MatName=$arType["VALUE"];
                $materialEnumIds[$MatName][]=$arType["ID"];
                if ($ufcode=='UF_SUBSECT') {
                    $materialEnumSorts[$arType["SORT"]]= $MatName;
                }
            }
            $this->arNameIds[$ufcode] = $materialEnumIds;
            if ($ufcode=='UF_SUBSECT') {
                $this->arNameSorts[$ufcode] = $materialEnumSorts;
            }
        }
	}

    public function GetPropertyCodeByName($search_name) {
        foreach ($this->arNameIds as $ufCode => $elems) {
            foreach ($elems as $name => $arrId) {
                if ($name == $search_name)
                    return $arrId[0];
            }
        }
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

    //функция считает количество конечных массивов внутри вложенного массива
    function countFinalArrays($array) {
        $count = 0;
        foreach ($array as $value) {
            if (is_array($value)) {
                $hasNestedArray = false;
                foreach ($value as $nestedValue) {
                    if (is_array($nestedValue)) {
                        $hasNestedArray = true;
                        break;
                    }
                }
                if (!$hasNestedArray) {
                    $count++;
                } else {
                    $count += $this->countFinalArrays($value);
                }
            }
        }

        return $count;
    }

    public function GetCountResultByCategory($name) {
        return $this->countFinalArrays($this->arResult[$name]);
    }
	
	//Группировка по свойствам и обработка полей
	public function GroupByProperties($data) {
		foreach($data as $element) {
            $group_list_item_names = [];
            $group_list_item_ids = [];
            foreach ($this->ufCodes as $ufCode) {
                if($ufcode=='UF_NALICHIE') {
                } else {
                    //получаем название свойства из словаря по его ID
                    $group_list_item_id = $element[$ufCode];
                    if (!$group_list_item_id) continue;
                    else {
                        $group_list_item_ids[] = $group_list_item_id;
                        $group_list_item_names[] = $this->getPropertyElementName($ufCode, $group_list_item_id);
                    }
                }
            }
            if (!isset($element['UF_NALICHIE']) || !$element['UF_NALICHIE'])
                $group_list_item_names[] = 'Под заказ';
            elseif ($element['UF_NALICHIE'])
                $group_list_item_names[] = 'В наличии';
			
			//обработка изображения и содание превью 
			$file = CFile::GetFileArray($element['UF_FILE']);
			$element["IMG_SRC"]=$file['SRC'];
			$tmpImg=CFile::ResizeImageGet($element['UF_FILE'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_EXACT, true);
			$element["PREVIEW_SRC"]=$tmpImg["src"];

            foreach ($this->ufCodes as $ufCode) {
                unset($element[$ufCode]);
            }
            unset($element['UF_MAIN']);
            unset($element['UF_NALICHIE']);
            unset($element['UF_XML_ID']);
            unset($element['UF_LINK']);
            unset($element['UF_DESCRIPTION']);
            unset($element['UF_FULL_DESCRIPTION']);
            unset($element['UF_SORT']);
            unset($element['UF_DEF']);
            unset($element['UF_FILE']);

            if (count($group_list_item_names)>1) {
                $this->processKeys2($this->arResult, $group_list_item_names, $element);
                //$this->recursiveSortArray($this->arResult);
            }
            $this->sortByKeysFrezerovki();
		}			
	}

    //добавляет значение в результирующий массив по цепочке переданных ключей
    function processKeys(&$result, $keys, $value) {
        $currentArray = &$result;
        $numKeys = count($keys);
        foreach ($keys as $index => $key) {
            if (!isset($currentArray[$key])) {
                $currentArray[$key] = [];
            }
            if ($index === $numKeys - 1) {
                $currentArray[$key][] = $value;
            }
            $currentArray = &$currentArray[$key];
        }
    }

    public function sortByKeysFrezerovki()
    {
        $result = [];
        foreach ($this->arNameSorts['UF_SUBSECT'] as $sort => $nameGroup) {
            if (count($this->arResult['Фрезеровка'][$nameGroup]) != 0)
                $result[$nameGroup] = $this->arResult['Фрезеровка'][$nameGroup];
        }
        $this->arResult['Фрезеровка'] = $result;
    }

    function processKeys2(&$result, $keys, $value) {
        $currentArray = &$result;
        $numKeys = count($keys);
        $isSorted = false;

        foreach ($keys as $index => $key) {
            if (!isset($currentArray[$key])) {
                // Получаем ключи, которых еще нет в массиве
                $remainingKeys = array_slice($keys, $index);
                // Создаем многомерные массивы для отсутствующих ключей
                $missingArrays = array_fill_keys($remainingKeys, []);
                // Объединяем отсутствующие массивы с текущим массивом
                $currentArray = array_merge($currentArray, $missingArrays);
                $isSorted = true;
            }

            if ($index === $numKeys - 1 && !empty($value)) {
                // Проверяем, является ли элемент массивом и сортируем его по полю 'UF_NAME'
                if (is_array($currentArray[$key])) {
                    $currentArray[$key][] = $value;
                    $rusCollator = new \Collator('ru_RU');
                    usort($currentArray[$key], function($a, $b) use ($rusCollator) {
                        $result = $rusCollator->compare($a['UF_NAME'], $b['UF_NAME']);
                        if ($result == 0) {
                            return strcasecmp($a['UF_NAME'], $b['UF_NAME']);
                        }
                        return $result;
                    });
                }
            }

            if ($isSorted) {
                ksort($currentArray);
            }

            $currentArray = &$currentArray[$key];
        }
    }

    //сортирует в приоритете по значениям, но и по ключам
    function recursiveSortArray(&$array) {
        if (!is_array($array)) {
            return;
        }

        foreach ($array as &$value) {
            $this->recursiveSortArray($value);
        }

        uksort($array, function ($a, $b) {
            return strnatcmp($a, $b);
        });
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