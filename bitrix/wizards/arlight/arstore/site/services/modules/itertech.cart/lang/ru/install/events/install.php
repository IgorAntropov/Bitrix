<?php
$MESS["EVENT_CREATE_USER"] = "Зарегистрирован новый пользователь";
$MESS["EVENT_REGISTER_NOTE"] = "Регистрация на сайте";
$MESS["EVENT_TEMPLATE_CREATE_USER_FOR_ADMIN"] = '
<table style="font-family: Arial, sans-serif;" align="center"  cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td align="left" valign="top" >
            <table  cellpadding="0" cellspacing="0" style="background-color:#fafafa; ">
                <tbody>
                <tr>
                    <td>
                        <h3>Информационное сообщение сайта #SITE_NAME#</h3>
                        <br>
                        На сайте #SERVER_NAME# успешно зарегистрирован новый пользователь.<br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Данные пользователя:<br>
                        <br>
                        Имя&nbsp;Фамилия: #NAME#<br>
                        E-Mail: #EMAIL#<br>
                        <br>
                        Login: #LOGIN#<br>
                        <br>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
';
$MESS["EVENT_TEMPLATE_CREATE_USER"] = '
<table style="font-family: Arial, sans-serif;" align="center"  cellpadding="0" cellspacing="0">
<tbody>
<tr>
	<td align="left" valign="top" >
		<table  cellpadding="0" cellspacing="0" style="background-color:#fafafa; ">
		<tbody>
		<tr>
			<td>
				<h3>Информационное сообщение сайта #SITE_NAME#</h3>
 <br>
				 Здравствуйте! <br>
 <br>
			</td>
		</tr>
		<tr>
			<td>
				<p>
					 Уважаемый(ая) #NAME#!
				</p>
				<p>
					 Вы успешно зарегистрировались на сайте #SITE_NAME#.
				</p>
				<p>
					 Ваша регистрационная информация:
				</p>
				<p>
					 Ваш логин: <b>#EMAIL#</b><br>
					 Ваш пароль: <b>#PASSWORD#</b>
				</p>
				<p>
					 Вы можете изменить пароль в личном кабинете по ссылке: <a href="http://#SERVER_NAME#SITE_DIR##personal/">http://#SERVER_NAME##SITE_DIR#personal/</a>
				</p>
				<p>
					 Сообщение сгенерировано автоматически, отвечать на него не нужно.
				</p>
			</td>
		</tr>
		</tbody>
		</table>

	</td>
</tr>
</tbody>
</table>
';


$MESS["EVENT_CREATE_ORDER"] = "Добавлен новый заказ";
$MESS["EVENT_CREATE_ORDER_NOTE_USER"] = "Вы успешно оформили заказ";
$MESS["EVENT_CREATE_ORDER_NOTE_ADMIN"] = "Оформлен заказ";
$MESS["EVENT_TEMPLATE_CREATE_ORDER_USER"] = '
<table style="font-family: Arial, sans-serif;" align="center"  cellpadding="0" cellspacing="0">
<tbody>
<tr>
	<td align="left" valign="top" >
		<table  cellpadding="0" cellspacing="0" style="background-color:#fafafa; ">
		<tbody>
		<tr>
			<td colspan="2">
				<h3>Заказ № #ORDER_ID# от #DATE_CREATE#</h3>
 <br>
				 Здравствуйте, #USER_NAME#! <br>
 <br>
			</td>
		</tr>
		<tr>
			<td align="left" nowrap="" valign="top" width="180">
 <strong>Контактное лицо:</strong>
			</td>
			<td>
				 #USER_NAME#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>E-mail:</strong>
			</td>
			<td>
 <a href="mailto:#USER_EMAIL#" target="_blank">#USER_EMAIL#</a>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Тел. / факс:</strong>
			</td>
			<td>
				 #USER_PHONE#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Адрес:</strong>
			</td>
			<td>
				 #USER_ADDRESS#<br>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доставка:</strong>
			</td>
			<td>
				 #DELIVERY#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Способ оплаты:</strong>
			</td>
			<td>
				 #PAYMENT_ID#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доп. информация:</strong>
			</td>
			<td>
				 #USER_COMMENT#
			</td>
		</tr>
		</tbody>
		</table>
 <br>
 <strong>Ваш заказ:</strong>
		#ORDER_LIST# <span style="font-size: 12px;">Цены указаны с НДС 20%<br>
 </span> <br>
 <strong>Примечание:</strong>
		<ol style="font-size: 12px;">
			<li>Цены указаны с учетом НДС 20% и приводятся за одну единицу измерения (шт, м и т.д.), указанную в колонке таблицы Ед.Изм. </li>
			<li>Если цена не указана, то наш менеджер сообщит её Вам дополнительно. </li>
			<li>Отгрузка товара производится упаковками.</li>
			<li>На некоторые товары есть ограничение по минимальной сумме заказа. </li>
			<li>Данное коммерческое предложение не является основанием для оплаты, носит исключительно информационный характер и ни при каких условиях не является публичной офертой. Точная цена и сумма заказа будет сформирована при выставлении счета. </li>
		</ol>
 <span style="font-size: 12px;"><span style="color: #ff0000;">**</span> - Цена на позиции, для которых в колонке "Цена" стоит прочерк, будет Вам сообщена менеджером дополнительно.</span> <br>

	</td>
</tr>
</tbody>
</table>
';


$MESS["EVENT_TEMPLATE_CREATE_ORDER_ADMIN"] = '
<table style="font-family: Arial, sans-serif;" align="center"  cellpadding="0" cellspacing="0">
<tbody>
<tr>
	<td align="left" valign="top" >
		<table  cellpadding="0" cellspacing="0" style="background-color:#fafafa; ">
		<tbody>
		<tr>
			<td colspan="2">
				<h3>Заказ № #ORDER_ID# от #DATE_CREATE#</h3>
 <br>
				 Здравствуйте, пользователь #USER_NAME# оформил заказ.&nbsp;<br>
 <br>
			</td>
		</tr>
		<tr>
			<td align="left" nowrap="" valign="top" width="180">
 <strong>Контактное лицо:</strong>
			</td>
			<td>
				 #USER_NAME#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>E-mail:</strong>
			</td>
			<td>
 <a href="mailto:#USER_EMAIL#" target="_blank">#USER_EMAIL#</a>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Тел. / факс:</strong>
			</td>
			<td>
				 #USER_PHONE#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Адрес:</strong>
			</td>
			<td>
				 #USER_ADDRESS#<br>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доставка:</strong>
			</td>
			<td>
				 #DELIVERY#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Способ оплаты:</strong>
			</td>
			<td>
				 #PAYMENT_ID#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Тип плательщика:</strong>
			</td>
			<td>
				 #USER_TYPE#<br>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доп. информация:</strong>
			</td>
			<td>
				 #USER_COMMENT#
			</td>
		</tr>
		</tbody>
		</table>
 <br>
 <strong>Состав заказа:</strong>
		#ORDER_LIST# <span style="font-size: 12px;">Цены указаны с НДС 20%<br>
 </span> <br>
 <strong>Примечание:</strong>
		<ol style="font-size: 12px;">
			<li>Цены указаны с учетом НДС 20% и приводятся за одну единицу измерения (шт, м и т.д.), указанную в колонке таблицы Ед.Изм. </li>
			<li>Если цена не указана, то наш менеджер сообщит её Вам дополнительно. </li>
			<li>Отгрузка товара производится упаковками.</li>
			<li>На некоторые товары есть ограничение по минимальной сумме заказа. </li>
			<li>Данное коммерческое предложение не является основанием для оплаты, носит исключительно информационный характер и ни при каких условиях не является публичной офертой. Точная цена и сумма заказа будет сформирована при выставлении счета. </li>
		</ol>
 <span style="font-size: 12px;"><span style="color: #ff0000;">**</span> - Цена на позиции, для которых в колонке "Цена" стоит прочерк, будет Вам сообщена менеджером дополнительно.</span> <br>

	</td>
</tr>
</tbody>
</table>
';

$MESS["EVENT_ITERTECH_CHANGE_ORDER_STATUS"] = "Смена статуса заказа";
$MESS["EVENT_ITERTECH_CHANGE_ORDER_STATUS_NOTE"] = "Статус вашего заказа изменен";
$MESS["EVENT_ITERTECH_CHANGE_ORDER_STATUS_NOTE_ADMIN"] = "Статус заказа #ORDER_ID# изменен";

$MESS["EVENT_TEMPLATE_CHANGE_ORDER_STATUS"] = '
<p>
Информационное сообщение сайта #SITE_NAME#<br>
<hr>
</p>
<p>Уважаемый(ая) #NAME#!</p>
<p>Статус Вашего заказа №#ORDER_ID# изменен.</p>
<p>Новый статус: #ORDER_STATUS#.</p>
<p>
Вы можете ознакомиться с информацией о заказе по ссылке:
http://#SERVER_NAME##SITE_DIR#personal/
</p>
<p>Сообщение сгенерировано автоматически, отвечать на него не нужно.</p>
';

$MESS["EVENT_ITERTECH_CHANGE_ORDER_STATUS_NOTE_ADMIN"] = "Статус заказа #ORDER_ID# изменен";

$MESS["EVENT_TEMPLATE_CHANGE_ORDER_STATUS_ADMIN"] = '
<p>
Информационное сообщение сайта #SITE_NAME#<br>
<hr>
</p>
<p>Статус заказа №#ORDER_ID# изменен.</p>
<p>Новый статус: #ORDER_STATUS#.</p>
<p>
Вы можете ознакомиться с информацией о заказе по ссылке:
http://#SERVER_NAME##SITE_DIR#admin/order/?order=#ORDER_ID#
</p>
<p>Сообщение сгенерировано автоматически, отвечать на него не нужно.</p>
';

$MESS["EVENT_ITERTECH_CHANGE_ORDER_NOTE"] = "Ваш заказ № #ORDER_ID# был изменен менеджером";
$MESS["EVENT_ITERTECH_CHANGE_ORDER_NOTE_ADMIN"] = "Заказ #ORDER_ID# изменен менеджером";
$MESS["EVENT_TEMPLATE_CHANGE_ORDER"] = '
<table style="font-family: Arial, sans-serif;" align="center"  cellpadding="0" cellspacing="0">
<tbody>
<tr>
	<td align="left" valign="top" >
		<table  cellpadding="0" cellspacing="0" style="background-color:#fafafa; ">
		<tbody>
		<tr>
			<td colspan="2">
				<h3>Уведомление о внесении менеджером изменений в заказ № #ORDER_ID# от #DATE_CREATE#</h3>
 <br>
				 Здравствуйте, #USER_NAME#! <br>
 <br>
			</td>
		</tr>
		<tr>
			<td align="left" nowrap="" valign="top" width="180">
 <strong>Контактное лицо:</strong>
			</td>
			<td>
				 #USER_NAME#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>E-mail:</strong>
			</td>
			<td>
 <a href="mailto:#USER_EMAIL#" target="_blank">#USER_EMAIL#</a>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Тел. / факс:</strong>
			</td>
			<td>
				 #USER_PHONE#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Адрес:</strong>
			</td>
			<td>
				 #USER_ADDRESS#<br>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доставка:</strong>
			</td>
			<td>
				 #DELIVERY#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доп. информация:</strong>
			</td>
			<td>
				 #USER_COMMENT#
			</td>
		</tr>
		</tbody>
		</table>
 <br>
 <strong>Ваш заказ:</strong>
		#ORDER_LIST# <span style="font-size: 12px;">Цены указаны с НДС 20%<br>
 </span> <br>
 <strong>Примечание:</strong>
		<ol style="font-size: 12px;">
			<li>Цены указаны с учетом НДС 20% и приводятся за одну единицу измерения (шт, м и т.д.), указанную в колонке таблицы Ед.Изм. </li>
			<li>Если цена не указана, то наш менеджер сообщит её Вам дополнительно. </li>
			<li>Отгрузка товара производится упаковками.</li>
			<li>На некоторые товары есть ограничение по минимальной сумме заказа. </li>
			<li>Данное коммерческое предложение не является основанием для оплаты, носит исключительно информационный характер и ни при каких условиях не является публичной офертой. Точная цена и сумма заказа будет сформирована при выставлении счета. </li>
		</ol>
 <span style="font-size: 12px;"><span style="color: #ff0000;">**</span> - Цена на позиции, для которых в колонке "Цена" стоит прочерк, будет Вам сообщена менеджером дополнительно.</span> <br>

	</td>
</tr>
</tbody>
</table>
';
$MESS["EVENT_TEMPLATE_CHANGE_ORDER_ADMIN"] = '
<table style="font-family: Arial, sans-serif;" align="center"  cellpadding="0" cellspacing="0">
<tbody>
<tr>
	<td align="left" valign="top" >
		<table  cellpadding="0" cellspacing="0" style="background-color:#fafafa; ">
		<tbody>
		<tr>
			<td colspan="2">
				<h3>Уведомление о внесении менеджером изменений в заказ № #ORDER_ID# от #DATE_CREATE#</h3>
 <br>
			</td>
		</tr>
		<tr>
			<td align="left" nowrap="" valign="top" width="180">
 <strong>Контактное лицо:</strong>
			</td>
			<td>
				 #USER_NAME#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>E-mail:</strong>
			</td>
			<td>
 <a href="mailto:#USER_EMAIL#" target="_blank">#USER_EMAIL#</a>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Тел. / факс:</strong>
			</td>
			<td>
				 #USER_PHONE#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Адрес:</strong>
			</td>
			<td>
				 #USER_ADDRESS#<br>
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доставка:</strong>
			</td>
			<td>
				 #DELIVERY#
			</td>
		</tr>
		<tr>
			<td align="left" valign="top">
 <strong>Доп. информация:</strong>
			</td>
			<td>
				 #USER_COMMENT#
			</td>
		</tr>
		</tbody>
		</table>
 <br>
 <strong>Ваш заказ:</strong>
		#ORDER_LIST# <span style="font-size: 12px;">Цены указаны с НДС 20%<br>
 </span> <br>
 <strong>Примечание:</strong>
		<ol style="font-size: 12px;">
			<li>Цены указаны с учетом НДС 20% и приводятся за одну единицу измерения (шт, м и т.д.), указанную в колонке таблицы Ед.Изм. </li>
			<li>Если цена не указана, то наш менеджер сообщит её Вам дополнительно. </li>
			<li>Отгрузка товара производится упаковками.</li>
			<li>На некоторые товары есть ограничение по минимальной сумме заказа. </li>
			<li>Данное коммерческое предложение не является основанием для оплаты, носит исключительно информационный характер и ни при каких условиях не является публичной офертой. Точная цена и сумма заказа будет сформирована при выставлении счета. </li>
		</ol>
 <span style="font-size: 12px;"><span style="color: #ff0000;">**</span> - Цена на позиции, для которых в колонке "Цена" стоит прочерк, будет Вам сообщена менеджером дополнительно.</span> <br>
	</td>
</tr>
</tbody>
</table>

';

?>
