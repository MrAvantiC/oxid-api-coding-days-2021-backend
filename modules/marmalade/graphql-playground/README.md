# marmalade/graph-q-l-playground

[![Build Status](https://img.shields.io/travis/com/marmalade/graph-q-l-playground/master.svg?style=for-the-badge&logo=travis)](https://travis-ci.com/marmalade/graph-q-l-playground) [![PHP Version](https://img.shields.io/packagist/php-v/marmalade/graph-q-l-playground.svg?style=for-the-badge)](https://github.com/marmalade/graph-q-l-playground) [![Stable Version](https://img.shields.io/packagist/v/marmalade/graph-q-l-playground.svg?style=for-the-badge&label=latest)](https://packagist.org/packages/marmalade/graph-q-l-playground)

## Usage

This assumes you have the OXID eShop up and running and installed and activated the `oxid-esales/graphql-base` module.

### Install

```bash
$ composer require marmalade/graph-q-l-playground
```

After requiring the module, you need to head over to the OXID eShop admin and
activate the module.

### How to use

TBD

## Testing

### Linting, syntax, static analysis and unit tests

```bash
$ composer test
```

### Integration tests

- install this module into a running OXID eShop
- change the `test_config.yml`
  - add module to the `partial_module_paths`
  - set `activate_all_modules` to `true`

```bash
$ ./vendor/bin/runtests
```

## License

TBD
