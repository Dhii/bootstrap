<?php

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
    return implode('-', explode(' ', strtolower($string)));
}

function toCamelCase($string)
{
    $parts   = preg_split('/[-_\s]/', $string);
    $ucWords = array_map('ucfirst', $parts);

    return implode('', $ucWords);
}

/**
 * Generates the namespace given the author and project names.
 *
 * @since [*next-version*]
 *
 * @param string $author   The author name.
 * @param string $projName The project name.
 *
 * @return string
 */
function generateNamespace($author, $projName)
{
    return sprintf('%1$s\\%2$s', toCamelCase($author), toCamelCase($projName));
}
