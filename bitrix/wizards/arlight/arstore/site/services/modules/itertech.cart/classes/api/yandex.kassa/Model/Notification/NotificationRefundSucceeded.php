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

namespace YandexCheckout\Model\Notification;


use YandexCheckout\Common\Exceptions\EmptyPropertyValueException;
use YandexCheckout\Common\Exceptions\InvalidPropertyValueException;
use YandexCheckout\Model\NotificationEventType;
use YandexCheckout\Model\NotificationType;
use YandexCheckout\Model\Refund;
use YandexCheckout\Model\RefundInterface;
use YandexCheckout\Request\Refunds\RefundResponse;

class NotificationRefundSucceeded extends AbstractNotification
{
    /**
     * ������ ���������, ��� �������� ������ �����������. ��� ��� ����������� ����� ���� ������������� � ���������� �
     * ������� �� �������� ������� ������, ��� ��� ����� �������� �� �����, �� ��������� �� ������ ����������
     * �������� �� �����, ����� ��������� ������� ���������� � �������� � API.
     *
     * @var Refund ������ �������
     */
    private $_object;

    /**
     * ����������� ������� �����������
     *
     * �������������� ������� ������ �� �������������� �������, ������� ������ ���� JSON �������������� ������� ��
     * ���� ���������� �������. ��� ��������������� ����������� ���������� ���� ������������� �����������, ����
     * �������� ����������� �� ���� ����, ����� ������������� ���������� ���� {@link InvalidPropertyValueException}
     *
     * @param array $source ������������� ������ � ����������� � �����������
     *
     * @throws InvalidPropertyValueException ������������ ���� �������� ���� ����������� ��� ������� �� �����
     * "notification" � "refund.succeeded" ��������������, ��� ����� �������� � ���, ��� ���������� �
     * ����������� ������ �� �������� ������������ ������� ����.
     */
    public function __construct(array $source)
    {
        $this->_setType(NotificationType::NOTIFICATION);
        $this->_setEvent(NotificationEventType::REFUND_SUCCEEDED);
        if (!empty($source['type'])) {
            if ($this->getType() !== $source['type']) {
                throw new InvalidPropertyValueException(
                    'Invalid value for "type" parameter in Notification', 0, 'notification.type', $source['type']
                );
            }
        }
        if (!empty($source['event'])) {
            if ($this->getEvent() !== $source['event']) {
                throw new InvalidPropertyValueException(
                    'Invalid value for "event" parameter in Notification', 0, 'notification.event', $source['event']
                );
            }
        }
        if (empty($source['object'])) {
            throw new EmptyPropertyValueException('Parameter object in NotificationSucceeded is empty');
        }
        $this->_object = new RefundResponse($source['object']);
    }

    /**
     * ���������� ������ � ����������� � ��������, ����������� � ������� �������� � ������� �������
     *
     * ��� ��� ����������� ����� ���� ������������� � ���������� � ������� �� �������� ������� ������, ��� ��� �����
     * �������� �� �����, �� ��������� �� ������ ���������� �������� �� �����, ����� ��������� ������� ���������� �
     * �������� � API.
     *
     * @return RefundInterface ������ � ����������� � ��������
     */
    public function getObject()
    {
        return $this->_object;
    }
}