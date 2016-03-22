<?$action = ($this->edit)? 'EditRecord'  : 'add' ;?>

<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl($action,array("edit"=>$this->edit,"cl"=>$_GET['cl']));?>" class="form" method='post' id='addForm'>
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$this->name;?></h6></div>

            <div class="formRow">
                <label>Имя:</label>
                <div class="formRight">
                    <input type="text" value="<?=MYChtml::filterJSON($this->model->name);?>" name='name' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Логин:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->login;?>" name='login' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow admin">
                <label>Телефон:</label>
                <div class="formRight">
                    <input type="text" value="<?=(isset($this->model->phone))?$this->model->phone:'';?>" name='phone' id="phone" style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow user">
                <label>ИНН:</label>
                <div class="formRight">
                    <input type="text" value="<?=(isset($this->model->inn))?$this->model->inn:'';?>" maxlength="12" name='inn' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>E-mail:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->email;?>" name='email' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Пароль:</label>
                <div class="formRight">
                    <input type="password" value="" name='pass' id="password" style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Повторите пароль:</label>
                <div class="formRight">
                    <input type="password" value="" name='password_repeat' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Тип пользователя:</label>
                <div class="formRight">
                    <select name="role" id="role">
                      <option value="1" <?if($_GET['cl']==1) echo 'selected';?>>Пользователь сайта</option>
                      <option value="4" <?if($_GET['cl']==2) echo 'selected';?>>Администратор</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>


            <div class="formRow">
                <label></label>
                <div class="formRight">

                    <a  onClick='$("#addForm").submit()' title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'><?=(!$this->edit?"Сохранить":"Сохранить изменения")?></span></a>

                </div>

                <div class="clear"></div>
            </div>

        </fieldset>
    </form>
</div>

<script>

    $(document).ready(function(){

        $("#role").change(function(){
           if($(this).val() == 1) { $(".admin").hide(); $(".user").show(); }
           else  { $(".admin").show(); $(".user").hide(); }
        });

    $("#password").val('');
    $('#phone').mask('+7 (999) 99-99-999');
    var validator =  $("#addForm").validate({
        rules: {
            'name': {
                required : true
            },
            'login': {
                required : true
            },
            'email': {
                email:true,
                required : true
            },
            'password_repeat': {
                equalTo: "#password"
            },
            'inn': {number:true}
        }
    });
    });
</script>