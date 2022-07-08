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

use YandexCheckout\Common\AbstractObject;

/**
 * ���������� ��������� �����������
 * @property string $fullName ������ ������������ �����������
 * @property string $shortName ����������� ������������ �����������
 * @property string $address ����� �����������
 * @property string $inn ��� �����������
 * @property string $kpp ��� �����������
 * @property string $bankName ������������ ����� �����������
 * @property string $bankBranch ��������� ����� �����������
 * @property string $bankBik ��� ����� �����������
 * @property string $account ����� ����� �����������
 */
class PayerBankDetails extends AbstractObject implements PayerBankDetailsInterface
{
    /**
     * @var string ������ ������������ �����������
     */
    private $_fullName;

    /**
     * @var string ����������� ������������ �����������
     */
    private $_shortName;

    /**
     * @var string ����� �����������
     */
    private $_address;

    /**
     * @var string ��� �����������
     */
    private $_inn;

    /**
     * @var string ��� �����������
     */
    private $_kpp;

    /**
     * @var string ������������ ����� �����������
     */
    private $_bankName;

    /**
     * @var string ��������� ����� �����������
     */
    private $_bankBranch;

    /**
     * @var string ��� ����� �����������
     */
    private $_bankBik;

    /**
     * @var string ����� ����� �����������
     */
    private $_account;

    /**
     * ���������� ������ ������������ �����������
     * @return string ������ ������������ �����������
     */
    public function getFullName()
    {
        return $this->_fullName;
    }

    /**
     * @param string $value
     */
    public function setFullName($value)
    {
        $this->_fullName = $value;
    }

    /**
     * ���������� ����������� ������������ �����������
     * @return string ����������� ������������ �����������
     */
    public function getShortName()
    {
        return $this->_shortName;
    }

    /**
     * @param string $value
     */
    public function setShortName($value)
    {
        $this->_shortName = $value;
    }

    /**
     * ���������� ����� �����������
     * @return string ����� �����������
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param string $value
     */
    public function setAddress($value)
    {
        $this->_address = $value;
    }

    /**
     * ���������� ��� �����������
     * @return string ��� �����������
     */
    public function getInn()
    {
        return $this->_inn;
    }

    /**
     * @param string $value
     */
    public function setInn($value)
    {
        $this->_inn = $value;
    }

    /**
     * ���������� ��� �����������
     * @return string ��� �����������
     */
    public function getKpp()
    {
        return $this->_kpp;
    }

    /**
     * @param string $value
     */
    public function setKpp($value)
    {
        $this->_kpp = $value;
    }

    /**
     * ���������� ������������ ����� �����������
     * @return string ������������ ����� �����������
     */
    public function getBankName()
    {
        return $this->_bankName;
    }

    /**
     * @param string $value
     */
    public function setBankName($value)
    {
        $this->_bankName = $value;
    }

    /**
     * ���������� ��������� ����� �����������
     * @return string ��������� ����� �����������
     */
    public function getBankBranch()
    {
        return $this->_bankBranch;
    }

    /**
     * @param string $value
     */
    public function setBankBranch($value)
    {
        $this->_bankBranch = $value;
    }

    /**
     * ���������� ��� ����� �����������
     * @return string ��� ����� �����������
     */
    public function getBankBik()
    {
        return $this->_bankBik;
    }

    /**
     * @param string $value
     */
    public function setBankBik($value)
    {
        $this->_bankBik = $value;
    }

    /**
     * ���������� ����� ����� �����������
     * @return string ����� ����� �����������
     */
    public function getAccount()
    {
        return $this->_account;
    }

    /**
     * @param string $value
     */
    public function setAccount($value)
    {
        $this->_account = $value;
    }

}