<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div style="border-color: #080808; width: 1200px; height: 842px; border-style: solid;
     position: relative; left:200px">
		<?php

	class Excel{
    public $currentSheet;
    public $filePath;
    public $fileType;
    public $sheetIndex=0;
    public $allColumn;
    public $allRow;
    public function initialized($filePath) {
        if (file_exists($filePath)) {
            $this->filePath=$filePath;
        }else{
            return array();
        }
        //以硬盘方式缓存
        $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_discISAM;
        $cacheSettings = array();
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
        $file_ext=strtolower(pathinfo($this->filePath, PATHINFO_EXTENSION));
        switch ($file_ext) {
            case 'csv':
                $this->fileType='csv';
                break;
            case 'xlsx':
                $this->fileType='excel';
                break;
            case 'xls':
                $this->fileType='excel';
                break;
            default:
                $this->fileType='';
                break;
        }
        
        if ($this->fileType=='csv') {
            $PHPReader = new PHPExcel_Reader_CSV();
  
            //默认字符集
            $PHPReader->setInputEncoding('GBK');
  
            //默认分隔符  
            $PHPReader->setDelimiter(',');
  
            if(!$PHPReader->canRead($this->filePath)){
                return array();
            }
        }elseif ($this->fileType=='excel'){
            $PHPReader = new PHPExcel_Reader_Excel2007();
  
            if(!$PHPReader->canRead($this->filePath)){
                $PHPReader = new PHPExcel_Reader_Excel5();
  
                if(!$PHPReader->canRead($this->filePath)){
                    return array();
                }
            }
        }else{
            return array();
        }
  
        $PHPReader->setReadDataOnly(true);
        $PHPExcel = $PHPReader->load($this->filePath);
        $this->currentSheet = $PHPExcel->getSheet((int)$this->sheetIndex);
        //$this->currentSheet = $PHPExcel->getActiveSheet();
        $this->allColumn=$this->currentSheet->getHighestColumn();
        $this->allRow=$this->currentSheet->getHighestRow();
    }
  
    public function fetch($beginRow=NULL, $endRow=NULL){
        $currentSheet=$this->currentSheet;
        $allColumn=$this->allColumn;$allRow=$this->allRow;
        $dataSrc=$data=array();
        
        //获取列标题
        for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
            $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, 1)->getValue();//ord()將字符转为十进制数  

			$dataSrc[ord($currentColumn) - 65]=strtolower(trim($val));
			}
            //echo implode("\t", $dataSrc);
            $beginRow=$beginRow ? $beginRow : 2;
            $endRow=$endRow ? $endRow : $allRow;
            for($currentRow = $beginRow ;$currentRow <= $endRow ;$currentRow++){
                //从第A列开始输出$dataRow=array();
                for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
                    $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();//ord()將字符转为十进制数  
                    $dataRow[$dataSrc[ord($currentColumn) - 65]]=$val;
                    //单元级数据处理 ... 格式化日期等  
				}

                //行级数据处理 ...  
  
                if($dataRow){
                    $data[]=$dataRow;}
					echo 
            }
            /*echo '<pre>'; 
			echo print_r($data);
			echo'</pre>';
            echo "\n";*/
        return $data;
    }
}



require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
$import=new Excel(); 
$import->initialized(dirname(__FILE__) . '/document/business/Alliance_Downtown_Lower_Manhattan_Retailers.csv'); 
header("Content-type: text/html; charset=utf-8"); 
$import->fetch();

?>
    </div>
</body>
</html>