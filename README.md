# Dhii Project Bootstrap

A bootstrap for creating Dhii projects.

## Usage

### Via Composer

To create a new project, simply invoke:

```
composer create-project dhii/bootstrap my-project
```

This will create the `my-project` directory, download the bootstrap and load it in interactive mode.

### Standalone

Simply invoke:

```
phing
```

This will run in interactive mode. You can use `-Dquiet=true` to make the script run silently.
You will be required to pass the property values as command arguments, prepending by `-D`.
