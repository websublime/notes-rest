# Notes Rest

## Work in progress. Do not use.

Rest Documentor generator. Cli utility to generate rest documentation in formats like
blueprint, json, html.

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
$config = array(
   'dir'   => realpath(__DIR__.'/../tests/League/Notes/Test/Fixtures'),
   'regex' => array(
      'namespace'   => new Regex('/namespace\s+([\D]+\w*[\\?\w]*\s*);$/mis'),
      'description' => new Regex('/(?x)\A([^\n]+(?:(?!(?<=\.)\n|\n{2})\n(?![\t]*@\pL)[^\n]+)*\.?)(?:\s*(?!@\pL)([^\n]+(?:\n+(?![\t]*@\pL)[^\n]+)*))?(\s+[\s\S]*)?/'),
      'rest'        => new Regex('/@[A-Z][a-zA-Z0-9_]*\((?<info>{.+})\)$/mis')
    )
 );

 $manager = new AnnotationManager($config, new MatcherHandler());
 $manager->init();
 var_dump($manager->process());
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
