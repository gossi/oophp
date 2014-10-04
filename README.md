# PHP Userland API

PHP6 err PHP7 is gathering ideas on how to shape the language. This is my idea how the PHP API could look like. Please help and join in. 

DISCLAIMER: DO NOT USE THIS (YET)!<br>
At the moment, this is my personal playground and everything is subject to change - ye'd be warned.

## Goals

- Standardize function calls
- Consistent Naming Convention
- Wrap 'resource' types in classes
- Provide php functionality in an OOP fashion
- Add missing langauge features
- Primitives as Objects
- Offer more type hinting

### Standardize function calls

PHP had (especially in the past) no naming conventions for functions, which led to mixed function names (which is already adressed in the php core).

Examples:

```php
// different naming conventions
strpos
str_replace

// totally unclear names
strcspn                  // STRing Complement SPaN
strpbrk                  // STRing Pointer BReaK

// inverted parameter order
strpos($haystack, $needle)
array_search($needle, $haystack)
```

## Consistent Naming Convention
As been done in [Naming Conventions](NAMING-CONVENTIONS.md)

### Wrap 'resource' types in classes

PHP often provides a 'resource' type. However, most of the time we wrap them in classes anyway. Provide them out-of-the box.

Examples:

See ldap or ftp package.

### Provide php functionality in an OOP fashion

Leverage the 'php' namespace. Wrap functions that serve under the same purpose as single units (= classes).

1) Classes as function collections

Using classes to collect functions basically isn't a good idea and never a good practice. However, I see one good reason to do so, which is a function collection for a specific context where a class which acts as namespace. E.g. if you are looking for a mathematical function but don't (fully) remember the name, type Math:: and your IDE can help you out with content assist, showing you only mathematical related functions.

2) Create units

Create units where possible. 

Example: Filesystem

Create e.g. a Filesystem interface, which will also be used for FtpConnections or WebDav, etc. so the filesystem is interchangeable, but also extendable if you need a specific implementation (eg. Dropbox, AWS, Owncloud, etc.).

### Add missing language features

Add missing language, such as collections.

(provided collections are usable via its own package: [gossi/collection](https://packagist.org/packages/gossi/collection))

### Primitives as Objects

Provide primitives as objects with methods to operate on them directly instead of functions that take the primitive as parameter. This would be more in common with current coding standards and would also improve readability.

Example:

```php
ucfirst(strtolower($string)) // vs.
$string->lower()->upperFirst()
```

```php
$str = 'hello world';
var_dump($str instanceof php\lang\String); // bool(true)
```

| Object | Primitve |
|--------|----------|
| php\lang\String | String |
| php\lang\Number | int, double, float |
| php\lang\ArrayObject | Array |

Related Links:

- [Methods on primitive types in PHP](https://nikic.github.io/2014/03/14/Methods-on-primitive-types-in-PHP.html) by Nikita Popov (@nikic)
- [nikic/scalar_objects](https://github.com/nikic/scalar_objects)
- [rossriley/php-scalar-objects](https://github.com/rossriley/php-scalar-objects)
- [PHP6 Ideas, Section: Scalar type hinting and return typing](https://wiki.php.net/ideas/php6#scalar_type_hinting_and_return_typing)
- [HOA String](https://github.com/hoaproject/String)

### Offer more type hinting

With all the changes mentioned above, this would automatically add more type hinting, since objects are available, that can returned or taken as parameters.

## Discussion

- PHP-FIG: [https://groups.google.com/forum/#!topic/php-fig/sglKWCceNUk](https://groups.google.com/forum/#!topic/php-fig/sglKWCceNUk)
- php.internals: [http://news.php.net/php.internals/74668](http://news.php.net/php.internals/74668)

## See the Result
As this project focusses on providing an API, run sami to create it:

```
$ vendor/bin/sami.php update sami.php
```

## Current State of the Project
Very much playing around at this time, which revealed some insights:

- Wrapping old php object can work (see date package)
- Some packages only provide an API but no functionality (see dom package)
- Others are completely under investigation (see file package)
- Collections are meanwhile available as standalone (see [gossi/collection](https://packagist.org/packages/gossi/collection))


## Project Plan

A very rough plan for this:

1. Talk with more people about it and get some more feedback.
2. Work on the API itself, creating naming conventions and such.

...

-> Create Proposal at PHP to implement the API into the language.


## References
- [PHP6 Ideas, Section: Userland APIs improvement for all PHP types](https://wiki.php.net/ideas/php6#userland_apis_improvement_for_all_php_types)