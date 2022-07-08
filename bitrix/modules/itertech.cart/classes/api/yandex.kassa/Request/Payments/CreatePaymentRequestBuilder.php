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

use YandexCheckout\Common\AbstractPaymentRequestBuilder;
use YandexCheckout\Common\Exceptions\EmptyPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Common\Exceptions\InvalidRequestException;
use YandexCheckout\Model\Airline;
use YandexCheckout\Model\AirlineInterface;
use YandexCheckout\Model\ConfirmationAttributes\AbstractConfirmationAttributes;
use YandexCheckout\Model\ConfirmationAttributes\ConfirmationAttributesFactory;
use YandexCheckout\Model\Metadata;
use YandexCheckout\Model\PaymentData\AbstractPaymentData;
use YandexCheckout\Model\PaymentData\PaymentDataFactory;
use YandexCheckout\Model\Recipient;
use YandexCheckout\Model\RecipientInterface;

/**
 * ����� ������� �������� ������� � API �� �������� �������
 *
 * @package YandexCheckout\Request\Payments
 */
class CreatePaymentRequestBuilder extends AbstractPaymentRequestBuilder
{
    /**
     * @var CreatePaymentRequest ���������� ������ �������
     */
    protected $currentObject;

    /**
     * @var Recipient ���������� �������
     */
    private $recipient;

    /**
     * @var PaymentDataFactory ������� ������� ���������� ��������
     */
    private $paymentDataFactory;

    /**
     * @var ConfirmationAttributesFactory ������� �������� ������� ������������� ��������
     */
    private $confirmationFactory;

    /**
     * @var Airline ������� ������
     */
    private $airline;

    /**
     * �������������� ������ �������, ������� � ���������� ����� ���������� ��������
     * @return CreatePaymentRequest ������� ����������� ������� ������� � API
     */
    protected function initCurrentObject()
    {
        parent::initCurrentObject();

        $request = new CreatePaymentRequest();

        $this->recipient = new Recipient();
        $this->airline = new Airline();

        return $request;
    }

    /**
     * ������������� ������������� �������� ���������� �������
     * @param string $value ������������� ��������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws EmptyPropertyValueException ������������� ���� ���� �������� ������ ��������
     * @throws InvalidPropertyValueTypeException ������������� ���� ���� �������� �� ��������� ��������
     */
    public function setAccountId($value)
    {
        $this->recipient->setAccountId($value);
        return $this;
    }

    /**
     * ������������� ������������� �����
     * @param string $value ������������� �����
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws EmptyPropertyValueException ������������� ���� ���� �������� ������ ��������
     * @throws InvalidPropertyValueTypeException ������������� ���� ���� �������� �� ��������� ��������
     */
    public function setGatewayId($value)
    {
        $this->recipient->setGatewayId($value);
        return $this;
    }

    /**
     * ������������� ���������� ������� �� ������� ��� �������������� �������
     * @param RecipientInterface|array $value ���������� �������
     * @return CreatePaymentRequestBuilder
     * @throws InvalidPropertyValueTypeException ������������� ���� ������� �������� �� ��������� ����
     */
    public function setRecipient($value)
    {
        if (is_array($value)) {
            $this->recipient->fromArray($value);
        } elseif ($value instanceof RecipientInterface) {
            $this->recipient->setAccountId($value->getAccountId());
            $this->recipient->setGatewayId($value->getGatewayId());
        } else {
            throw new InvalidPropertyValueTypeException('Invalid recipient value', 0, 'recipient', $value);
        }
        return $this;
    }

    /**
     * @param AirlineInterface|array $value ������ ������ ������� ������ ��� ������������� ������ � �������
     *
     * @return CreatePaymentRequestBuilder
     */
    public function setAirline($value)
    {
        if (is_array($value)) {
            $this->airline->fromArray($value);
        } elseif ($value instanceof AirlineInterface) {
            $this->airline = clone $value;
        } else {
            throw new InvalidPropertyValueTypeException('Invalid receipt value type', 0, 'receipt', $value);
        }


        return $this;
    }

    /**
     * ������������� ����������� ����� ��� ���������� ������
     * @param string $value ����������� ����� ��� ���������� ������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� �������� ��������� ���������� �����
     * @throws InvalidPropertyValueTypeException ������������� ���� ���������� �������� �� �������� �������
     */
    public function setPaymentToken($value)
    {
        $this->currentObject->setPaymentToken($value);
        return $this;
    }

    /**
     * ������������� ������������� ������ � ���������� ������ ����������
     * @param string $value ������������� ������ � ����������� ��������� ������ ����������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������ ���� ���������� �������� �� �������� ������� ��� null
     */
    public function setPaymentMethodId($value)
    {
        $this->currentObject->setPaymentMethodId($value);
        return $this;
    }

    /**
     * ������������� ������ � ����������� ��� �������� ������ ������
     * @param AbstractPaymentData|string|array|null $value ������ � �������� ������ ������ ��� null
     * @param array $options ��������� ������� ������ � ���� �������������� �������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� ��� ������� ������ ����������� ����
     */
    public function setPaymentMethodData($value, array $options = null)
    {
        if (is_string($value) && $value !== '') {
            if (empty($options)) {
                $value = $this->getPaymentDataFactory()->factory($value);
            } else {
                $value = $this->getPaymentDataFactory()->factoryFromArray($options, $value);
            }
        } elseif (is_array($value)) {
            $value = $this->getPaymentDataFactory()->factoryFromArray($value);
        }
        $this->currentObject->setPaymentMethodData($value);
        return $this;
    }

    /**
     * ������������� ������ ������������� �������
     * @param AbstractConfirmationAttributes|string|array|null $value ������ ������������� �������
     * @param array|null $options ��������� ������� ������������� ������� � ���� �������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� ���������� �������� �� �������� �������� ����
     * AbstractConfirmationAttributes ��� null
     */
    public function setConfirmation($value, array $options = null)
    {
        if (is_string($value) && $value !== '') {
            if (empty($options)) {
                $value = $this->getConfirmationFactory()->factory($value);
            } else {
                $value = $this->getConfirmationFactory()->factoryFromArray($options, $value);
            }
        } elseif (is_array($value)) {
            $value = $this->getConfirmationFactory()->factoryFromArray($value);
        }
        $this->currentObject->setConfirmation($value);
        return $this;
    }

    /**
     * ������������� ���� ���������� �������� ������. �������� true ���������� �������� ������������� payment_method.
     * @param bool $value ��������� ��������� ������ ��� ������������ �������������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������ ���� ���������� �������� �� �������� � bool
     */
    public function setSavePaymentMethod($value)
    {
        $this->currentObject->setSavePaymentMethod($value);
        return $this;
    }

    /**
     * ������������� ���� ��������������� �������� ����������� ������
     * @param bool $value ������������� ������� ����������� ������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������ ���� ���������� �������� �� �������� � bool

     */
    public function setCapture($value)
    {
        $this->currentObject->setCapture($value);
        return $this;
    }

    /**
     * ������������� IP ����� ����������
     * @param string $value IPv4 ��� IPv6-����� ����������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� ���������� �������� �� �������� �������
     */
    public function setClientIp($value)
    {
        $this->currentObject->setClientIp($value);
        return $this;
    }

    /**
     * ������������� ����������, ����������� � �������
     * @param Metadata|array|null $value ���������� �������, ��������������� ���������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueTypeException ������������� ���� ���������� ������ �� ������� ���������������� ���
     * ���������� �������
     */
    public function setMetadata($value)
    {
        $this->currentObject->setMetadata($value);
        return $this;
    }

    /**
     * ������������� �������� ����������
     * @param string $value �������� ����������
     * @return CreatePaymentRequestBuilder ������� �������� �������
     *
     * @throws InvalidPropertyValueException ������������� ���� ���������� �������� ��������� ���������� �����
     * @throws InvalidPropertyValueTypeException ������������� ���� ���������� �������� �� �������� �������
     */
    public function setDescription($value)
    {
        $this->currentObject->setDescription($value);
        return $this;
    }

    /**
     * ������ � ���������� ������ ������� ��� �������� � API ������ �����
     * @param array|null $options ������ ���������� ��� ��������� � ������ �������
     * @return CreatePaymentRequestInterface ������� ������� �������
     *
     * @throws InvalidRequestException ������������� ���� ������� ������ ������� �� �������
     */
    public function build(array $options = null)
    {
        if (!empty($options)) {
            $this->setOptions($options);
        }
        $accountId = $this->recipient->getAccountId();
        $gatewayId = $this->recipient->getGatewayId();
        if (!empty($accountId) && !empty($gatewayId)) {
            $this->currentObject->setRecipient($this->recipient);
        }
        if ($this->receipt->notEmpty()) {
            $this->currentObject->setReceipt($this->receipt);
        }
        if($this->airline->notEmpty()){
            $this->currentObject->setAirline($this->airline);
        }
        $this->currentObject->setAmount($this->amount);
        return parent::build();
    }

    /**
     * ���������� ������� ������� ���������� ��������
     * @return PaymentDataFactory ������� ������� ���������� ��������
     */
    protected function getPaymentDataFactory()
    {
        if ($this->paymentDataFactory === null) {
            $this->paymentDataFactory = new PaymentDataFactory();
        }
        return $this->paymentDataFactory;
    }

    /**
     * ���������� ������� ��� �������� ������� ������������� ��������
     * @return ConfirmationAttributesFactory ������� �������� ������� ������������� ��������
     */
    protected function getConfirmationFactory()
    {
        if ($this->confirmationFactory === null) {
            $this->confirmationFactory = new ConfirmationAttributesFactory();
        }
        return $this->confirmationFactory;
    }
}