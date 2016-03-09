<?
$extendUrl = "";
if (!is_array($roles)) $roles = Array();
if ($edit) $extendUrl = "/?editid=".$model->id;
?>

<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl(""); ?><?=$extendUrl?>" class="form" method='post' id='addForm'>
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$name?></h6></div>
            <div class="formRow">
                <label>Login:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->login?>" name='contacts[login]' id='addFormLogin' class='required'/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Пароль:</label>
                <div class="formRight">
                    <input type="password" value="" name='contacts[password]' id="password" <?=(!$edit)?"class='required'":"";?>/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Подтверждение пароля:</label>
                <div class="formRight">
                    <input type="password" value="" name='repass' id='addFormRePass' <?=(!$edit)?"class='required'":"";?>/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>


            <div class="formRow">
                <label>ФИО:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->name?>" name='contacts[name]' id='addFormFio' class='required'/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Email:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->email?>" name='contacts[email]' id='addFormEmail'  class="email required"/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Телефоны:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->tel;?>" name="contacts[tel]" id='addFormTel' class="maskPhoneMy required"/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Группа пользователей:</label>
                <div class="formRight">

                    <select name="group">
                    <? foreach ($roles as $val) {?>
                    <option <?=($authItem == $val[0])?"selected":"";?>  value="<?=$val[0]?>"><?=$val[0]?></option>
                    <?}?>
                    </select>
                    <span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label></label>
                <div class="formRight">
                    <a  onClick='$("#addForm").submit()' title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'><?=(!$edit?"Добавить пользователя":"Сохранить изменения")?></span></a>

                </div>
                <div class="clear"></div>
            </div>

        </fieldset>
	  <input type='hidden' name='userid' value="<?=$model->id;?>">
      <input type='hidden' name='addevent' value="1">
    </form>
</div>

<script>
	$(document).ready(function() {
    $(".maskPhoneMy").mask("+7 (999) 999-99-99");
			
			 var validator =  $("#addForm").validate({
			        rules:{
					'email': {
							email: true
			            },
						'required':{
							required: true
						},
			            'repass': {
			                equalTo: "#password",
			            },
						'contacts[login]':{
							remote: {
			                    url: "<?=$this->createUrl("CheckName",array('ed'=>$_GET['editid']));?>",
			                    type: "post"
			                }
						}

			        },
					messages: {
 					'contacts[login]': {
			            remote:"Такой пользователь уже существует"
			          }
				  	 }});
	});
</script>