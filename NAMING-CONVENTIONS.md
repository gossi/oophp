# PHP API Naming Conventions

## Namespacing

The root namespace is `php` and one subnamespace for each package, e.g. `php\file`, `php\ftp`, etc. Packages are singular, lowercased words.

### Exceptions

Exceptions go into the subnamespace `exception` of each package.

## Names

Structs (Class, Interface, Trait): StudlyCase<br>
Methods: camelCase<br>
Constants: Uppercase /w underscore

### Classes

Repetivtive names are those, that repeat the package as class prefix, e.g. `php\dom` and `DomDocument`. That is for the fact, that `Document` is a very universal name and if you write code it isn't very clear from `$doc = new Document();` which document you are referring to in contrast to `$doc = new DomDocument();`.

#### Exceptions

Exceptions are suffixed with `Exception`.

### Interfaces

Interfaces are given descriptive names. They are neither prefixed with `I` (Java Convention) nor suffixed with `Interface` (PSR).


