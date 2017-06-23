<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-swiftmailer' => 
  array (
    'name' => 'yiisoft/yii2-swiftmailer',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/swiftmailer' => $vendorDir . '/yiisoft/yii2-swiftmailer',
    ),
  ),
  'yiisoft/yii2-codeception' => 
  array (
    'name' => 'yiisoft/yii2-codeception',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/codeception' => $vendorDir . '/yiisoft/yii2-codeception',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii',
    ),
  ),
  'yiisoft/yii2-faker' => 
  array (
    'name' => 'yiisoft/yii2-faker',
    'version' => '2.0.3.0',
    'alias' => 
    array (
      '@yii/faker' => $vendorDir . '/yiisoft/yii2-faker',
    ),
  ),
  '2amigos/yii2-qrcode-helper' => 
  array (
    'name' => '2amigos/yii2-qrcode-helper',
    'version' => '1.0.2.0',
    'alias' => 
    array (
      '@dosamigos/qrcode' => $vendorDir . '/2amigos/yii2-qrcode-helper/src',
    ),
  ),
  '2amigos/yii2-gallery-widget' => 
  array (
    'name' => '2amigos/yii2-gallery-widget',
    'version' => '1.0.1.0',
    'alias' => 
    array (
      '@dosamigos/gallery' => $vendorDir . '/2amigos/yii2-gallery-widget/src',
    ),
  ),
  'yiisoft/yii2-redis' => 
  array (
    'name' => 'yiisoft/yii2-redis',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/redis' => $vendorDir . '/yiisoft/yii2-redis',
    ),
  ),
  'yiisoft/yii2-bootstrap' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/bootstrap' => $vendorDir . '/yiisoft/yii2-bootstrap',
    ),
  ),
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug',
    ),
  ),
  'filsh/yii2-oauth2-server' => 
  array (
    'name' => 'filsh/yii2-oauth2-server',
    'version' => '2.0.1.0',
    'alias' => 
    array (
      '@filsh/yii2/oauth2server' => $vendorDir . '/filsh/yii2-oauth2-server',
    ),
    'bootstrap' => 'filsh\\yii2\\oauth2server\\Bootstrap',
  ),
  'wayhood/yii2-asynctask' => 
  array (
    'name' => 'wayhood/yii2-asynctask',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@wh/asynctask' => $vendorDir . '/wayhood/yii2-asynctask',
    ),
    'bootstrap' => 'wh\\asynctask\\Bootstrap',
  ),
);
