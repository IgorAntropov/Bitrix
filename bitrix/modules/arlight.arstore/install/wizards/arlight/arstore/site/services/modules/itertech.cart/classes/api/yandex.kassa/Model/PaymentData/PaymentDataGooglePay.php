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

namespace YandexCheckout\Model\PaymentData;

use YandexCheckout\Common\Exceptions\EmptyPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Helpers\TypeCast;
use YandexCheckout\Model\PaymentMethodType;

/**
 * PaymentDataGooglePay
 * ????????? ?????? ??? ?????????? ?????? ??? ?????? Google Pay.
 * @property string $paymentMethodToken ???????????? Payment Token Cryptography ??? ?????????? ?????? ????? Google Pay
 * @property string $googleTransactionId ?????????? ????????????? ??????????, ???????? Google
 */
class PaymentDataGooglePay extends AbstractPaymentData
{
    /**
     * @var string ???????????? Payment Token Cryptography ??? ?????????? ?????? ????? Google Pay
     */
    private $_paymentMethodToken;

    /**
     * @var string ?????????? ????????????? ??????????, ???????? Google
     */
    private $_googleTransactionId;

    public function __construct()
    {
        $this->_setType(PaymentMethodType::GOOGLE_PAY);
    }

    /**
     * @return string ???????????? Payment Token Cryptography ??? ?????????? ?????? ????? Google Pay
     */
    public function getPaymentMethodToken()
    {
        return $this->_paymentMethodToken;
    }

    /**
     * @param string $value ???????????? Payment Token Cryptography ??? ?????????? ?????? ????? Google Pay
     */
    public function setPaymentMethodToken($value)
    {
        if ($value === null || $value === '') {
            throw new EmptyPropertyValueException(
                'Empty value for paymentMethodToken', 0, 'PaymentDataGooglePay.paymentMethodToken'
            );
        } elseif (TypeCast::canCastToString($value)) {
            $this->_paymentMethodToken = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid value type for paymentMethodToken', 0, 'PaymentDataGooglePay.paymentMethodToken', $value
            );
        }
    }

    /**
     * @return string ?????????? ????????????? ??????????, ???????? Google
     */
    public function getGoogleTransactionId()
    {
        return $this->_googleTransactionId;
    }

    /**
     * @param string $value ?????????? ????????????? ??????????, ???????? Google
     */
    public function setGoogleTransactionId($value)
    {
        if ($value === null || $value === '') {
            throw new EmptyPropertyValueException(
                'Empty value for googleTransactionId', 0, 'PaymentDataGooglePay.googleTransactionId'
            );
        } elseif (TypeCast::canCastToString($value)) {
            $this->_googleTransactionId = (string)$value;
        } else {
            throw new InvalidPropertyValueTypeException(
                'Invalid value type for googleTransactionId', 0, 'PaymentDataGooglePay.googleTransactionId', $value
            );
        }
    }
}
