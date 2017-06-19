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
function ucWordsKebabCase($kebab)
{
    $parts   = explode('-', $kebab);
    $ucParts = array_map('ucwords', $parts);
    $ucWords = implode(' ', $ucParts);

    return $ucWords;
}
