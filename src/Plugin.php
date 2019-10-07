<?php

namespace craft\sitesauce;

use Craft;
use craft\helpers\Json;
use craft\services\Elements;
use GuzzleHttp\RequestOptions;
use yii\base\Event;

/**
 * Sitesauce plugin
 *
 * @method static Plugin getInstance()
 * @method Settings getSettings()
 * @property-read Settings $settings
 *
 * @author Miguel Piedrafita <soy@miguelpiedrafita.com>
 * @since 1.0
 */
class Plugin extends \craft\base\Plugin
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    public $hasCpSection = true;

    /**
     * @inheritdoc
     */
    public $schemaVersion = '2.2.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!$this->isInstalled) {
            return;
        }

        Event::on(Elements::class, Elements::EVENT_AFTER_SAVE_ELEMENT, function(Event $e) {
            if (is_string($url = $this->getSettings()->build_hook)) {
                Craft::createGuzzleClient()->request('POST', $url, [
                    RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                    RequestOptions::BODY => Json::encode(['time' => (new \DateTime())->format(\DateTime::ATOM)]),
                ]);
            }
        });
    }

    protected function settingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('sitesauce/settings', [
            'settings' => $this->getSettings()
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }
}
