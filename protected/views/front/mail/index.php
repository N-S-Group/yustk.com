<div class="wrapper col2">
  <div id="container" class="clear">
 <?=$message;?>
 <div class="mainText inLowWidthText">

                ��� ���������� ������ ������� ������������ �� ����� ����� ��� ���������� ��������� ��� ����, ���������� <span class='requiredStar'>*</span>, � ��������� ������, ����� ���� ���� ���������� ���������� �� � �������� � ���� � ��������� �����.<br>
                ��� ���������� �� ����� ����� ������ ������� ������������ � ���� "���������� ����������" ����� ������ ���������� ����� ������ ��������� ������������.
                <div class="formAddAd">
                
				<form action="<?=$this->createUrl("sendmail");?>" enctype="multipart/form-data" method="POST">
				<select name="type" id="typeAddAdForm">
                    <option value="0">�������� ��� ������</option>
                    <option value="1">�������</option>
                    <option value="2">������</option>
                </select>
                    <table class="forFormAdd">
                        <tr><td width="210">���������� ���� (���):<span class='requiredStar'>*</span> </td><td><input type="text" value="" name="contact"  id="contactAddAdForm"></td></tr>
                        <tr><td>�������:<span class='requiredStar'>*</span> </td><td><input type="text" name="tel" id="telAddAdForm"></td></tr>
                        <tr><td>E-mail:<span class='requiredStar'>*</span> </td><td><input type="text" name="email" id="emailAddAdForm"></td></tr>
							
							                <tr><td>������ ������������:<span class='requiredStar'>*</span> </td><td><input type="text" name="object" id="objectAddAdForm"></td></tr>
                        <tr><td>�����:<span class='requiredStar'>*</span> </td><td><input type="text" name="city" id="cityAddAdForm"></td></tr>
                        <tr><td>���������:<span class='requiredStar'>*</span> </td><td><input type="text" name="price" id="priceAddAdForm">&nbsp;&nbsp;&nbsp; ���.</td></tr>
                        <tr><td colspan="2"><div style="height: 15px"></div>�������� ������� ������������:<span class='requiredStar'>*</span></td></tr>
                        <tr><td colspan="2"><textarea name="description" id="descriptionAddAdForm"></textarea></td></tr>
                    </table>

                    <div class="addPhoto">
                         ���������� ���������� (������������ ���������� 10 ����)<br>
                         <span>���������� � ����������� ������: ��� ������: JPEG; GIF, PNG; ������������ ������: 1�.�.</span>
                        <br><br><b>����:</b> <input type="file" class="photos" name='photos[]'> &nbsp;&nbsp;&nbsp;
						<input type='button' id='add' value='��� ����'>
                    </div>
                    <div class="addCaptcha"><div class="addCaptchaDesc">����������� ���:<span class='requiredStar'>*</span></div><div class="addCaptchaImg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/captcha/index.php" alt="" id="captcha" style=""/><br><a style="cursor:pointer;" onclick="document.getElementById('captcha').src='<?php echo Yii::app()->request->baseUrl; ?>/captcha/index.php?rnd=' + Math.random()">��������</a><input type="text" name="captcha" style="width: 165px;"></div></div>
					
					                   <input type="button" value="������ ����������" id="submitButtonAdd">
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
			$(".photos:last").after("<br><b>����:</b> <input type='file' class='photos' name='photos[]'>");
		}else{
			alert("�� ������ "+length+" ����");
		}  
  });
	});
</script>