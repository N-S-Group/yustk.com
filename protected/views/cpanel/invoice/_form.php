<?$action = ($this->edit)? 'EditRecord'  : 'add' ;?>
<style>
    .selector{
        width: 300px;
    }
    </style>
<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl($action,array("edit"=>$this->edit));?>" class="form" method='post' id='addForm' enctype="multipart/form-data">
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$this->name;?></h6></div>

            <div class="formRow">
                <label>№ документа:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->num_document;?>" name='num_document' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Назначение платежа:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->description;?>" name='description' style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Дата:</label>
                <div class="formRight">
                    <input type="text" value="<?=$this->model->date?MYDate::contactsDate($this->model->date):'';?>" name='date' class="datepicker1" style="width:260px;"/><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Счет:</label>
                <div class="formRight">
                    <select name="agreement_id">
                        <?foreach($this->getDogovorList() as $item):?>
                         <option value="<?=$item->id?>" <?if($item->id == $this->model->agreement_id) echo 'selected';?>><?=$item->number;?></option>
                        <?endforeach;;?>
                    </select>
                </div>
                <div class="clear"></div>
            </div>


            <?if($this->edit):?>
                <div class="formRow">
                    <label>Статус оплаты:</label>
                    <div class="formRight">
                        <select name="status">
                                <option value="0" <?if($this->model->status == 0) echo 'selected';?>>Не оплачено</option>
                                <option value="1" <?if($this->model->status == 1) echo 'selected';?>>Оплачено</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
            <?endif;?>

            <div class="formRow">
                <label>Документ:</label>
                <div class="formRight">
                    <?php echo CHtml::activeFileField($this->model, 'invoice');?>
                    <?if($this->edit && $img = MYChtml::getImage('invoices/'.$this->model->id,'invoice')):?>
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
            'num_document':{
                required : true
            },
            'date':{
                required : true
            },
            'description':{
                required : true
            }
        }
    });
    <?}else{?>
    var validator =  $("#addForm").validate({
        rules:{
            'num_document':{
                required : true
            },
            'Invoices[invoices]':{
                required : true
            },
            'date':{
                required : true
            },
            'description':{
                required : true
            }
        }
    });
    <?}?>
    $(document).ready(function(){
        $(".datepicker1").datepicker({dateFormat:"dd.mm.yy"});
    });

</script>