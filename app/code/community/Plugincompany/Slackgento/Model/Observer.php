<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Slack Integration, released under the MIT License.
 * See the LICENSE file in the project root.
 */
class Plugincompany_Slackgento_Model_Observer
{

    /**
     * Hook for order placement > Slack message
     *
     * @param Varien_Event_Observer $observer
     */
    public function salesOrderPlaceAfter(Varien_Event_Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();

        Mage::getModel('plugincompany_slackgento/slackmessage')->newOrderMessage($order);

    }

}