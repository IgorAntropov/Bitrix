<?php

/**
 * The MIT License
 *
 * Copyright (c) 2017 NBCO Yandex.Money LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace YandexCheckout\Model;

/**
 * Interface ReceiptItemInterface
 *
 * @package YandexCheckout\Model
 *
 * @property-read string $description ������������ ������
 * @property-read int $quantity ����������
 * @property-read int $amount  ��������� ��������� ����������� ������ � ��������/������
 * @property-read AmountInterface $price ���� ������
 * @property-read int $vatCode ������ ���, ����� 1-6
 * @property-read int $vat_code ������ ���, ����� 1-6
 */
interface ReceiptItemInterface
{
    /**
     * ���������� ������������ ������
     * @return string ������������ ������
     */
    function getDescription();

    /**
     * ���������� ���������� ������
     * @return float ���������� ���������� ������
     */
    function getQuantity();

    /**
     * ���������� ����� ��������� ����������� ������ � ��������/������
     * @return int ����� ��������� ����������� ������
     */
    function getAmount();

    /**
     * ���������� ���� ������
     * @return AmountInterface ���� ������
     */
    function getPrice();

    /**
     * ���������� ������ ���
     * @return int|null ������ ���, ����� 1-6, ��� null ���� ������ �� ������
     */
    function getVatCode();

    /**
     * ���������, �������� �� ������� ������� ���� ���������
     * @return bool True ���� ��������, false ���� ������� �����
     */
    function isShipping();
}