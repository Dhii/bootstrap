# Change log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [0.2] - 2017-09-24

### Added

* Bootstrap prepares a `.gitattributes` file
* Unit and functional test templates
* Project name is deduced from the directory name
* Git remote URL is deduced from package information into a GitHub repository URL
* Dhii badge in readme file.

### Fixed

* Some file were missing after bootstrapping
* Travis builds were failing - now using the `precise` dist

### Changed

* Bumped default minimum PHP version to 5.4
* Improved assertions in test template
* Removed unnecessary backslash escaping in test templates
* Test subject is aliased as `TestSubject` in test templates
* Updated CS Fixer dependency to `^0.1` in `composer.json` template

## [0.1] - 2017-07-07
Initial version.
