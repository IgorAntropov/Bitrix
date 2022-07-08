<?php
    if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    {
        die();
    }
    return array (
  'nodes' => 
  array (
    '.navlefttextone' => 
    array (
      'name' => 'Компания',
      'type' => 'text',
      'code' => '.navlefttextone',
      'handler' => 'BX.Landing.Block.Node.Text',
    ),
    '.navrighthrefone' => 
    array (
      'name' => 'О компании',
      'type' => 'link',
      'code' => '.navrighthrefone',
      'handler' => 'BX.Landing.Block.Node.Link',
    ),
    '.navrightbuttonone' => 
    array (
      'name' => 'Кнопка',
      'type' => 'link',
      'code' => '.navrightbuttonone',
      'handler' => 'BX.Landing.Block.Node.Link',
    ),
  ),
  'style' => 
  array (
    'block' => 
    array (
    ),
    'nodes' => 
    array (
      '.navone.no-gutters' => 
      array (
        'name' => 'Фон',
        'type' => 'box',
      ),
      '.navlefttextone' => 
      array (
        'name' => 'Компания',
        'type' => 'typo',
      ),
      '.navrighthrefone' => 
      array (
        'name' => 'О компании',
        'type' => 'typo',
      ),
      '.navrightbuttonone' => 
      array (
        'name' => 'Кнопка',
        'type' => 'button',
      ),
    ),
  ),
  'cards' => 
  array (
    '.navrighthrefcontone' => 
    array (
      'name' => 'Якорь',
    ),
  ),
  'assets' => 
  array (
    'css' => 
    array (
      0 => 'https://bitrix24.market/upload/iblock/f39/f39aa1faa0d786a96229b5cd1b279328.css',
    ),
    'js' => 
    array (
      0 => 'https://bitrix24.market/upload/iblock/88b/88b251cf12a7ce1f3939cc0bff865083.js',
    ),
  ),
  'block' => 
  array (
    'name' => 'Меню Krayt.CarWash',
    'section' => 
    array (
      0 => 'menu',
    ),
  ),
  'attrs' => 
  array (
  ),
  'namespace' => '',
  'code' => 'repo_498',
  'category' => 
  array (
    0 => '11',
  ),
);