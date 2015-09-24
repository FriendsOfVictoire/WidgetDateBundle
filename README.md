Victoire CMS Date Bundle
============

Need to render a date properly in a victoire website ?

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require friendsofvictoire/date-widget

Do not forget to add the bundle in your AppKernel !

```php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\DateBundle\VictoireWidgetDateBundle(),
            );

            return $bundles;
        }
    }
```
