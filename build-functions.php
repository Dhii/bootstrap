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
    $collapsed = collapseChars($string, array('_', '-', '+', '/', '\\'));

    return preg_replace('/[ _\\-\\+\\/\\\\]+/', '-', strtolower($collapsed));
}

/**
 * Transforms a given string into kebab case.
 *
 * @since [*next-version*]
 *
 * @param string $subject     The subject string.
 * @param array  $chars       The characters to collapse.
 * @param string $replacement The replacement character.
 *
 * @return string
 */
function collapseChars($subject, $chars, $replacement = '$0')
{
    $slashedChars = array_map(function($char) {
        return preg_quote($char, '/');
    }, $chars);

    $charMask = implode('', $slashedChars);
    $pattern  = sprintf('/[%s]+/', $charMask);

    return preg_replace($pattern, $replacement, $subject);
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
 * @param int    $numWords The number of words to extract from the project name.
 *
 * @return string
 */
function generateNamespace($vendor, $projName, $numWords = 1)
{
    $vendor  = toCamelCase(kebabCaseToUcWords($vendor));
    $project = toCamelCase(truncateWords($projName, $numWords));

    return sprintf('%1$s\\%2$s', $vendor, $project);
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

/**
 * Builds a GitHub repo URL from vendor and package information.
 *
 * @since [*next-version*]
 *
 * @param string $vendor  The package vendor.
 * @param string $package The package slug name.
 *
 * @return string
 */
function buildGitHubRepoUrl($vendor, $package)
{
    return sprintf('https://github.com/%1$s/%2$s.git', $vendor, $package);
}

/**
 * A simple algorithm for truncating a string to a specific number of words.
 *
 * @since [*next-version*]
 *
 * @param string $subject  The subject string.
 * @param int    $numWords The number of words to truncate to.
 *
 * @return string The truncated string.
 */
function truncateWords($subject, $numWords)
{
    // The explode limit is used to stop splitting after $numWords words.
    // The last element will contain the rest of the string
    $parts = explode(' ', $subject, $numWords + 1);

    // Remove the last element from the list
    array_pop($parts);

    // Re-join the remaining parts
    return implode(' ', $parts);
}
