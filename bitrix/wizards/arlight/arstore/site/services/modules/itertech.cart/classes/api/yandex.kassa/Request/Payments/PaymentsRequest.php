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

namespace YandexCheckout\Request\Payments;

use YandexCheckout\Common\AbstractRequest;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Helpers\TypeCast;
use YandexCheckout\Model\PaymentStatus;

/**
 * ����� ������� ������� � API ��� ��������� ������ �������� ��������
 *
 * @property string|null $page �������� ������ �����������, ������� ���������� ����������
 * @property \DateTime|null $createdAtGte ����� ��������, �� (������������)
 * @property \DateTime|null $createdAtGt ����� ��������, �� (�� �������)
 * @property \DateTime|null $createdAtLte ����� ��������, �� (������������)
 * @property \DateTime|null $createdAtLt ����� ��������, �� (�� �������)
 * @property integer|null $limit ����������� ���������� �������� �������, ������������ �� ����� �������� ������
 * @property string|null $recipientGatewayId ������������� �����.
 * @property string|null $status ������ �������
 */
class PaymentsRequest extends AbstractRequest implements PaymentsRequestInterface
{
    const MAX_LIMIT_VALUE = 100;

    /**
     * @var string �������� ������ �����������, ������� ���������� ����������
     */
    private $_page;

    /**
     * @var \DateTime ����� ��������, �� (������������)
     */
    private $_createdAtGte;

    /**
     * @var \DateTime ����� ��������, �� (�� �������)
     */
    private $_createdAtGt;

    /**
     * @var \DateTime ����� ��������, �� (������������)
     */
    private $_createdAtLte;

    /**
     * @var \DateTime ����� ��������, �� (�� �������)
     */
    private $_createdAtLt;

    /**
     * @var string ����������� ���������� �������� �������
     */
    private $_limit;

    /**
     * @var string ������������� �����
     */
    private $_recipientGatewayId;

    /**
     * @var string ������ �������
     */
    private $_status;

    /**
     * �������� ������ �����������, ������� ���������� ����������
     * @return string|null
     */
    public function getPage()
    {
        return $this->_page;
    }

    /**
     * ��������� ��� �� ����������� �������� ������ �����������, ������� ���������� ����������
     * @return bool True ���� ���� �����������, false ���� ���
     */
    public function hasPage()
    {
        return $this->_page !== null;
    }

    /**
     * ������������� c������w ������ �����������, ������� ���������� ����������
     * @param string $value �������� ������ ����������� ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setPage($value)
    {
        if ($value === null || $value === '') {
            $this->_page = null;
        } elseif (TypeCast::canCastToString($value)) {
            $this->_page = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid status value in PaymentsRequest', 0, 'PaymentsRequest.page', $value
            );
        }
    }

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (������������)
     */
    public function getCreatedAtGte()
    {
        return $this->_createdAtGte;
    }

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    public function hasCreatedAtGte()
    {
        return $this->_createdAtGte !== null;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (������������) ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtGte($value)
    {
        if ($value === null || $value === '') {
            $this->_createdAtGte = null;
        } elseif (TypeCast::canCastToDateTime($value)) {
            $dateTime = TypeCast::castToDateTime($value);
            if ($dateTime === null) {
                throw new InvalidPropertyValueException(
                    'Invalid createdAtGte value in PaymentsRequest', 0, 'PaymentRequest.createdAtGte'
                );
            }
            $this->_createdAtGte = $dateTime;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid createdAtGte value type in PaymentsRequest', 0, 'PaymentRequest.createdAtGte'
            );
        }
    }

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (�� �������)
     */
    public function getCreatedAtGt()
    {
        return $this->_createdAtGt;
    }

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    public function hasCreatedAtGt()
    {
        return $this->_createdAtGt !== null;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (�� �������) ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtGt($value)
    {
        if ($value === null || $value === '') {
            $this->_createdAtGt = null;
        } elseif (TypeCast::canCastToDateTime($value)) {
            $dateTime = TypeCast::castToDateTime($value);
            if ($dateTime === null) {
                throw new InvalidPropertyValueException(
                    'Invalid createdAtGt value in PaymentsRequest', 0, 'PaymentRequest.createdAtGt'
                );
            }
            $this->_createdAtGt = $dateTime;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid createdAtGt value type in PaymentsRequest', 0, 'PaymentRequest.createdAtGt'
            );
        }
    }

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (������������)
     */
    public function getCreatedAtLte()
    {
        return $this->_createdAtLte;
    }

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    public function hasCreatedAtLte()
    {
        return $this->_createdAtLte !== null;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (������������) ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtLte($value)
    {
        if ($value === null || $value === '') {
            $this->_createdAtLte = null;
        } elseif (TypeCast::canCastToDateTime($value)) {
            $dateTime = TypeCast::castToDateTime($value);
            if ($dateTime === null) {
                throw new InvalidPropertyValueException(
                    'Invalid createdAtLte value in PaymentsRequest', 0, 'PaymentRequest.createdAtLte'
                );
            }
            $this->_createdAtLte = $dateTime;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid createdAtLte value type in PaymentsRequest', 0, 'PaymentRequest.createdAtLte'
            );
        }
    }

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (�� �������)
     */
    public function getCreatedAtLt()
    {
        return $this->_createdAtLt;
    }

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    public function hasCreatedAtLt()
    {
        return $this->_createdAtLt !== null;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (�� �������) ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtLt($value)
    {
        if ($value === null || $value === '') {
            $this->_createdAtLt = null;
        } elseif (TypeCast::canCastToDateTime($value)) {
            $dateTime = TypeCast::castToDateTime($value);
            if ($dateTime === null) {
                throw new InvalidPropertyValueException(
                    'Invalid createdAtLt value in PaymentsRequest', 0, 'PaymentRequest.createdAtLt'
                );
            }
            $this->_createdAtLt = $dateTime;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid createdAlLt value type in PaymentsRequest', 0, 'PaymentRequest.createdAtLt'
            );
        }
    }

    /**
     * ����������� ���������� �������� �������
     * @return integer|null ����������� ���������� �������� �������
     */
    public function getLimit()
    {
        return $this->_limit;
    }

    /**
     * ��������� ��� �� ����������� ����������� ���������� �������� �������
     * @return bool True ���� ���� �����������, false ���� ���
     */
    public function hasLimit()
    {
        return $this->_limit !== null;
    }

    /**
     * ������������� ����������� ���������� �������� �������
     * @param integer|null $value ����������� ���������� �������� ������� ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ����� �����
     */
    public function setLimit($value)
    {
        if ($value === null) {
            $this->_limit = null;
        } elseif (is_int($value)) {
            if ($value < 0 || $value > self::MAX_LIMIT_VALUE) {
                throw new InvalidPropertyValueException(
                    'Invalid limit value in PaymentsRequest', 0, 'PaymentsRequest.limit', $value
                );
            }
            $this->_limit = $value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid limit value type in PaymentsRequest', 0, 'PaymentsRequest.limit', $value
            );
        }
    }

    /**
     * ���������� ������������� �����
     * @return string|null ������������� �����
     */
    public function getRecipientGatewayId()
    {
        return $this->_recipientGatewayId;
    }

    /**
     * ��������� ��� �� ���������� ������������� �����
     * @return bool True ���� ������������� ����� ��� ����������, false ���� ���
     */
    public function hasRecipientGatewayId()
    {
        return $this->_recipientGatewayId !== null;
    }

    /**
     * ������������� ������������� �����
     * @param string|null $value ������������� ����� ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setRecipientGatewayId($value)
    {
        if ($value === null || $value === '') {
            $this->_recipientGatewayId = null;
        } elseif (TypeCast::canCastToString($value)) {
            $this->_recipientGatewayId = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid recipientGatewayId value type in PaymentsRequest', 0, 'PaymentsRequest.recipientGatewayId',
                $value
            );
        }
    }

    /**
     * ���������� ������ ���������� �������� ��� null ���� �� �� ����� �� ��� ����������
     * @return string|null ������ ���������� ��������
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * ��������� ��� �� ���������� ������ ���������� ��������
     * @return bool True ���� ������ ��� ����������, false ���� ���
     */
    public function hasStatus()
    {
        return $this->_status !== null;
    }

    /**
     * ������������� ������ ���������� ��������
     * @param string $value ������ ���������� �������� ��� null ����� ������� ��������
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� �������� �� �������� �������� ��������
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setStatus($value)
    {
        if ($value === null || $value === '') {
            $this->_status = null;
        } elseif (TypeCast::canCastToEnumString($value)) {
            if (!PaymentStatus::valueExists((string)$value)) {
                throw new InvalidPropertyValueException(
                    'Invalid status value in PaymentsRequest', 0, 'PaymentsRequest.status', $value
                );
            } else {
                $this->_status = (string)$value;
            }
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid status value in PaymentsRequest', 0, 'PaymentsRequest.status', $value
            );
        }
    }


    /**
     * ��������� ���������� �������� ������� �������
     * @return bool True ���� ������ �������, false ���� ���
     */
    public function validate()
    {
        return true;
    }

    /**
     * ���������� ������� ������� �������� �������� ������ �������� ��������
     * @return PaymentsRequestBuilder ������ �������� �������� ������ ��������
     */
    public static function builder()
    {
        return new PaymentsRequestBuilder();
    }
}
