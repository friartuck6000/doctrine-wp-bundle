# WpDoctrineBundle

A Symfony bundle for handling WordPress data with Doctrine.

## Requirements

- PHP 5.5+
- Symfony 2.8+

## Installation

1. Install with Composer:

    ```
    composer install friartuck6000/doctrine-wp-bundle
    ```

2. Register the bundle in your `AppKernel.php`:

    ```php
    // ...
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = [
                // ...
                new Ft6k\Bundle\WpDoctrineBundle\WpDoctrineBundle(),
                // ...
            ];
        
            return $bundles;
        }
    }
    ```

3. Update your `config.yml`:

    ```yaml
    # app/config/config.yml
    
    # Bundle configuration
    wp_doctrine:
    	table_prefix: 'wp_'
    
    # Doctrine mapping configuration
    doctrine:
    	# ...
    	orm:
    		# ...
    		entity_managers:
    			# some_em:
    				mappings:
    					WpDoctrineBundle: ~
					# ...
    ```
