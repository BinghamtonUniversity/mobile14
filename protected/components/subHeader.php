<?php

// renders a subHeader based on controller ID

Yii::import('zii.widgets.CPortlet');

class subHeader extends CPortlet {
    protected function renderContent()
    {
        $controllerName = $this->owner->uniqueId;
        $subHeadView = $controllerName . "SubHeader";
        
        if (!is_readable($this->getViewPath() . '/' . $subHeadView . '.php')) {
            return false;
        } else {
            $this->render($subHeadView);
        }
    }
}
