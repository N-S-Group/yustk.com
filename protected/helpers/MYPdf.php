<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 3:57
 * To change this template use File | Settings | File Templates.
 */
class MYPdf
{

public static function getPdfString($model,$user){
$name = MYChtml::toUTF8($user->name);
$order_date = MYDate::contactsDate(date("Y-m-d"));
return <<<THIS
<p style="text-align:right;">Директору</p>
<h4 style="text-align:center;">Приложение №1<br>к договору на вывоз бункера</h4>
<h3 style="text-align:center; font-size:16px;">Заявка на рейс бункеровоза<br>
{$name}
<br>
</h3>
<h3 font-size:14px;>На основании заключенного договора №{$model->id} от {$order_date} г.</h3>
<div style="width: 900px;">
<table style="border: 1px solid black; width: 100%; font-size:16px;">

        <tr>
            <td style="padding: 5px; border: 1px solid black;">
             Дата установки бункера<br>(по согласованию)
            </td>
             <td style="padding: 3px; border: 1px solid black;">
            </td>
        </tr>

        <tr>
            <td style="padding: 5px; border: 1px solid black;">
             Адрес объекта, где будет происходить устанвка/вывоз бункера
            </td>
             <td style="padding: 3px; border: 1px solid black;">
            </td>
        </tr>

        <tr>
            <td style="padding: 5px; border: 1px solid black;">
             Количество заказываемых бункеров, подлежащих установке
            </td>
             <td style="padding: 3px; border: 1px solid black;">
            </td>
        </tr>

         <tr>
            <td style="padding: 5px; border: 1px solid black;">
             Количество собственных бункеров, подлежащих вывозу
            </td>
             <td style="padding: 3px; border: 1px solid black;">
            </td>
        </tr>

</table>
<br>
<h4 font-size:14px;>В случае невозможности произвести услугу по причинам, не зависящим от Исполнителя, а именно: блокирование доступа машины, отмена рейса без предупреждения и т.п. - Услуга оплачивается полностью.</h4>
<br><br>
<h3 font-size:14px;>Дополнительные пожелания _________________________________________________________
<br><br>_____________________________________________________________________________________<br></h3>
<br>
<h3>ОПЛАТУ ГАРАНТИРУЕМ!</h3>
<br>
<h3>Начальник участка {$name}</h3>
<br><br><br>
<h3 font-size:14px;>Принял заявку диспетчер  ___________________________________________________________</h3>

<h2 style="text-align:center;">ОБЯЗАТЕЛЬНО ПОДПИСЫВАТЬ СПРАВКУ !!!</h2>

</div>
THIS;
    }
}