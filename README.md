# PHP API polyfill

DISCLAIMER: DO NOT USE THIS!

At the moment this is my personal playground, where I imagine how a php API could look like, that I would like to use.

Rewrite the PHP API as polyfill with the idea to turn it into an official PHP API.

## Goals

- Standardize function calls
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

Create naming conventions.

### Wrap 'resource' types in classes

PHP often provides a 'resource' type. However, most of the time we wrap them in classes anyway. Provide them out-of-the box.

Examples:

See ldap or ftp namespace.

### Provide php functionality in an OOP fashion

Leverage the 'php' namespace. Wrap functions that serve under the same purpose as single units (= classes).

1) Classes as function collections

Using classes to collect functions basically isn't a good idea and never a good practice. However, I see one good reason to do so, which is collection functions for a several context in a class which acts as namespace. E.g. if you are looking for a mathematical function but don't (fully) remember the name, type Math:: and your IDE can help you out with content assist, showing you only mathematical related functions

2) Create units

Create units where possible. 

Example: Filesystem

Create e.g. a Filesystem interface, which will also be used for FtpConnections or WebDav, etc. so the filesystem is changeable, but also extendable if you need a specific implementation (eg. Dropbox, AWS, Owncloud, etc.).


### Add missing language features

Add missing language, such as collections

### Primitives as Objects

Provide primitives as objects with methods to operate on them directly instead of functions that take the primitive as parameter. This would be more in common with current coding standards and would also improve readability.

Example:

```php
ucfirst(strtolower($string)) // vs.
$string->lower()->upperFirst()
```

Related Links:

- [Methods on primitive types in PHP](https://nikic.github.io/2014/03/14/Methods-on-primitive-types-in-PHP.html) by Nikita Popov (@nikic)
- [php-ext: Scalar Objects](https://github.com/nikic/scalar_objects)

### Offer more type hinting

With all the changes mentioned above, this would automatically add more type hinting, since objects are available, that can returned or taken as parameters.

## Discussion

- PHP-FIG: [https://groups.google.com/forum/#!topic/php-fig/sglKWCceNUk](https://groups.google.com/forum/#!topic/php-fig/sglKWCceNUk)
- php.internals (how to get a link there?)

## Project Plan

A very rough plan for this:

1. Talk with more people about it and get some more feedback
2. Find a good place to work on the polyfill (from which it can also be pushed packagist, see next step(s) ?)
3. Work on the API itself, creating naming conventions and such (PHP-FIG will sure be helpful)
4. Publish the API (at least on Packagist)
5. Let end users finally use the API to report feedback on what's missing
6. Finalize the API
7. Create Proposal at PHP to implement the API into the language.

Maybe turn it into a PSR so php users will already use this.

## Reference
- [PHP6 Ideas](https://wiki.php.net/ideas/php6#userland_apis_improvement_for_all_php_types)