# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog][keepachangelog] and this project adheres to [Semantic Versioning][semver].

## Unreleased

### Removed

- Dependency `tarampampam/wrappers-php` because this package was deprecated and removed

## v3.3.0

### Added

- Support PHP `8.x`

### Changed

- Composer `2.x` is supported now

## v3.2.0

### Changed

- Dependency `tarampampam/wrappers-php` version `~2.0` is supported

## v3.1.0

### Changed

- CI completely moved from "Travis CI" to "Github Actions" _(travis builds disabled)_
- Minimal required PHP version now is `7.2`

### Added

- PHP 7.4 is supported now

## v3.0.0

### Added

- Json-schemas for each json file in `./data` directory

### Changed

- File locations:
  - `./data/auto_categories/auto_categories.json` &rarr; `./data/vehicle/categories.json`
  - `./data/vehicle_types/vehicle_types.json` &rarr; `./data/vehicle/types.json`
  - `./data/auto_fines/auto_fines.json` &rarr; `./data/vehicle/fine/articles.json`
  - `./data/auto_regions/auto_regions.json` &rarr; `./data/subject/codes.json`
  - `./data/cadastral_districts/cadastral_districts.json` &rarr; `./data/cadastral/districts.json`
  - `./data/registration_actions/registration_actions.json` &rarr; `./data/vehicle/registration/actions.json`
  - `./data/repair_methods/repair_methods.json` &rarr; `./data/vehicle/repair/methods.json`
- Object properties `districts` renamed to `areas` in `./data/cadastral/districts.json`
- Object properties `code` and `areas.*.code` now integers in `./data/cadastral/districts.json`
- (PHP SDK) Methods in `StaticReferencesData` renamed and does not accept any arguments:
  - `::getAutoCategories()` &rarr; `::vehicleCategories()`
  - `::getAutoRegions()` &rarr; `::subjectCodes()`
  - `::getRegistrationActions()` &rarr; `::vehicleRegistrationActions()`
  - `::getRepairMethods()` &rarr; `::vehicleRepairMethods()`
  - `::getAutoFines()` &rarr; `::vehicleFineArticles()`
  - `::getVehicleTypes()` &rarr; `::vehicleTypes()`
  - `::getCadastralDistricts()` &rarr; `::cadastralDistricts()`
- (PHP SDK) Return value type for methods `->getHash()` and `->getFilePath()` in `StaticReferenceInterface`

### Removed

- Object properties `short`, `okato` and `type` removed from `./data/subject/codes.json`
- (PHP SDK) `StaticReference::getContent()` and `StaticReferenceInterface::getContent()`

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
