<p align="center">
  <img alt="logo" src="https://habrastorage.org/webt/59/e8/90/59e89034d07c7166044069.png" width="70" height="70" />
</p>

# Static references data

[![Version][badge_packagist_version]][link_packagist]
[![Version][badge_php_version]][link_packagist]
[![Build Status][badge_build_status]][link_build_status]
[![Coverage][badge_coverage]][link_coverage]
[![Downloads count][badge_downloads_count]][link_packagist]
[![License][badge_license]][link_license]

This repository contains regularly updated static references data.

## Install

### Using `composer`

Require this package with composer using the following command:

```shell
$ composer require avto-dev/static-references-data "^2.13"
```

> Installed `composer` is required ([how to install composer][getcomposer]).

> You need to fix the major version of package.

After that you can read references data using following methods:

```php
use AvtoDev\StaticReferencesData\StaticReferencesData;

StaticReferencesData::getAutoCategories();
StaticReferencesData::getAutoRegions();
StaticReferencesData::getRegistrationActions();
StaticReferencesData::getRepairMethods();
StaticReferencesData::getAutoFines();
StaticReferencesData::getVehicleTypes();
StaticReferencesData::getCadastralDistricts();
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

[badge_packagist_version]:https://img.shields.io/packagist/v/avto-dev/static-references-data.svg?maxAge=180
[badge_php_version]:https://img.shields.io/packagist/php-v/avto-dev/static-references-data.svg?longCache=true
[badge_build_status]:https://travis-ci.org/avto-dev/static-references-data.svg?branch=master
[badge_coverage]:https://img.shields.io/codecov/c/github/avto-dev/static-references-data/master.svg?maxAge=60
[badge_downloads_count]:https://img.shields.io/packagist/dt/avto-dev/static-references-data.svg?maxAge=180
[badge_license]:https://img.shields.io/packagist/l/avto-dev/static-references-data.svg?longCache=true
[badge_release_date]:https://img.shields.io/github/release-date/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_commits_since_release]:https://img.shields.io/github/commits-since/avto-dev/static-references-data/latest.svg?style=flat-square&maxAge=180
[badge_issues]:https://img.shields.io/github/issues/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[badge_pulls]:https://img.shields.io/github/issues-pr/avto-dev/static-references-data.svg?style=flat-square&maxAge=180
[link_releases]:https://github.com/avto-dev/static-references-data/releases
[link_packagist]:https://packagist.org/packages/avto-dev/static-references-data
[link_build_status]:https://travis-ci.org/avto-dev/static-references-data
[link_coverage]:https://codecov.io/gh/avto-dev/static-references-data/
[link_changes_log]:https://github.com/avto-dev/static-references-data/blob/master/CHANGELOG.md
[link_issues]:https://github.com/avto-dev/static-references-data/issues
[link_create_issue]:https://github.com/avto-dev/static-references-data/issues/new/choose
[link_commits]:https://github.com/avto-dev/static-references-data/commits
[link_pulls]:https://github.com/avto-dev/static-references-data/pulls
[link_license]:https://github.com/avto-dev/static-references-data/blob/master/LICENSE
[getcomposer]:https://getcomposer.org/download/
