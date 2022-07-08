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

namespace YandexCheckout\Common;

use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Model\AmountInterface;
use YandexCheckout\Model\Receipt;
use YandexCheckout\Model\ReceiptInterface;

/**
 * ����� ������� ������� � API
 *
 * @property AmountInterface $amount �����
 * @property ReceiptInterface $receipt ������ ����������� ���� 54-��
 *
 * @since 1.0.18
 */
class AbstractPaymentRequest extends AbstractRequest
{
    /**
     * @var AmountInterface ����� ������
     */
    protected $_amount;

    /**
     * @var Receipt ������ ����������� ���� 54-��
     */
    protected $_receipt;

    /**
     * ���������� ����� ������
     * @return AmountInterface ����� ������
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * ��������� ���� �� ����������� ����� ������
     * @return bool True ���� ����� ������ ���� �����������, false ���� ���
     */
    public function hasAmount()
    {
        return !empty($this->_amount);
    }

    /**
     * ������������� ����� ������
     * @param AmountInterface $value ����� ������
     */
    public function setAmount(AmountInterface $value)
    {
        $this->_amount = $value;
    }

    /**
     * ���������� ���, ���� �� ����
     * @return ReceiptInterface|null ������ ����������� ���� 54-�� ��� null ���� ���� ���
     */
    public function getReceipt()
    {
        return $this->_receipt;
    }

    /**
     * ������������� ���
     * @param ReceiptInterface|null $value ������� ���� ��� null ��� �������� ���������� � ����
     * @throws InvalidPropertyValueTypeException ������������� ���� ������� �� ������� ������ ���� � �� null
     */
    public function setReceipt($value)
    {
        if ($value === null || $value instanceof ReceiptInterface) {
            $this->_receipt = $value;
        } else {
            throw new InvalidPropertyValueTypeException('Invalid receipt in Refund', 0, 'Refund.receipt', $value);
        }
    }

    /**
     * ��������� ������� ����
     * @return bool True ���� ��� ����, false ���� ���
     */
    public function hasReceipt()
    {
        return $this->_receipt !== null && $this->_receipt->notEmpty();
    }

    /**
     * ������� ��� �� �������
     */
    public function removeReceipt()
    {
        $this->_receipt = null;
    }

    /**
     * ���������� ������ �������
     * @return bool True ���� ������ ������� � ��� ����� ��������� � API, false ���� ���
     */
    public function validate()
    {
        if ($this->_amount === null) {
            $this->setValidationError('Payment amount not specified');
            return false;
        }

        $value = $this->_amount->getValue();
        if (empty($value) || $value <= 0.0) {
            $this->setValidationError('Invalid payment amount value: '.$value);
            return false;
        }

        if ($this->_receipt !== null && $this->_receipt->notEmpty()) {
            $email = $this->_receipt->getEmail();
            $phone = $this->_receipt->getPhone();
            if (empty($email) && empty($phone)) {
                $this->setValidationError('Both email and phone values are empty in receipt');
                return false;
            }
        }

        return true;
    }
}
