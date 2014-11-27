<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Slack Integration, released under the MIT License.
 * See the LICENSE file in the project root.
 */
class Plugincompany_Slackgento_Model_Slackmessage
{

    /**
     * Generates and sends new order message to slack
     *
     * @param $order
     * @return $this
     */
    public function newOrderMessage($order)
    {
        if(!Mage::getStoreConfig('plugincompany_slackgento/order_notifications/enable')){
            return $this;
        }

        $storeId = $order->getStoreId();
        $store  = $order->getStore();
        $adminUrl = Mage::getUrl('adminhtml');

        $channel = Mage::getStoreConfig('plugincompany_slackgento/order_notifications/channel',$storeId);
        $userName = Mage::getStoreConfig('plugincompany_slackgento/order_notifications/user',$storeId);
        $emoji = Mage::getStoreConfig('plugincompany_slackgento/order_notifications/emoji',$storeId);
        $hookUrl = Mage::getStoreConfig('plugincompany_slackgento/general/apikey', $storeId);

        $text = "New order *#{$order->getIncrementId()}*\n";
        $text .= "Placed in store *<{$adminUrl}|{$store->getName()}>*\n";
        $text .= "Total order value: *{$order->getOrderCurrencyCode()} {$order->getGrandTotal()}*";

        try {
            $this->send($channel,$userName,$text,$emoji,$hookUrl);
        }
        catch (Exception $e){
            //error handling can be added here
        }
    }

    /**
     * Sends message to slack based on input
     *
     * @param $channel
     * @param $userName
     * @param $text
     * @param $emoji
     * @param $hookUrl
     * @return $this
     */
    public function send($channel,$userName,$text,$emoji,$hookUrl){

        $message = array(
            'channel' => $channel,
            'username' => $userName,
            'text' => $text
        );

        if($emoji == ":magento:"){
            $message['icon_url'] = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'plugincompany/slack/magento_icon_48.png';
        }else{
            $message['icon_emoji'] = $emoji;
        }

        try {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $hookUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "payload=" . json_encode($message));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close($ch);
        } catch (Exception $e){
            //error handling can be added here
        }
        return $this;
    }
}