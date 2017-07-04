<?php

/**
 * Detects the package name from the directory name.
 *
 * @since [*next-version*]
 *
 * @return string
 */
function detectPackageName()
{
    return basename(__DIR__);
}

/**
 * Transforms a kebab cased string into uppercased words.
 *
 * @since [*next-version*]
 *
 * @param string $kebab The kebab cased string.
 *
 * @return string
 */
function kebabCaseToUcWords($kebab)
{
    $parts   = explode('-', $kebab);
    $ucParts = array_map('ucwords', $parts);
    $ucWords = implode(' ', $ucParts);

    return $ucWords;
}

/**
 * Transforms a given string into kebab case.
 *
 * @since [*next-version*]
 *
 * @param string $string The string.
 *
 * @return string
 */
function toKebabCase($string)
{
    return preg_replace('/[ _\\-\\+\\/\\\\]+/', '-', strtolower($string));
}

/**
 * Transforms a given string of words to camel case.
 *
 * @since [*next-version*]
 *
 * @param string $string The input string.
 *
 * @return string
 */
function toCamelCase($string)
{
    $parts   = preg_split('/[-_\s]/', $string);
    $ucWords = array_map('ucfirst', $parts);

    return implode('', $ucWords);
}

/**
 * Generates the namespace given the vendor and project names.
 *
 * @since [*next-version*]
 *
 * @param string $vendor   The vendor.
 * @param string $projName The project name.
 *
 * @return string
 */
function generateNamespace($vendor, $projName)
{
    return sprintf('%1$s\\%2$s', toCamelCase(kebabCaseToUcWords($vendor)), toCamelCase($projName));
}

/**
 * Sanitizes a namespace, by removing trailing slashes and collapsing slashes.
 *
 * @since [*next-version*]
 *
 * @param string $namespace
 *
 * @return string
 */
function sanitizeNamespace($namespace)
{
    return preg_replace('/\\\\+/', '\\', trim($namespace, ' \/'));
}

/**
 * Escapes a namespace's slashes, so that the namespace may be used in quotes.
 *
 * @since [*next-version*]
 *
 * @param string $namespace
 *
 * @return string
 */
function escapeNamespaceForQuote($namespace)
{
    return preg_replace('/\\\\+/', '\\\\\\\\', $namespace);
}
