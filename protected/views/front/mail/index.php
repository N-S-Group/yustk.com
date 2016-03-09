<div class="wrapper col2">
  <div id="container" class="clear">
 <?=$message;?>
 <div class="mainText inLowWidthText">

                Для размещения вашего объекта недвижимости на нашем сайте Вам необходимо заполнить все поля, отмеченные <span class='requiredStar'>*</span>, и отправить заявку, после чего наши сотрудники рассмотрят ее и свяжутся с Вами в ближайшее время.<br>
                При размещении на нашем сайте Вашего объекта недвижимости в поле "Контактная информация" будет указан телефонный номер нашего агентства недвижимости.
                <div class="formAddAd">
                
				<form action="<?=$this->createUrl("sendmail");?>" enctype="multipart/form-data" method="POST">
				<select name="type" id="typeAddAdForm">
                    <option value="0">Выберите тип сделки</option>
                    <option value="1">Продажа</option>
                    <option value="2">Аренда</option>
                </select>
                    <table class="forFormAdd">
                        <tr><td width="210">Контактное лицо (ФИО):<span class='requiredStar'>*</span> </td><td><input type="text" value="" name="contact"  id="contactAddAdForm"></td></tr>
                        <tr><td>Телефон:<span class='requiredStar'>*</span> </td><td><input type="text" name="tel" id="telAddAdForm"></td></tr>
                        <tr><td>E-mail:<span class='requiredStar'>*</span> </td><td><input type="text" name="email" id="emailAddAdForm"></td></tr>
							
							                <tr><td>Объект недвижимости:<span class='requiredStar'>*</span> </td><td><input type="text" name="object" id="objectAddAdForm"></td></tr>
                        <tr><td>Город:<span class='requiredStar'>*</span> </td><td><input type="text" name="city" id="cityAddAdForm"></td></tr>
                        <tr><td>Стоимость:<span class='requiredStar'>*</span> </td><td><input type="text" name="price" id="priceAddAdForm">&nbsp;&nbsp;&nbsp; руб.</td></tr>
                        <tr><td colspan="2"><div style="height: 15px"></div>Описание объекта недвижимости:<span class='requiredStar'>*</span></td></tr>
                        <tr><td colspan="2"><textarea name="description" id="descriptionAddAdForm"></textarea></td></tr>
                    </table>

                    <div class="addPhoto">
                         Добавление фотографий (максимальное количество 10 штук)<br>
                         <span>Требования к загружаемым файлам: тип файлов: JPEG; GIF, PNG; максимальный размер: 1М.б.</span>
                        <br><br><b>Файл:</b> <input type="file" class="photos" name='photos[]'> &nbsp;&nbsp;&nbsp;
						<input type='button' id='add' value='Ещё фото'>
                    </div>
                    <div class="addCaptcha"><div class="addCaptchaDesc">Контрольный код:<span class='requiredStar'>*</span></div><div class="addCaptchaImg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/captcha/index.php" alt="" id="captcha" style=""/><br><a style="cursor:pointer;" onclick="document.getElementById('captcha').src='<?php echo Yii::app()->request->baseUrl; ?>/captcha/index.php?rnd=' + Math.random()">Обновить</a><input type="text" name="captcha" style="width: 165px;"></div></div>
					
					                   <input type="button" value="Подать объявление" id="submitButtonAdd">
			</form>
                </div>
            </div>
 </div>
</div>

<script>
	$(document).ready(function(){

        $("#submitButtonAdd").live("click", function() {

            //contactAddAdForm
            //telAddAdForm
            //emailAddAdForm
            //objectAddAdForm
            //cityAddAdForm
            //priceAddAdForm
            //descriptionAddAdForm
            alert ($("#typeAddAdForm").val());
            return false;

        });

		$("#add").live('click',function(){
  	var length = $(".photos").length;
		if(length!== 10){
			$(".photos:last").after("<br><b>Файл:</b> <input type='file' class='photos' name='photos[]'>");
		}else{
			alert("Не больше "+length+" фото");
		}  
  });
	});
</script>