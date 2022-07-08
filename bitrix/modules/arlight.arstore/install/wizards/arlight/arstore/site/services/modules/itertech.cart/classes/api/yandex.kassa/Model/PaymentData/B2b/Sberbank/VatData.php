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

namespace YandexCheckout\Model\PaymentData\B2b\Sberbank;

use YandexCheckout\Common\AbstractObject;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Helpers\TypeCast;
use YandexCheckout\Model\AmountInterface;
use YandexCheckout\Model\MonetaryAmount;

/**
 * ������ �� ���
 * @property string $type ������ ������� ���
 * @property string $rate ������ �� ��� � ������, ���� ����� ��� �������� � ����� �������
 * @property AmountInterface $amount ����� ���
 */
class VatData extends AbstractObject implements VatDataInterface
{
    /**
     * @var string ������ ������� ���
     */
    private $_type;

    /**
     * @var string ��������� ������ ���
     */
    private $_rate;

    /**
     * @var AmountInterface ����� ���
     */
    private $_amount;

    /**
     * VatData constructor.
     * @param string|null $type ������ ������� ���
     * @param string|null $rate ��������� ������ ���
     * @param AmountInterface|null $amount ����� ���
     */
    public function __construct($type = null, $rate = null, $amount = null)
    {
        if ($type !== null) {
            $this->setType($type);
        }
        if ($rate !== null) {
            $this->setRate($rate);
        }
        if ($rate !== null) {
            $this->setAmount($amount);
        }
    }

    /**
     * @return string ������ ������� ���
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * ������������� ������ ������� ���
     * @param string $value ������ ������� ���
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� ������ �� �������� �������� ��������
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setType($value)
    {
        if (TypeCast::canCastToEnumString($value)) {
            if (!VatDataType::valueExists((string)$value)) {
                throw new InvalidPropertyValueException('Invalid B2bSberbankVatData.type value', 0,
                    'B2bSberbankVatData.type', $value);
            }
            $this->_type = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid B2bSberbankVatData.type value type', 0, 'B2bSberbankVatData.type', $value
            );
        }
    }

    /**
     * @return string ��������� ������ ���
     */
    public function getRate()
    {
        return $this->_rate;
    }

    /**
     * ������������� ��������� ������ ���
     * @param string $value ��������� ������ ���
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� ������ �� �������� �������� �������
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setRate($value)
    {
        if (TypeCast::canCastToEnumString($value)) {
            if (!VatDataRate::valueExists((string)$value)) {
                throw new InvalidPropertyValueException('Invalid B2bSberbankVatData.rate value', 0,
                    'B2bSberbankVatData.rate', $value);
            }
            $this->_rate = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid B2bSberbankVatData.rate value type', 0, 'B2bSberbankVatData.rate', $value
            );
        }
    }

    /**
     * ���������� ����� ���
     * @return AmountInterface ����� ���
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * ������������� ����� ���
     * @param AmountInterface|array|null $value ����� ���
     */
    public function setAmount($value)
    {
        if ($value === null) {
            $this->_amount = null;
        } elseif ($value instanceof AmountInterface) {
            $this->_amount = $value;
        } elseif (is_array($value)) {
            $this->_amount = new MonetaryAmount();
            $this->_amount->fromArray($value);
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid B2bSberbankVatData.amount value type', 0, 'B2bSberbankVatData.amount', $value
            );
        }
    }

}
