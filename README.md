Smada SymfonyToolsBundle
---------------------------

This bundle is designed to be choc full of helpers and addons to help speed development in Symfony. These include:
 - String class for functions dealing with strings
 - Tools class with some helpers in it
 - "input_boxes" form type

Installation
---------------------------


Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest version of this bundle:
NOTE: This version is not entirely stable yet

```bash
$ composer require smada/symfony-tools-bundle "dev-master"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Smada\SymfonyToolsBundle\SmadaSymfonyToolsBundle(),
        );

        // ...
    }

    // ...
}
```

<h2>Setting up input_boxes</h2>

 - Add in the form template resource
```yml
# app/config/config.yml
twig:
    form:
        resources:
            - SmadaSymfonyToolsBundle:Form:fields.html.twig
```

 - Add css and js as assets and reference them.
```yml
# app/config/config.yml
assetic:
    use_controller: false
    assets:
        smada_symfonytools_css:
            inputs:
                - '@SmadaSymfonyToolsBundle/Resources/public/css/master.css'
        smada_symfonytools_js:
            inputs:
                - '@SmadaSymfonyToolsBundle/Resources/public/js/input-boxes.js'
```

- Now you will need to reference it in your layout
```twig
{% stylesheets '@smada_symfonytools_css' %}
    <link rel="stylesheet" href="{{ asset_url }}"/>
{% endstylesheets %}

{% javascripts '@smada_symfonytools_js' %}
    <script src="{{ asset_url }}"></script>
{% endjavascripts %}
```

- Now dump your assetic
```bash
$ php app/console assetic:dump
```

<h2>Examples</h2>

```php
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder->add('accountNumber', 'input_boxes', ['boxes' => 10])
}
```
