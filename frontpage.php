<?php
	function showMenu($max){
		$i =0;
		$max = $max;
		$file = 'xml/frontPageMenu.xml';
		$xml_array=simplexml_load_string(file_get_contents($file)); 
		foreach($xml_array->children() as $child){
			$i++;
			if($i>=$max){
				break;
			}
		}
		$data = $child->name;
		return $data;
		
	}
	function showContent($max){
		$i=0;
		$max = $max;
		$file = 'xml/frontPageMenu.xml';
		$xml_array=simplexml_load_string(file_get_contents($file));
	   foreach($xml_array->children() as $child){
			$i++;
			if($i>=$max){
				break;
			}
		}
		echo $child->content;
	}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>frontpage</title>
</head>
<body>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />

    <div style="height: 80px; width: 100%;">
        &nbsp&nbsp;
		<a href="frontpage.php"><img src="img/logo.png" height="70px" width="70px"></a>
		<div style="font-family: Brush Script MT ;position: relative; left:100px; top: -125px;z-index: 999; font-size:50px"><p>Newark Data Portal</p></div>
    </div>
	

	<div  style="position: relative;left: 10px;height: 580px; width: 110%; background-image: url(../700b/img/newark2.jpg);background-repeat: no-repeat; ">
        <font size="30" color= "white"; style="opacity: 1;">We have all you need</font>
    </div>
	
	<div id="introduction" style="z-index: 999;background-color: black; opacity:0.8;  postion: relative; border-style: solid; width: 400px; height: 400px; margin-top: -140px; margin-left:200px;">
		<p style=" color: white;  font-size: 30px; font-family: Bradley Hand ITC">
		Newark Data Portal collects the data from Newark daily life. Such as crime, government and so on. In the Data portal 
		you can get what you need. You can download the data here. Wish you have happy life. Any Question? Contact us!
		</p>
	</div>
    
	<form id="form" action="showdata.php" method="post">
    <div class="searchform" style="position: relative; height: 100px; width: 100%; margin-left: 250px; margin-right: auto; top: -350px;
        ">
        <div class="search" style="position: relative; left: 550px; top: 10px" >
			<select name="s"  style="position:relative; right: 50px; width:150px; height:40px; border-radius:10px;background:rgba(0, 0, 0, 0); color:white; font:50px;">
				<option value=''style="background-color:#B5B5B5 " >any</option>
				<option value='government' style="background-color:#B5B5B5 ">government</option>
				<option value='business'style="background-color:#B5B5B5 " >business</option>
				<option value='education' style="background-color:#B5B5B5 ">education</option>
				<option value='safty'style="background-color:#B5B5B5 " >safety</option>
				<option value='health'style="background-color:#B5B5B5 " >health</option>
				<option value='environment'style="background-color:#B5B5B5 " >environment</option>
				<option value='transportation'style="background-color:#B5B5B5 " >transportation</option>
				<option value='development'style="background-color:#B5B5B5 " >development</option>
			</select>   
			<input id="d5" type="text" name="keyword"/>
			<div class="container_odd">
				
            </div>
        </div>
              <div class="set_container" style="position: relative; left:950px; top: -30px;  "> 
					<input type="submit" value="submit" style="height: 40px; "> 
                </div>
    </div>
	</form>
	<div style="position:relative; left: 900px; top: -250px">
            <a id="a_information" style="font-size: 20px" href="#introduction">information</a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a style="font-size: 20px" href="#contack us">contact us</a>
        </div>
    <div style="position: relative; height:600px; width: 80%; top: -5px;margin-left: auto; margin-right: auto;">
        <link href="style.css" rel="stylesheet" type="text/css" />
            <b><p style="text-align: center; font-size: 40px;">
			Click here you can quickly go to the matched areas
			</p></b>
        <li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon1">
                    </div>
                    <div class="f-infoWrap">
                        <div class="f-info-title">						
							<?php echo showMenu(1); ?>
						</div>
                        <div class="f-info-desc"><?php echo showContent(1);?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(1); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
                <?php echo showMenu(1)?>
            </div>
        </li>

        <li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon2"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(2); ?></div>
                        <div class="f-info-desc"><?php echo showContent(2)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(2); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
                <?php echo showMenu(2); ?>
            </div>
        </li>

        <li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon3"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(3); ?></div>
                        <div class="f-info-desc"><?php echo showContent(3)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(3); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
                <?php echo showMenu(3); ?>
            </div>
        </li>

        <li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon4"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(4); ?></div>
                        <div class="f-info-desc"><?php echo showContent(4)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(4); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
               <?php echo showMenu(4); ?>
            </div>
        </li>
		
		<li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon5"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(5); ?></div>
                        <div class="f-info-desc"><?php echo showContent(5)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(5); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
               <?php echo showMenu(5); ?>
            </div>
        </li>
		
		<li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon6"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(6); ?></div>
                        <div class="f-info-desc"><?php echo showContent(6)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(6); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
               <?php echo showMenu(6); ?>
            </div>
        </li>
		
		<li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon7"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(7); ?></div>
                        <div class="f-info-desc"><?php echo showContent(7)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(7); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
               <?php echo showMenu(7); ?>
            </div>
        </li>
		
		<li class="f-main-item f-main-itemHover" style="top: 20px">
            <div class="fk-infoBlockWrap">
                <div class="f-wrapBg"></div>
                <div class="fk-infoBlock f-infoBlock-fasico">
                    <div class="f-bg"></div>
                    <div class="f-infoIcon8"></div>
                    <div class="f-infoWrap">
                        <div class="f-info-title"><?php echo showMenu(8); ?></div>
                        <div class="f-info-desc"><?php echo showContent(8)?></div>
                        <a class="set_4_button2 raised hoverable f-button" href="<?php $keyword = showMenu(8); echo "datapage.php?m=$keyword";?>">
                            <i class="anim"></i>
                            <span>access button</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="f-infoBlock-name">
               <?php echo showMenu(8); ?>
            </div>
        </li>
		
    </div>


    <div  id="contack us" style="font-family: Bradley Hand ITC;  width:100%; height: 300px;position: relative; top:100px; ">
		<a href="about.html"><span style="position:relative;left:720px; font-size: 30px;">about</span></a>
		<b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 30px;">Contact us</p></b>
		<b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 30px;">Our email is zl434@njit.edu</p></b>
		<b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 20px;">NJIT</p></b>
        <b><p style="z-index: 999; color: black; opacity: 1; text-align: center; font-size: 20px;">Team: Data Driven and Data Portal</p></b>
		<b><p style="z-index: 999; color: black; opacity: 1;text-align: center;font-size: 20px;">Members: Lin Yang, Zhaohe Li, Tanyue Jiang</p></b>
		<img src="img/buttom-background.png">
	</div>

    <script type="text/javascript" src='js/jquery.js'></script>
    <script type="text/javascript" src="js/index.js"></script>
</body>
</html>