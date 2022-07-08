CREATE TABLE IF NOT EXISTS `itertech_cart_orders` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `SITE_ID` CHAR(2) NOT NULL,
        `DATE_CREATE` DATETIME NOT NULL,
        `DATE_CHANGE` DATETIME NOT NULL,
        `STATUS` VARCHAR(255) NOT NULL,
        `CURRENCY` VARCHAR(255) NOT NULL,
        `SUMM` DECIMAL(18,2) NOT NULL,
        `DISCOUNT` DECIMAL(18,2) NOT NULL,
        `DISCOUNT_PERCENT` varchar(10) NULL,
        `PROMOCODE_OR_SUMM` varchar(255) NULL,
        `DISCOUNT_TYPE` varchar(255) NULL,
        `QUANTITY` FLOAT NOT NULL,
        `PAYMENT` CHAR(1) NOT NULL DEFAULT 'N',
        `PAYMENT_DATE` DATETIME NOT NULL,
        `PAYMENT_ID` VARCHAR(255) NOT NULL,
        `PAYMENT_TYPE` VARCHAR(10) NOT NULL,
        `CANCELED` CHAR(1) NOT NULL DEFAULT 'N',
        `CANCELED_DATE` DATETIME NOT NULL,
        `DELIVERY` VARCHAR(255) NOT NULL,
        `DELIVERY_PRICE` DECIMAL(18,2) NOT NULL,
        `USER_ID` INT(11) NOT NULL,
        `USER_NAME` VARCHAR(255) NOT NULL,
        `USER_EMAIL` VARCHAR(255) NOT NULL,
        `USER_PHONE` VARCHAR(255) NOT NULL,
        `USER_INDEX` VARCHAR(255) NULL,
        `USER_CITY` VARCHAR(255) NOT NULL,
        `USER_STREET` VARCHAR(255) NOT NULL,
        `USER_HOUSE` VARCHAR(255) NOT NULL,
        `USER_APP` VARCHAR(255) NOT NULL,
        `USER_ADDRESS` VARCHAR(255) NOT NULL,
        `USER_COMMENT` TEXT NOT NULL,
        `DATA` TEXT NULL,
        PRIMARY KEY(ID)
);
CREATE TABLE IF NOT EXISTS `itertech_cart_orders_items` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `ORDER_ID` INT(11) NOT NULL,
        `PRODUCT_ID` INT(11) NOT NULL,
        `ARTNUMBER` VARCHAR(255) NOT NULL,
        `QUANTITY` FLOAT NOT NULL,
        `PRICE` DECIMAL(18,2) NOT NULL,
        `DISCOUNT` DECIMAL(18,2) NOT NULL,
        `CURRENCY` VARCHAR(255) NOT NULL,
        `NAME` VARCHAR(255) NOT NULL,
        `DESCRIPTION` TEXT NULL,
        `URL` VARCHAR(255) NOT NULL,
        `IMAGE` VARCHAR(255) NULL,
        `INSTOCK` VARCHAR(255) NULL,
        `PACKAGE` VARCHAR(255) NULL,
        `PACKAGE_COUNT` VARCHAR(255) NULL,
        `UNIT` VARCHAR(255) NULL,
        `DATA` TEXT NULL,
        PRIMARY KEY(ID)
);
CREATE TABLE IF NOT EXISTS `itertech_cart_delivery` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `SITE_ID` CHAR(2) NOT NULL,
        `NAME` VARCHAR(255) NOT NULL,
        `DESCRIPTION` TEXT NOT NULL,
        `IMAGE` INT(11) NULL,
        `PRICE` DECIMAL(18,2) NOT NULL,
        `DELIVERY_TYPE` VARCHAR(255) NOT NULL,
        `ACTIVE` CHAR(1) NOT NULL DEFAULT 'Y',
        `DATA` varchar(1000) NOT NULL,
        `SORT` INT(11) NOT NULL,
        PRIMARY KEY(ID)
);
INSERT IGNORE INTO `itertech_cart_delivery` (`ID`,`SITE_ID`,`NAME`,`DESCRIPTION`,`IMAGE`,`PRICE`,`DELIVERY_TYPE`,`ACTIVE`,`SORT`) VALUES (1,'s1','Самовывоз','Вы можете самостоятельно забрать заказ из нашего магазина.',NULL,'0','pickup','Y','300');
INSERT IGNORE INTO `itertech_cart_delivery` (`ID`,`SITE_ID`,`NAME`,`DESCRIPTION`,`IMAGE`,`PRICE`,`ACTIVE`,`SORT`) VALUES (NULL,'s1','Доставка','Стоимость доставки уточняйте при подтверждении заказа.',NULL,'0','Y','100');
INSERT IGNORE INTO `itertech_cart_delivery` (`ID`,`SITE_ID`,`NAME`,`DESCRIPTION`,`IMAGE`,`PRICE`,`ACTIVE`,`SORT`) VALUES (NULL,'s1','Доставка в регион','Если Вы не можете забрать Ваш заказ самостоятельно, то наша компания организует отправку Ваших заказов в любой город России, который охвачен транспортными компаниями.',NULL,'0','Y','200');


CREATE TABLE IF NOT EXISTS `itertech_cart_payment` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `SITE_ID` CHAR(2) NOT NULL,
        `NAME` VARCHAR(255) NOT NULL,
        `DESCRIPTION` TEXT NOT NULL,
        `IMAGE` INT(11) NULL,
        `PAYMENT_TYPE` VARCHAR(255) NOT NULL,
        `ACTIVE` CHAR(1) NOT NULL DEFAULT 'Y',
        `DATA` VARCHAR(1000) NOT NULL,
        `SORT` INT(11) NOT NULL,
        PRIMARY KEY(ID)
);
INSERT INTO `itertech_cart_payment` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `PAYMENT_TYPE`, `ACTIVE`, `SORT`) VALUES (NULL, 's1', 'Наличные или картой', 'Оплата наличными или банковской картой при получении заказа', 'custom', 'Y', '100');
INSERT INTO `itertech_cart_payment` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `PAYMENT_TYPE`, `ACTIVE`, `SORT`) VALUES (NULL, 's1', 'Безналичный расчет (перечисление)', 'Банковский перевод', 'custom', 'Y', '200');


CREATE TABLE IF NOT EXISTS `itertech_cart_status` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `SITE_ID` CHAR(2) NOT NULL,
        `NAME` VARCHAR(255) NOT NULL,
        `DESCRIPTION` TEXT NOT NULL,
        `SEND_MESSAGE` CHAR(1) NOT NULL DEFAULT 'Y',
        `ACTIVE` CHAR(1) NOT NULL DEFAULT 'Y',
        `DEFAULT` CHAR(1) NOT NULL DEFAULT 'N',
        `FOR_PAYMENT` CHAR(1) NOT NULL DEFAULT 'N',
        `SORT` INT(11) NOT NULL,
        PRIMARY KEY(ID)
);
INSERT INTO `itertech_cart_status` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `SEND_MESSAGE`, `ACTIVE`, `DEFAULT`, `FOR_PAYMENT`,`SORT`) VALUES (NULL, 's1', 'Принят', '', 'Y', 'Y', 'Y', 'N', '100');
INSERT INTO `itertech_cart_status` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `SEND_MESSAGE`, `ACTIVE`, `DEFAULT`, `FOR_PAYMENT`,`SORT`) VALUES (NULL, 's1', 'Оплачен', '', 'Y', 'Y', 'N', 'Y', '200');
INSERT INTO `itertech_cart_status` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `SEND_MESSAGE`, `ACTIVE`, `DEFAULT`, `FOR_PAYMENT`,`SORT`) VALUES (NULL, 's1', 'Отправлен', '', 'Y', 'Y', 'N', 'N', '300');
INSERT INTO `itertech_cart_status` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `SEND_MESSAGE`, `ACTIVE`, `DEFAULT`, `FOR_PAYMENT`,`SORT`) VALUES (NULL, 's1', 'Завершен', '', 'Y', 'Y', 'N', 'N', '400');
INSERT INTO `itertech_cart_status` (`ID`, `SITE_ID`, `NAME`, `DESCRIPTION`, `SEND_MESSAGE`, `ACTIVE`, `DEFAULT`, `FOR_PAYMENT`,`SORT`) VALUES (NULL, 's1', 'Отменен', '', 'Y', 'Y', 'N', 'N', '500');


CREATE TABLE IF NOT EXISTS `itertech_cart_discount` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `SITE_ID` CHAR(2) NOT NULL,
        `NAME` VARCHAR(255) NOT NULL,
        `DESCRIPTION` TEXT NOT NULL,
        `TYPE` VARCHAR(255) NULL,
        `SUMM_ORDER` INT(11) NULL,
        `DISCOUNT` INT(11) NOT NULL,
        `PERCENT` CHAR(1) NOT NULL DEFAULT 'Y',
        `GROUPS` INT(11) NOT NULL,
        `PROMOCODE` VARCHAR(255) NULL,
        `MULTI` CHAR(1) NULL,
        `DATE_FROM` DATETIME NULL,
        `DATE_TO` DATETIME NULL,
        `ACTIVE` CHAR(1) NOT NULL DEFAULT 'Y',
        `SORT` INT(11) NOT NULL,
        `DATA` TEXT NOT NULL,

    PRIMARY KEY(ID)
);
