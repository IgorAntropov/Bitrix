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

use YandexCheckout\Common\AbstractObject;
use YandexCheckout\Common\Exceptions\EmptyPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueTypeException;
use YandexCheckout\Helpers\TypeCast;

/**
 * CancellationDetails - ����������� � ������ �������
 *
 * @property string $party ��������� ������ �������
 * @property string $reason ������� ������ �������
 */
class CancellationDetails extends AbstractObject implements CancellationDetailsInterface
{
    /**
     * @var string ��������� ������ �������
     */
    private $_party = '';

    /**
     * @var string ������� ������ �������
     */
    private $_reason = '';

    /**
     * CancellationDetails constructor.
     * @param string|null $party ��������� ������ �������
     * @param string|null $reason ������� ������ �������
     */
    public function __construct($party = null, $reason = null)
    {
        if ($party !== null) {
            $this->setParty($party);
        }
        if ($reason !== null) {
            $this->setReason($reason);
        }
    }

    /**
     * ���������� ��������� �������� �������, ������� ������ ������� �� ������ ����������
     *
     * @return string ��������� ������ �������
     */
    public function getParty()
    {
        return $this->_party;
    }

    /**
     * ���������� ������� ������ �������
     *
     * @return string ������� ������ �������
     */
    public function getReason()
    {
        return $this->_reason;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'party'    => $this->_party,
            'reason' => $this->_reason,
        );
    }

    /**
     * ������������� ��������� �������� �������, ������� ������ ������� �� ������ ����������
     * @param $value
     */
    public function setParty($value)
    {
        if ($value === null || $value === '') {
            throw new EmptyPropertyValueException('Empty party value', 0, 'cancellation_details.party');
        }
        if (TypeCast::canCastToEnumString($value)) {
            $value = strtolower((string)$value);
            if (CancellationDetailsPartyCode::valueExists($value)) {
                $this->_party = $value;
            } else {
                throw new InvalidPropertyValueException(
                    'Invalid party value: "'.$value.'"', 0, 'cancellation_details.party', $value
                );
            }
        } else {
            throw new InvalidPropertyValueTypeException('Invalid party value type', 0, 'cancellation_details.party',
                $value);
        }
    }

    /**
     * ������������� ������� ������ �������
     * @param $value
     */
    public function setReason($value)
    {
        if ($value === null || $value === '') {
            throw new EmptyPropertyValueException('Empty reason value', 0, 'cancellation_details.reason');
        }
        if (TypeCast::canCastToEnumString($value)) {
            $value = strtolower((string)$value);
            if (CancellationDetailsReasonCode::valueExists($value)) {
                $this->_reason = $value;
            } else {
                throw new InvalidPropertyValueException(
                    'Invalid reason value: "'.$value.'"', 0, 'cancellation_details.reason', $value
                );
            }
        } else {
            throw new InvalidPropertyValueTypeException('Invalid reason value type', 0, 'cancellation_details.reason',
                $value);
        }
    }
}