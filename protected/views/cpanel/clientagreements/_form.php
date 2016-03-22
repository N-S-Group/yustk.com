<?$action = ($this->edit)? 'EditRecord'  : 'add' ;?>
<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl($action,array("edit"=>$this->edit));?>" class="form" method='post' id='addForm' enctype="multipart/form-data">
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$this->name;?></h6></div>

            <div class="formRow">
                <label>Наименование:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->name;?>" name='name' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Номер:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->number;?>" name='number' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Клиент:</label>
                <div class="formRight">
                    <select name="client_id">
                        <?foreach($this->getClients() as $item):?>
                        <option value="<?=$item->id;?>" <?if($item->id == $this->model->client_id ) echo 'selected';?>><?=$item->name?></option>
                        <?endforeach;?>
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

    var validator =  $("#addForm").validate({
        rules:{
            'name':{
                required : true
            },
            'number':{
                required : true
            }
        }
    });

</script>