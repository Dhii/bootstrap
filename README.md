# Dhii Project Bootstrap

[![Latest Stable Version](https://poser.pugx.org/dhii/bootstrap/version)](https://packagist.org/packages/dhii/bootstrap)

A bootstrap for creating Dhii projects.

## Usage

### Create Project via Composer

To create a new project, simply invoke:

```
composer create-project dhii/project-bootstrap my-project
```

This will create the `my-project` directory and download the bootstrap files.

### Initialize Project

From the newly created project directory, simply invoke Phing:

```
cd my-project
vendor/bin/phing
```

This will run in interactive mode, where you are prompted to enter information about the project.

You can also use `-Dquiet=true` to make the script run silently. This will require to pass the property values as command arguments, prefixed with `-D`.
Example:

```
phing -Dquiet=true -Dcomposer.vendor=dhii -Dcomposer.name=my-project ...
```

For a full list of what properties you can set, take a peek at the [`build.xml`] file.

## Known Issues

* Due to a [Composer bug][1] it is currently not possible to automatically invoke `phing` after project creation.

[1]: https://github.com/composer/composer/issues/3299
[`build.xml`]: https://github.com/Dhii/bootstrap/blob/master/build.xml
