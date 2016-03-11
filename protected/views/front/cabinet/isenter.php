<div class="login">
    <span><b>ООО "Новошип-строй"</b></span> / <a href="<?=$this->createUrl("/login/exit")?>"><b>выход</b></a><br>
    Выберите номер договора: <select><option type="text" value="">11/155521-2</option><option type="text" value="">11/15FA21-2</option></select><br>
    <b>Баланс:</b> -590 руб. &nbsp;&nbsp;&nbsp;
    <?if ($this->section != "docs") {?><a href="<?=$this->createUrl("/cabinet/index")?>">Документы</a><?} else echo "<b>Документы</b>"?>&nbsp;&nbsp;&nbsp;
    <?if ($this->section != "invoices") {?><a href="<?=$this->createUrl("/cabinet/invoices")?>">Счета</a><?} else echo "<b>Счета</b>"?>&nbsp;&nbsp;&nbsp;
    <?if ($this->section != "requests") {?><a href="<?=$this->createUrl("/cabinet/requests")?>">Заявки</a><?} else echo "<b>Заявки</b>"?>&nbsp;&nbsp;&nbsp;
    <?if ($this->section != "contracts") {?><a href="<?=$this->createUrl("/cabinet/contracts")?>">Типовые договора</a><?} else echo "<b>Типовые договора</b>"?>&nbsp;&nbsp;&nbsp;
</div>
