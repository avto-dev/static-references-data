# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog][keepachangelog] and this project adheres to [Semantic Versioning][semver].

## v3.0.0

### Changed

- Directory `./data/cadastral_districts` renamed to `./data/cadastral_regions`
- File `cadastral_districts.json` renamed to `cadastral_regions.json`
- File `cadastral_regions.json` now contains array of objects _(previously it was object with objects inside)_ [#24]
- Codes in `cadastral_regions.json` is integer type now _(previously it was strings)_ [#24]
- District codes in `cadastral_regions.json` is integer now _(previously it was strings)_ [#24]
- (PHP SDK) `StaticReference::getHash()` and `StaticReferenceInterface::getFilePath()` methods have strict return type
- (PHP SDK) Method `::getCadastralDistricts()` in `StaticReferencesData` renamed to `::getCadastralRegions()` 

### Removed

- (PHP SDK) `StaticReference::getContent()` and `StaticReferenceInterface::getContent()`

[#24]:https://github.com/avto-dev/static-references-data/pull/24

## v2.14.0

### Changed

- (PHP SDK) Minimal PHP version now is `^7.1.3`
- (PHP SDK) Unit tests totally rewritten
- (PHP SDK) Strict types enabled

### Added

- Docker-based environment for development
- Tests running using GitLab actions
- (PHP SDK) `phpstan/phpstan` package for static code analyzer
- (PHP SDK) Return value types for methods in `StaticReference` and `StaticReferencesData` classes (where it possible)
- (PHP SDK) `StaticReference::getData(bool $as_array = true, int $options = 0)` method

### Deprecated

- (PHP SDK) `StaticReference::getContent()` and `StaticReferenceInterface::getContent()` will be replaced with `::getData()` since `v3`

## v2.13.0

### Added

- GIBDD region code for `Orenburg region` - `156` [#21]

[#21]:https://github.com/avto-dev/static-references-data/issues/21

## v2.12.0

### Added

- GIBDD region code for `Moscow region` - `790` [#17]
- GIBDD region code for `Chelyabinsk region` - `774` [#17]
- GIBDD region code for `Moscow` - `797` [#17]
- GIBDD region code for `Krasnodar region` - `193` [#17]
- GIBDD region code for `Altai region` - `122` [#17]

[#17]:https://github.com/avto-dev/static-references-data/issues/17

## v2.11.0

### Added

- GIBDD region code for `The Republic of Bashkortostan` - `702` [#15]

[#15]:https://github.com/avto-dev/static-references-data/issues/15

## v2.10.0

### Added

- Cadastral districts with codes and names

## v2.9.1

### Added

- Added php sdk dev files to export-ignore [#12]

[#12]:https://github.com/avto-dev/static-references-data/issues/12

## v2.9.0

### Added

- GIBDD region code for Leningrad region - `147` [#10]

[#10]:https://github.com/avto-dev/static-references-data/issues/10

## v2.8.0

### Added

- (PHP SDK) "Vehicle types" reference ([source][vehicle_types_source]). Additional info you can find in issue: [#8]
- (PHP SDK) Static method `::getVehicleTypes()` to the class `StaticReferencesData`

[#8]:https://github.com/avto-dev/static-references-data/issues/8

## v2.7.0

### Added

- GIBDD region code for Rostov region - `761` [#6]

[#6]:https://github.com/avto-dev/static-references-data/issues/6

## v2.6.0

### Added

- GIBDD region code for mary-ell - `112` [#4]

[#4]:https://github.com/avto-dev/static-references-data/issues/4

## v2.5.0

### Changed

- Maximal PHP version now is undefined
- Package `tarampampam/wrappers-php` integrated
- CI changed to [Travis CI][travis]
- [CodeCov][codecov] integrated

[travis]:https://travis-ci.org/
[codecov]:https://codecov.io/

## v2.4.0

### Added

- One more "Samara" region code added (`763`) [#2]

[#2]:https://github.com/avto-dev/static-references-data/issues/2

## v2.3.0

### Added

- (PHP SDK) "Auto fines" reference ([source][gibdd_fines])
- (PHP SDK) Static method `::getAutoFines()` to the class `StaticReferencesData`

## v2.2.0

### Changed

- CI config updated
- Required minimal PHPUnit version now `5.7.10`
- Removed unimportant PHPDoc blocks
- Code a little bit refactored

[gibdd_fines]:https://xn--90adear.xn--p1ai/mens/fines?page=1
[vehicle_types_source]:http://www.consultant.ru/cons/cgi/online.cgi?req=doc&n=313930&base=EXP&from=313930-1669-diff&rnd=14B238716852CBC1B21D464E9F3969CA#005305945620298047
[keepachangelog]:https://keepachangelog.com/en/1.0.0/
[semver]:https://semver.org/spec/v2.0.0.html
