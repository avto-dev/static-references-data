# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog][keepachangelog] and this project adheres to [Semantic Versioning][semver].

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

[keepachangelog]:https://keepachangelog.com/en/1.0.0/
[semver]:https://semver.org/spec/v2.0.0.html
