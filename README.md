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


## Rest template anotation
The annotation is a kind extensive to be more acurate and descritive. Description
is given as normal doc annotation and it is not represented in this template. Format
used on annotation is json, so be carefull on make it a valid json. 

``` json
@Rest({
   "section": "Fake",
   "title": "Put fake controller",
   "resource": {
      "class": "League\\Notes\\Test\\Fixtures\\FakeController",
      "method": "putMethod"
   },
   "description": "Short description",
   "request": {
      "route": "/api/fake/put",
      "method": "PUT",
      "parameters": [
          {
              "validation": "\\d+",
              "required": true
          }
      ],
      "headers": {
          "content-type": "application/json"
      }
   },
   "response": [
      {
          "status": 200,
          "content-type": "application/json",
          "link" : "http://link.to.response.success"
      },
      {
          "status": 401,
          "content-type": "application/json",
          "link" : "http://link.to.response.failure"
      },
      {
          "status": 400,
          "content-type": "application/json",
          "link" : "http://link.to.response.error"
      }
   ]
})

```
## Usage
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
