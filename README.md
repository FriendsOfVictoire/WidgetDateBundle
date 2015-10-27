Victoire DCMS Date Bundle
============

##What is the purpose of this bundle

This bundle installs the *Date Widget* on your Victoire project.
It renders the date in any format you want.

##Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

##Install the bundle :

Run the following composer command :

    php composer.phar require friendsofvictoire/date-widget

###Reminder

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
