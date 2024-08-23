<?php

namespace IvobaOxid\OrderEmailAttach\Model;

use OxidEsales\EshopCommunity\Core\Registry;
use IvobaOxid\OrderEmailAttach\Core\Email;

class Order extends Order_parent
{
    protected function sendOrderByEmail($oUser = null, $oBasket = null, $oPayment = null)
    {
        $iRet = self::ORDER_STATE_MAILINGERROR;

        // add user, basket and payment to order
        $this->_oUser = $oUser;
        $this->_oBasket = $oBasket;
        $this->_oPayment = $oPayment;

        // todo
        $oxEmail = oxNew(Email::class);

        // send order email to user
        if ($oxEmail->sendOrderEMailToUser($this)) {
            // mail to user was successfully sent
            $iRet = self::ORDER_STATE_OK;
        }

        // send order email to shop owner
        $oxEmail->sendOrderEMailToOwner($this);

        return $iRet;
    }
}