# Bootstrap

[![Latest Stable Version](https://poser.pugx.org/dhii/bootstrap/version)](https://packagist.org/packages/dhii/bootstrap)

A bootstrap tool for quickly creating standard Dhii packages.

Phing is used to build your project files, based on project information provided during the bootstrapping phase,
either through command line prompts or arguments.

* Composer package info file
* CS Fixer configuration file
* PHPUnit configuration file
* Convenient composer scripts for testing and fixing code standards
* Travis configuration file
* CodeClimate configuration file
* Netbeans Project Info
* License file
* Changelog file
* Readme file
* Functional and unit test templates
* Git repository info

## Usage

### Step 1. Cloning

#### Via Composer

Use composer's built-in `create-project` command, as follows:

```
composer create-project dhii/bootstrap my-project
```

This will create the `my-project` directory and download the bootstrap files.

#### Via PHPStorm

Go to _File_, then _New Project_. On the left-hand side, under _PHP-Specific_, choose _Composer Project_.

Enter the location of the project, including the name of the project as a directory name.
For example: `some/path/my-project`.

Under package, search for `dhii/bootstrap`, select the search result and click _Create_.

PHPStorm will download the bootstrap files and automatically install its dependencies.

### Step 2. Bootstrapping

From the newly created project directory simply invoke Phing, which should be installed locally to the project.

```
cd my-project
vendor/bin/phing
```

This will run in interactive mode, which will prompt you to enter information about the project.
Information regarding the prompts can be found below.

#### Quiet Mode

You can invoke the bootstrapping process in quiet mode via the `-Dquiet=true` argument.
This will make the script run silently without prompts but also requires you to pass the values of the prompts as
command arguments, prefixed with `-D`. For example:

```
vendor/bin/phing -Dquiet=true -Dcomposer.vendor=dhii -Dcomposer.name=my-project -Dorganization="Dhii Team"...
```

#### Properties

| Name                  | Description                                                                               | Default                                                                                                        |
|-----------------------|-------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------|
| `project.name`          | The human-readable name of the project.                                                   | A human-readable version of the project's directory name.                                                      |
| `organization`          | The name of the organization that owns the package. Used in the license and readme files. | `"Dhii"`                                                                                                       |
| `composer.vendor`       | The vendor name of the Composer package.                                                  | `"dhii"`                                                                                                       |
| `composer.name`         | The key-like name of the Composer package.                                                | The project's directory name.                                                                                  |
| `composer.desc`         | The description of the Composer package.                                                  | None                                                                                                           |
| `composer.type`         | The Composer package type.                                                                | `"library"`                                                                                                    |
| `composer.author`       | The name of the author of the Composer package.                                           | `"Dhii Team"`                                                                                                  |
| `composer.email`        | The email of the author of the Composer package.                                          | `"development@dhii.co"`                                                                                        |
| `composer.license`      | The license of the Composer package (currently only `MIT` and `GPL-3.0` are supported)    | `"MIT"`                                                                                                        |
| `composer.minstab`      | The `"minimum-stability"` for the Composer package.                                       | `"dev"`                                                                                                        |
| `composer.phpver`       | The PHP version constraint for the Composer package.                                      | `"^5.4 | ^7.0"`                                                                                                |
| `composer.autoload.dir` | The directory from which to autoload classes.                                             | `"src"`                                                                                                        |
| `autoload.ns`           | The namespace to use in autoloading.                                                      | `A\B`, where A and B are the the camel-case versions of the `composer.vendor` and `project.name` respectively. |
| `git.remote`            | The URL of the Git remote repository.                                                     | `"https://github.com/<composer.vendor>/<composer.name>"`                                                       |

For more information about these properties, take a peek inside the [`build.xml`] file.

## Known Issues

* Due to a [Composer bug][1] it is currently not possible to automatically invoke `phing` after project creation.

[1]: https://github.com/composer/composer/issues/3299
[`build.xml`]: https://github.com/Dhii/bootstrap/blob/master/build.xml
