# Slack Integration for Magento 1 / OpenMage

**Posts a notification to a Slack channel for every new Magento order.**

![Receive order notifications in Slack](docs/images/screenshots/01-receive-order-notifications-in-slack.webp)

Sends a message to the Slack channel of your choice whenever a new order is placed in your Magento store.

Uses a Slack incoming webhook and takes a few minutes to set up.

> [!NOTE]
> Slack Integration is free and open source under the MIT License (since 2026). Plugin Company no longer actively develops this extension, but issues and pull requests are welcome.

## Features

- New order notifications in Slack
- Choice of Slack channel and user name
- Custom Magento emoji as the Slack avatar
- Settings per store view
- Set up with a Slack incoming webhook

## Screenshots

<table>
  <tr>
    <td width="50%" valign="top"><img src="docs/images/screenshots/02-slack-integration-settings.webp" alt="Slack integration settings"><br><sub>Slack integration settings</sub></td>
    <td width="50%"></td>
  </tr>
</table>

## Compatibility

- **Magento:** Community Edition 1.4.x – 1.9.x, Enterprise Edition 1.8.x – 1.14.x
- **Latest version:** 1.0.0 (released 2014-11-27)
- **Composer package:** `plugincompany/magento1-slack-integration`
- **Module:** `Plugincompany_Slackgento`

## Installation

### modman

```bash
cd /path/to/magento
modman init   # once per Magento installation
modman clone https://github.com/PluginCompany/magento1-slack-integration.git
```

modman creates symlinks, so enable *Allow Symlinks* under System > Configuration > Advanced > Developer > Template Settings.

### Composer

With [magento-hackathon/magento-composer-installer](https://github.com/Cotya/magento-composer-installer) (it reads the `modman` file of this repository):

```bash
composer config repositories.plugin.company composer https://plugin.company/
composer require plugincompany/magento1-slack-integration
```

Your project `composer.json` needs the Magento root directory in its `extra` section (and, with Composer 2.2+, the installer plugin allowed), for example:

```json
{
    "extra": { "magento-root-dir": "./" },
    "config": { "allow-plugins": { "magento-hackathon/magento-composer-installer": true } }
}
```

### Manual installation

Download the ZIP of the latest release from the [tags page](https://github.com/PluginCompany/magento1-slack-integration/tags) ([1.0.0](https://github.com/PluginCompany/magento1-slack-integration/archive/refs/tags/1.0.0.zip)) and copy the `app/`, `media/` folders into your Magento root:

```bash
unzip magento1-slack-integration-1.0.0.zip
cp -R magento1-slack-integration-1.0.0/app magento1-slack-integration-1.0.0/media /path/to/magento/
```

Step-by-step instructions are in the [installation guide](docs/02-installing-the-magento-extension.md).

### After installing

Clear the cache (System > Cache Management, or `rm -rf var/cache/*`), then log out of the admin and log in again so the new configuration sections and permissions are loaded.

## Documentation

- [Documentation in this repository](docs/README.md) (Installation Guide, User Manual)
- Online documentation: <https://plugin.company/knowledge-base/docs/magento-slack-integration/>
- Product page: <https://plugin.company/magento1-extensions/slack-integration.html>

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for the release history.

## Contributing

Found a bug or have an improvement? Please open an [issue](https://github.com/PluginCompany/magento1-slack-integration/issues) or send a [pull request](https://github.com/PluginCompany/magento1-slack-integration/pulls). Since the extension is no longer actively developed by Plugin Company, fixes from the community are the best way to keep it working on current Magento 1 / OpenMage and PHP versions.

## License

Plugin Company's code in this repository is released under the [MIT License](LICENSE), Copyright (c) 2014-2026 Plugin Company.

No third-party libraries are bundled; see [THIRD-PARTY-NOTICES.md](THIRD-PARTY-NOTICES.md).
