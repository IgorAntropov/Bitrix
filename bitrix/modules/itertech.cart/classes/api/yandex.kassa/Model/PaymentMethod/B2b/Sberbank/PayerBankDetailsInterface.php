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

namespace YandexCheckout\Model\PaymentMethod\B2b\Sberbank;

/**
 * Interface PayerBankDetailsInterface
 *
 * @package YandexCheckout\Model
 *
 * @property-read string $fullName ������ ������������ �����������
 * @property-read string $shortName ����������� ������������ �����������
 * @property-read string $address ����� �����������
 * @property-read string $inn ��� �����������
 * @property-read string $kpp ��� �����������
 * @property-read string $bankName ������������ ����� �����������
 * @property-read string $bankBranch ��������� ����� �����������
 * @property-read string $bankBik ��� ����� �����������
 * @property-read string $account ����� ����� �����������
 */
interface PayerBankDetailsInterface
{
    /**
     * ���������� ������ ������������ �����������
     * @return string ������ ������������ �����������
     */
    function getFullName();

    /**
     * ���������� ����������� ������������ �����������
     * @return string ����������� ������������ �����������
     */
    function getShortName();

    /**
     * ���������� ����� �����������
     * @return string ����� �����������
     */
    function getAddress();

    /**
     * ���������� ��� �����������
     * @return string ��� �����������
     */
    function getInn();

    /**
     * ���������� ��� �����������
     * @return string ��� �����������
     */
    function getKpp();

    /**
     * ���������� ������������ ����� �����������
     * @return string ������������ ����� �����������
     */
    function getBankName();

    /**
     * ���������� ��������� ����� �����������
     * @return string ��������� ����� �����������
     */
    function getBankBranch();

    /**
     * ���������� ��� ����� �����������
     * @return string ��� ����� �����������
     */
    function getBankBik();

    /**
     * ���������� ����� ����� �����������
     * @return string ����� ����� �����������
     */
    function getAccount();

}

