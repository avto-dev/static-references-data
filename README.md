<p align="center">
  <img alt="logo" src="https://habrastorage.org/webt/59/e8/90/59e89034d07c7166044069.png" width="70" height="70" />
</p>

# Данные статических справочников

[![Version][badge_packagist_version]][link_packagist]
[![Version][badge_php_version]][link_packagist]
[![Build Status][badge_build_status]][link_build_status]
[![Coverage][badge_coverage]][link_coverage]
[![Code quality][badge_code_quality]][link_coverage]
[![Downloads count][badge_downloads_count]][link_packagist]
[![License][badge_license]][link_license]

Данный репозиторий является хранилищем статических данных для справочников.

## Установка

### С помощью `composer`

Для установки данного пакета выполните в терминале следующую команду:

```shell
$ composer require avto-dev/static-references-data "^2.3"
```

> Для этого необходим установленный `composer`. Для его установки перейдите по [данной ссылке][getcomposer].

После этого вы сможете удобно получать доступ к данным, например - следующим образом:

```php
use AvtoDev\StaticReferencesData\StaticReferencesData;

StaticReferencesData::getAutoCategories();
StaticReferencesData::getAutoRegions();
StaticReferencesData::getRegistrationActions();
StaticReferencesData::getAutoFines();
```

### Testing

For package testing we use `phpunit` framework. Just write into your terminal:

```shell
$ git clone git@github.com:avto-dev/static-references-data.git ./static-references-data && cd $_
$ composer install
$ composer test
```

## Changes log

[![Release date][badge_release_date]][link_releases]
[![Commits since latest release][badge_commits_since_release]][link_commits]

Changes log can be [found here][link_changes_log].

## Support

[![Issues][badge_issues]][link_issues]
[![Issues][badge_pulls]][link_pulls]

If you will find any package errors, please, [make an issue][link_create_issue] in current repository.

## License

This is open-sourced software licensed under the [MIT License][link_license].

[badge_packagist_version]:https://img.shields.io/packagist/v/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_php_version]:https://img.shields.io/packagist/php-v/avto-dev/static-references-data.svg?style=flat-square&longCache=true
[badge_build_status]:https://img.shields.io/scrutinizer/build/g/avto-dev/static-references-data.svg?style=flat-square&maxAge=180&logo=scrutinizer
[badge_code_quality]:https://img.shields.io/scrutinizer/g/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_coverage]:https://img.shields.io/scrutinizer/coverage/g/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_downloads_count]:https://img.shields.io/packagist/dt/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_license]:https://img.shields.io/packagist/l/avto-dev/static-references-data.svg?style=flat-square&longCache=true
[badge_release_date]:https://img.shields.io/github/release-date/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_commits_since_release]:https://img.shields.io/github/commits-since/avto-dev/static-references-data/latest.svg?style=flat-square&maxAge=180
[badge_issues]:https://img.shields.io/github/issues/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_pulls]:https://img.shields.io/github/issues-pr/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[link_releases]:https://github.com/avto-dev/static-references-data/releases
[link_packagist]:https://packagist.org/packages/avto-dev/static-references-data
[link_build_status]:https://scrutinizer-ci.com/g/avto-dev/static-references-data/build-status/master
[link_coverage]:https://scrutinizer-ci.com/g/avto-dev/static-references-data/?branch=master
[link_changes_log]:https://github.com/avto-dev/static-references-data/blob/master/CHANGELOG.md
[link_issues]:https://github.com/avto-dev/static-references-data/issues
[link_create_issue]:https://github.com/avto-dev/static-references-data/issues/new/choose
[link_commits]:https://github.com/avto-dev/static-references-data/commits
[link_pulls]:https://github.com/avto-dev/static-references-data/pulls
[link_license]:https://github.com/avto-dev/static-references-data/blob/master/LICENSE
[getcomposer]:https://getcomposer.org/download/
