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

/**
 * Interface PaymentsRequestInterface
 *
 * @package YandexCheckout\Request\Payments
 *
 * @property-read string|null $page �������� ������ �����������, ������� ���������� ����������
 * @property-read \DateTime|null $createdAtGte ����� ��������, �� (������������)
 * @property-read \DateTime|null $createdAtGt ����� ��������, �� (�� �������)
 * @property-read \DateTime|null $createdAtLte ����� ��������, �� (������������)
 * @property-read \DateTime|null $createdAtLt ����� ��������, �� (�� �������)
 * @property-read integer|null $limit ����������� ���������� �������� �������, ������������ �� ����� �������� ������
 * @property-read string|null $recipientGatewayId ������������� �����.
 * @property-read string|null $status ������ �������
 */
interface PaymentsRequestInterface
{
    /**
     * ���������� �������� ������ ����������� ��� null ���� ��� �� ����� �� ���� �����������
     * @return string|null �������� ������ �����������
     */
    function getPage();

    /**
     * ��������� ���� �� ����������� �������� ������ �����������
     * @return bool True ���� �������� ������ ����������� ���� �����������, false ���� ���
     */
    function hasPage();

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (������������)
     */
    function getCreatedAtGte();

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    function hasCreatedAtGte();

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (�� �������)
     */
    function getCreatedAtGt();

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    function hasCreatedAtGt();

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (������������)
     */
    function getCreatedAtLte();

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    function hasCreatedAtLte();

    /**
     * ���������� ���� �������� �� ������� ����� ���������� ������� ��� null ���� ���� �� ���� �����������
     * @return \DateTime|null ����� ��������, �� (�� �������)
     */
    function getCreatedAtLt();

    /**
     * ��������� ���� �� ����������� ���� �������� �� ������� ���������� �������
     * @return bool True ���� ���� ���� �����������, false ���� ���
     */
    function hasCreatedAtLt();

    /**
     * ���������� ����������� ���������� �������� ������� ��� null ���� ��� �� ����� �� ���� �����������
     * @return string|null ����������� ���������� �������� �������
     */
    function getLimit();

    /**
     * ��������� ���� �� ����������� ����������� ���������� �������� �������
     * @return bool True ���� ����������� ���������� �������� ������� ���� �����������, false ���� ���
     */
    function hasLimit();

    /**
     * ���������� ������������� �����
     * @return string|null ������������� �����
     */
    function getRecipientGatewayId();

    /**
     * ��������� ��� �� ���������� ������������� �����
     * @return bool True ���� ������������� ����� ��� ����������, false ���� ���
     */
    function hasRecipientGatewayId();

    /**
     * ���������� ������ ���������� �������� ��� null ���� �� �� ����� �� ��� ����������
     * @return string|null ������ ���������� ��������
     */
    function getStatus();

    /**
     * ��������� ��� �� ���������� ������ ���������� ��������
     * @return bool True ���� ������ ��� ����������, false ���� ���
     */
    function hasStatus();

}
