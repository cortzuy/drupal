# drupal

enabled html twig
1. settings.php
   removed hash key
   1.1  if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
          include $app_root . '/' . $site_path . '/settings.local.php';
        }
2. services.yml
   removed hash key
        2.1
        twig.config:
            debug: true
            auto_reload: true
            cache: false
3. clear cache