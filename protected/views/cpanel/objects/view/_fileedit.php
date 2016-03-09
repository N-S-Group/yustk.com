<div class='formRow'>
					<label>Заглавная фотография</label><div class='formRight'>
					<input type='file' name='title[]'>
					<a href='<?=Yii::app()->request->baseUrl.$dir."/".$files_array[$i]?>' class='object_photo'>
					<img src='<?=Yii::app()->request->baseUrl;?>/images/searchSmall.png' style='margin-left:10px;'/></a>
					<a href='#' class='delete_title_object'>
					<img src='<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png' style='margin-left:15px; width:16px;'/>
					</a>
					<input type='hidden' value='<?=$files_array[$i]?>' name='name_title[]'>
					</div>
					<div class='clear'></div></div>