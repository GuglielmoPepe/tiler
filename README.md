# Tiler
Tiler provides a flexible, fast and secure template engine.

## Table of Contents 
* [Benefits](#benefits)
* [Features](#features)
* [Installation](#installation)
* [Usage](#usage)
* [Support](#support)
* [Faq](#faq)
* [Contributing](#contributing)
* [Contacts](#contacts)
* [Roadmap](#roadmap)
* [Change log](#change-log)
* [License](#license)


## Benefits
- Tiler is object oriented pattern
- Tiler don't force yourself to learn something new 
- Tiler is simple like PHP, is powerful like PHP

## Features
Tiler allows you to create child themes, parent themes and ancestor themes.

Tiler will check if the required template is present in the child theme otherwise it will look for it in the parent theme and continue along the chain of themes.

If Tiler it doesn't find the template in the parent theme it will throw an exception. 

## Installation
Use Composer

``` bash
$ composer require guglielmopepe/tiler
```

## Usage
Tiler use a Chain of Responsability design pattern.

This is a template in /child/theme directory:

```php

// path file: /child/theme/template.php

<p><strong><?php echo $data['foo']; ?></strong></p>

```

This is a template in /parent/theme directory:

```php

// path file: /parent/theme/template.php

<p><b><?php echo $data['foo']; ?></b></p>

```

This is a template in /ancestor/theme directory:

```php

// path file: /ancestor/theme/template.php

<p><?php echo $data['foo']; ?></p>

```

Tiler will check if the required template is present in the child theme otherwise it will look for it in the parent theme and continue along the chain of themes.
```php
$data = new \Classes\Data(['foo'=>'bar']);

$handler = new \Tiler\Classes\Handler('/directory/of/child/theme');
$handler->connect(new \Tiler\Classes\Handler('/directory/of/parent/theme'));
$handler->connect(new \Tiler\Classes\Handler('/directory/of/ancestor/theme'));

$command = new \Tiler\Classes\Command($data, $handler);
echo $command->render('/template.php');

```


## Support
If you have a request, please create a GitHub [issue](https://github.com/GuglielmoPepe/tiler/issues).

If you discover a security vulnerability, please send an email to Guglielmo Pepe at [&#105;&#110;&#102;&#111;&#64;&#103;&#117;&#103;&#108;&#105;&#101;&#108;&#109;&#111;&#112;&#101;&#112;&#101;&#46;&#99;&#111;&#109;](&#109;&#97;&#105;&#108;&#116;&#111;&#58;%69%6e%66%6f%40%67%75%67%6c%69%65%6c%6d%6f%70%65%70%65%2e%63%6f%6d). All security vulnerabilities will be promptly addressed.


## FAQ
### Why use Data class with ArrayAccess interface?
The Data class allows you to pass data as if it were an array, but by extending the class you can also pass a Service Locator: you have an HMVC.

## Contributing
If you want to say **thank you** and/or support the active development of `tiler`:

1. Add a [GitHub Star](https://github.com/GuglielmoPepe/tiler/stargazers) to the project.
2. Share the project on social media.
3. Write a review or tutorial on [Medium](https://medium.com/), [Dev.to](https://dev.to/) or personal blog.

## Contacts
If you need information please send an email to [&#105;&#110;&#102;&#111;&#64;&#103;&#117;&#103;&#108;&#105;&#101;&#108;&#109;&#111;&#112;&#101;&#112;&#101;&#46;&#99;&#111;&#109;](&#109;&#97;&#105;&#108;&#116;&#111;&#58;%69%6e%66%6f%40%67%75%67%6c%69%65%6c%6d%6f%70%65%70%65%2e%63%6f%6d).

## Roadmap
See the list of [open issues](https://github.com/GuglielmoPepe/tiler/issues):
- [enhancement](https://github.com/GuglielmoPepe/tiler/issues?q=label%3Aenhancement+is%3Aopen+sort%3Areactions-%2B1-desc)
- [bugs](https://github.com/GuglielmoPepe/tiler/issues?q=is%3Aissue+is%3Aopen+label%3Abug+sort%3Areactions-%2B1-desc) 


## Change log
Please see [Changelog file](changelog.md) for more information on what has changed recently.

## License
Distributed under the MIT License. Please see [License File](license.md) for more information.
