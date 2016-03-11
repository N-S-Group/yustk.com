<?$action = ($this->edit)? 'EditRecord'  : 'add' ;?>
<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl($action,array("edit"=>$this->edit));?>" class="form" method='post' id='addForm' enctype="multipart/form-data">
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$this->name;?></h6></div>

            <div class="formRow">
                <label>Наименование услуги:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->title;?>" name='title' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Единица измерения:</label>
                <div class="formRight">
                    <input type="text"  value="<?=$this->model->unit;?>" name='unit' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Тариф без НДС, руб.:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->price;?>" name='price' onkeypress="return isNumberKey(this,event);" style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <input type="hidden" value="<?=($this->edit)?$this->model->pid:$_GET['renid'];?>" name="pid">

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

    tinymce.init({language : "ru",selector:'textarea',menubar: false,toolbar: "bold italic underline",forced_root_block : false,
        force_br_newlines : true,
        force_p_newlines : false});

    function isNumberKey(txt, evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
            if (txt.value.indexOf('.') === -1) {
                return true;
            } else {
                return false;
            }
        } else {
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
        }
        return true;
    }

    var validator =  $("#addForm").validate({
        rules: {
            'title': {
                required : true
            }
        }

    });

</script>