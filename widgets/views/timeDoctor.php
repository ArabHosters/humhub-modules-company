<?php

print HHtml::Link(Yii::t("UserModule.widgets_views_profileEditButton", "Connect with Timedoctor"), $this->createUrl('//site/auth'), array('class' => 'btn btn-success'));