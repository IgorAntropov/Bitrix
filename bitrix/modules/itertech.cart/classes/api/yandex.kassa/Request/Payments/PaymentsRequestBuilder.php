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

use YandexCheckout\Common\AbstractRequestBuilder;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;

/**
 * ������ �������� �������� � API ��� ���������� ������ �������� ��������
 *
 * @package YandexCheckout\Request\Payments
 */
class PaymentsRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @var PaymentsRequest ���������� ������ ������� ������ �������� ��������
     */
    protected $currentObject;

    /**
     * ���������� ����� ������ ������� ��� ��������� ������ ��������, ������� � ���������� ����� ���������� � �������
     * @return PaymentsRequest ������ ������� ������ �������� ��������
     */
    protected function initCurrentObject()
    {
        return new PaymentsRequest();
    }

    /**
     * ������������� �������� ������ �����������
     * @param string|null $value �������� ������ ����������� ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setPage($value)
    {
        $this->currentObject->setPage($value);
        return $this;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (�� �������) ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtGt($value)
    {
        $this->currentObject->setCreatedAtGt($value);
        return $this;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (������������) ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtGte($value)
    {
        $this->currentObject->setCreatedAtGte($value);
        return $this;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (�� �������) ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtLt($value)
    {
        $this->currentObject->setCreatedAtLt($value);
        return $this;
    }

    /**
     * ������������� ���� �������� �� ������� ���������� �������
     * @param \DateTime|string|int|null $value ����� ��������, �� (������������) ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������ ���� ���� �������� ���� � ���������� ������� (���� ��������
     * ������ ��� �����, ������� �� ������� ������������� � �������� ����)
     * @throws InvalidPropertyValueTypeException ������������ ���� ���� �������� ���� � �� ��� ����� (�������� ��
     * ������, �� ����� � �� �������� ���� \DateTime)
     */
    public function setCreatedAtLte($value)
    {
        $this->currentObject->setCreatedAtLte($value);
        return $this;
    }

    /**
     * ������������� ����������� ���������� �������� �������
     * @param string $value ����������� ���������� �������� ������� ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ����� �����
     */
    public function setLimit($value)
    {
        $this->currentObject->setLimit($value);
        return $this;
    }

    /**
     * ������������� ������������� �����
     * @param string|null $value ������������� ����� ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setRecipientGatewayId($value)
    {
        $this->currentObject->setRecipientGatewayId($value);
        return $this;
    }

    /**
     * ������������� ������ ���������� ��������
     * @param string $value ������ ���������� �������� ��� null ����� ������� ��������
     * @return PaymentsRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� �������� �� �������� �������� ��������
     * @throws InvalidPropertyValueTypeException ������������� ���� � ����� ���� �������� �� ������
     */
    public function setStatus($value)
    {
        $this->currentObject->setStatus($value);
        return $this;
    }

    /**
     * �������� � ���������� ������ ������� ������ �������� ��������
     * @param array|null $options ������ � ����������� �������
     * @return PaymentsRequestInterface ������� ������� ������� � API ��� ��������� ������ ��������� ��������
     */
    public function build(array $options = null)
    {
        return parent::build($options);
    }
}
