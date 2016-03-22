<?$action = ($this->edit)? 'EditRecord'  : 'add' ;?>
<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl($action,array("edit"=>$this->edit));?>" class="form" method='post' id='addForm' enctype="multipart/form-data">
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$this->name;?></h6></div>

            <div class="formRow">
                <label>Наименование документов:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->name;?>" name='name' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Документ:</label>
                <div class="formRight">
                    <?php echo CHtml::activeFileField($this->model, 'agreements');?>
                    <?if($this->edit && $img = MYChtml::getImage('agreements/'.$this->model->id,'agreements')):?>
                        &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo Yii::app()->request->baseUrl;?>/uploads/<?=$img;?>" download>
                            Скачать
                        </a>
                    <?endif;?>
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
    <?if($this->edit){?>
    var validator =  $("#addForm").validate({
        rules:{
            'name':{
                required : true
            }
        }
    });
    <?}else{?>
    var validator =  $("#addForm").validate({
        rules:{
            'name':{
                required : true
            },
            'StandartAgreements[photo]':{
                required : true
            }
        }
    });
    <?}?>


</script>