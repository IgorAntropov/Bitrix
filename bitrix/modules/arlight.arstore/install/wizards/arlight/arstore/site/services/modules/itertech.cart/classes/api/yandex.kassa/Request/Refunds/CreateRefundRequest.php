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

namespace YandexCheckout\Request\Refunds;

use YandexCheckout\Common\AbstractPaymentRequest;
use YandexCheckout\Common\Exceptions\EmptyPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Helpers\TypeCast;
use YandexCheckout\Model\AmountInterface;
use YandexCheckout\Model\ReceiptInterface;

/**
 * ����� ������� ������� ��� �������� ��������
 *
 * @property string $paymentId ���� ������� ��� �������� �������� �������
 * @property AmountInterface $amount ����� ��������
 * @property string $comment ����������� � �������� ��������, ��������� ��� �������� ������� ����������.
 * @property ReceiptInterface|null $receipt ������� ���� ��� null
 */
class CreateRefundRequest extends AbstractPaymentRequest implements CreateRefundRequestInterface
{
    /**
     * @var string ���� ������� ��� �������� �������� �������
     */
    private $_paymentId;

    /**
     * @var string ����������� � �������� ��������, ��������� ��� �������� ������� ����������.
     */
    private $_comment;

    /**
     * ���������� ���� ������� ��� �������� �������� ������� �������
     * @return string ���� ������� ��� �������� �������� �������
     */
    public function getPaymentId()
    {
        return $this->_paymentId;
    }

    /**
     * ������������� ���� ������� ��� �������� �������� �������
     * @param string $value ���� �������
     *
     * @throws EmptyPropertyValueException ������������� ���� �������� ������ �������� ���� �������
     * @throws InvalidPropertyValueException ������������� ���� ���������� �������� �������� �������, �� �� ��������
     * �������� ��������� ���� �������
     * @throws InvalidPropertyValueTypeException ������������� ���� �������� �������� �� ��������� ����
     */
    public function setPaymentId($value)
    {
        if ($value === null || $value === '') {
            throw new EmptyPropertyValueException(
                'Empty payment id value in CreateRefundRequest', 0, 'CreateRefundRequest.paymentId'
            );
        } elseif (TypeCast::canCastToString($value)) {
            $length = mb_strlen($value, 'utf-8');
            if ($length != 36) {
                throw new InvalidPropertyValueException(
                    'Invalid payment id value in CreateRefundRequest', 0, 'CreateRefundRequest.paymentId', $value
                );
            }
            $this->_paymentId = (string)$value;
        } else {
            throw new InvalidPropertyValueException(
                'Invalid payment id value type in CreateRefundRequest', 0, 'CreateRefundRequest.paymentId', $value
            );
        }
    }

    /**
     * ���������� ����������� � �������� ��� null, ���� ����������� �� �����
     * @return string ����������� � �������� ��������, ��������� ��� �������� ������� ����������.
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * ��������� ����� �� ����������� � ������������ ��������
     * @return bool True ���� ����������� ����������, false ���� ���
     */
    public function hasComment()
    {
        return $this->_comment !== null;
    }

    /**
     * ������������� ����������� � ��������
     * @param string $value ����������� � �������� ��������, ��������� ��� �������� ������� ����������
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� ������ ������ 250 ��������
     * @throws InvalidPropertyValueTypeException ������������� ���� ���� �������� �� ������
     */
    public function setComment($value)
    {
        if ($value === null || $value === '') {
            $this->_comment = null;
        } elseif (TypeCast::canCastToString($value)) {
            $length = mb_strlen($value, 'utf-8');
            if ($length > 250) {
                throw new InvalidPropertyValueException(
                    'Invalid commend value in CreateRefundRequest', 0, 'CreateRefundRequest.comment', $value
                );
            }
            $this->_comment = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid commend value type in CreateRefundRequest', 0, 'CreateRefundRequest.comment', $value
            );
        }
    }

    /**
     * ���������� ������� ������ �������
     * @return bool True ���� ������� ������ ������� �������, false ���� ���
     */
    public function validate()
    {
        if (!parent::validate()) {
            return false;
        }

        if (empty($this->_paymentId)) {
            $this->setValidationError('Payment id not specified');
            return false;
        }
        return true;
    }

    /**
     * ���������� ������ �������� �������� ����
     * @return CreateRefundRequestBuilder ������� ������� �������
     */
    public static function builder()
    {
        return new CreateRefundRequestBuilder();
    }
}
