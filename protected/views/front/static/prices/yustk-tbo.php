
    <h3><b>Прейскурант цен и тарифов  на услуги ООО "ЮСТК-ТБО"</b><br>
    <span style="font-size: smaller">
    оказываемые предприятиям
    организациям и учреждениям г. Новороссийска и его населенных пунктов
    с 1 февраля  2016г

    </span>
    </h3>

    <br>
    <br>
    <?$data = Service::getData(); $i=1;?>
    <table class="price">
        <thead>
        <tr>
            <td>№ п/п</td>
            <td>Наименование услуги</td>
            <td>Единица измер</td>
            <td>Тариф без НДС, руб.</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?foreach($data as $item):?>
            <tr>
                <td><?=$i?></td>
                <td><?=$item->title;?></td>
                <td><?=$item->unit;?></td>
                <td><?=($item->price>0)?$item->price:'';?></td>
                <?if(strlen($item->description)>68):?>
                <td><a href="#" class="show">Заказать&nbsp;услугу</a></td>
                <?endif;?>
            </tr>
            <?if(strlen($item->description)>68):?>
                    <tr class="description" style='border-bottom: 2px solid #000000 !important;  display: none'>
                    <td colspan='6'>
                    <?=$item->description;?>
                    <br><a href='#' class='close'>Закрыть</a>
                    </td>
                    </tr>
            <?endif;?>
            <?foreach(Service::getRelationData($item->id) as $key ){?>
                <tr>
                    <td></td>
                    <td><?=$key->title;?></td>
                    <td><?=$key->unit;?></td>
                    <td><?=($key->price>0)?$key->price:'';?></td>
                    <td></td>
                </tr>
            <?}?>
            <?$i++;?>
        <?endforeach;?>

     <!--  <tr>
            <td>1</td>
            <td>Услуги подвоза технической воды машиной КАМАЗ (емкость цистерны 10 м.куб.)</td>
            <td>1 рейс</td>
            <td>1700,00</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder3">Заказать&nbsp;услугу</a></td>
        </tr>


        <tr>
            <td></td>
            <td>без стоимости воды</td>
            <td>1 рейс</td>
            <td>1598,30</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>со стоимостью воды</td>
            <td>1 час</td>
            <td>1380,19</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>без стоимости воды</td>
            <td>1 час</td>
            <td>986,78</td>
            <td></td>
        </tr>


        <tr>
            <td>2</td>
            <td>Услуги подвоза питьевой воды машиной МАЗ (емкость цистерны 9 м.куб.)</td>
            <td>1 рейс</td>
            <td>1250,00</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder3">Заказать&nbsp;услугу</a></td>
        </tr>


        <tr>
            <td>3</td>
            <td>Услуги автомобиля мусоровоз по вывозу ТКО</td>
            <td>1 м.куб.</td>
            <td>379,00</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder6">Заказать&nbsp;услугу</a></td>
        </tr>

        <tr>
            <td></td>
            <td>Услуги автомобиля мусоровоз по вывозу ТКО(без размещения)</td>
            <td>1 м.куб.</td>
            <td>248,40</td>
            <td></td>
        </tr>



        <tr>
            <td>4</td>
            <td>Услуги автомобиля бункеровоз по вывозу строительного мусора, вместимостью бункера 8 куб.</td>
            <td>1 рейс</td>
            <td>6988,47</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder5">Заказать&nbsp;услугу</a></td>
        </tr>


        <tr>
            <td>5</td>
            <td> Услуги автомобиля бункеровоз по вывозу КГМ, вместимостью бункера 8 куб.</td>
            <td>1 рейс</td>
            <td>3854,68</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder5">Заказать&nbsp;услугу</a></td>
        </tr>

        <tr>
            <td>6</td>
            <td>Услуги автомобиля бункеровоз, вместимостью бункера 8 куб.(без размещения).</td>
            <td>1 рейс</td>
            <td>3006,47</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder5">Заказать&nbsp;услугу</a></td>
        </tr>


        <tr>
            <td>7</td>
            <td>Аренда евроконтейнера (емкость 1100 литров)</td>
            <td>1 шт/мес</td>
            <td>285,00</td>
            <td></td>
        </tr>


        <tr>
            <td>8</td>
            <td>Аренда бункера</td>
            <td>1 сутки</td>
            <td>347,06</td>
            <td></td>
        </tr>


        <tr>
            <td>9</td>
            <td>Вывоз жидких бытовых отходов вакуумной машиной МАЗ КО-523 (емкость цистерны 8,7 куб.м)</td>
            <td></td>
            <td></td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder4">Заказать&nbsp;услугу</a></td>
        </tr>



        <tr>
            <td></td>
            <td>в черте города до 15 км</td>
            <td>1 рейс</td>
            <td>3012,35</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>за городом на расстоянии от 15 до 25 км</td>
            <td>1 рейс</td>
            <td>3987,29</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>за городом на расстоянии от 26 до 35 км</td>
            <td>1 рейс</td>
            <td>4143,94</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>за городом на расстоянии от 36 до 45 км</td>
            <td>1 рейс</td>
            <td>6241,65</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>за городом на расстоянии от 46 до 55 км</td>
            <td>1 рейс</td>
            <td>6529,61</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>Дополнительный шланг 40п.м.</td>
            <td></td>
            <td>250</td>
            <td></td>
        </tr>-->


        </tbody>

    </table>



