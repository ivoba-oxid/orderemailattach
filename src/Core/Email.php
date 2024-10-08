<?php

namespace IvobaOxid\OrderEmailAttach\Core;

use IvobaOxid\OrderEmailAttach\Module;
use OxidEsales\EshopCommunity\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Configuration\Bridge\ModuleSettingBridgeInterface;


class Email extends Email_parent
{
    /**
     * temporary switch off clearing in parent
     * @var bool
     */
    protected $_attachmentsClear = true;

    /**
     * Sets mailer additional settings and sends ordering mail to user.
     * Returns true on success.
     *
     * @param \OxidEsales\Eshop\Application\Model\Order $order Order object
     * @param string $subject user defined subject [optional]
     *
     * @return bool
     * @throws \Exception
     */
    public function sendOrderEmailToUser($order, $subject = null)
    {
        $this->_attachmentsClear = false;
        $this->addOrderEmailAttachments();

        $return = parent::sendOrderEmailToUser($order, $subject);

        $this->_attachmentsClear = true;

        return $return;
    }

    /**
     * Sets mailer additional settings and sends ordering mail to shop owner.
     * Returns true on success.
     *
     * @param \OxidEsales\Eshop\Application\Model\Order $order Order object
     * @param string $subject user defined subject [optional]
     *
     * @return bool
     * @throws \Exception
     */
    public function sendOrderEmailToOwner($order, $subject = null)
    {
        if ($this->getConfigParam('ivoba_orderemailattach_add_to_ownermail')) {
            $this->_attachmentsClear = false;
            $this->addOrderEmailAttachments();
        } else {
            $this->clearAttachments();
        }

        $return = parent::sendOrderEmailToOwner($order, $subject);

        $this->_attachmentsClear = true;

        return $return;
    }

    /**
     * @throws \Exception
     */
    protected function addOrderEmailAttachments()
    {
        $path = __DIR__ . '/../../../../../source/out/pdf/'; //todo hardcoded, should be uploadable
        $attPath = Registry::getUtilsFile()->normalizeDir($path);

        //detect language and add for language
        $language = \OxidEsales\Eshop\Core\Registry::getLang();
        $orderLanguage = $language->getLanguageAbbr($language->getTplLanguage());
        $files = explode(
            ',',
            $this->getConfigParam('ivoba_orderemailattach_attachments_' . $orderLanguage)
        );
        foreach ($files as $attFile) {
            $fullPath = $attPath . trim($attFile);
            if (@is_readable($fullPath) && @is_file($fullPath)) {
                $this->addAttachment($fullPath, $attFile);
            } else {
                throw new \Exception('Attachment not found: ' . $fullPath);
            }
        }
    }

    /**
     * Overloading to add attachments before mail initialization, which will reset all attachments
     */
    public function clearAttachments()
    {
        if ($this->_attachmentsClear === true) {
            parent::clearAttachments();
        }
    }

    private function getConfigParam(string $name)
    {
        $moduleSettingBridge = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingBridgeInterface::class);
        return $moduleSettingBridge->get($name, Module::MODULE_ID);
    }
}
