# php-Markdown
### By Nathan Blazek

This class was created to take markdown data and to render it into HTML. My specific use case had the markdown data stored in a table record. This class translated it to HTML before rendering it to the page.

#### Installation and Usage
To install, use composer and run this command in the root of your project:

`composer require nathanblazek/php-markdown`

Using this class is simple. Here is the command.
```php
ncb\Markdown::render("#Markdown Text Here");
```

Simply insert your markdown text into the render function and you're set.
