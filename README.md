# Notes Rest

[![Build Status](https://travis-ci.org/thephpleague/statsd.png?branch=master)](https://travis-ci.org/thephpleague/statsd)
[![Total Downloads](https://poser.pugx.org/league/statsd/downloads.png)](https://packagist.org/packages/league/statsd)
[![Latest Stable Version](https://poser.pugx.org/league/statsd/v/stable.png)](https://packagist.org/packages/league/statsd)

**Replace Skeleton with your own package name in the above URLs**

Rest Documentor generator. Cli utility to generate rest documentation in formats like
blueprint, json, html.

Currently in developement and not submited to League.

## Install

Via Composer

``` json
{
    "require": {
        "league/notes-rest": "~1.0"
    }
}
```


## Usage
``` json
@Rest({
    "title": "",
    "section": "",
    "request" : {},
    "response": {}
})
```

``` php
$skeleton = new League\Skeleton();
echo $skeleton->echoPhrase('Hello, League!');

```


## Testing

``` bash
$ phpunit
```


## Contributing

Please see [CONTRIBUTING](https://github.com/thephpleague/notes-rest/blob/master/CONTRIBUTING.md) for details.


## Credits

- [Miguel Ramos](https://github.com/miguelramos)
- [All Contributors](https://github.com/thephpleague/notes-rest/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/thephpleague/notes-rest/blob/master/LICENSE) for more information.
