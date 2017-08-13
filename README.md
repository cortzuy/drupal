# drupal

enabled html twig
1. settings.php (removed hash key)
1.1  if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
          include $app_root . '/' . $site_path . '/settings.local.php';
        }
        
2. services.yml (removed hash key)
2.1 twig.config:
2.2 debug: true
2.3 auto_reload: true
2.4 cache: false

3. settings.local.php (removed hash key)
3.1 $settings['cache']['bins']['render'] = 'cache.backend.null';
3.2 $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

4. clear cache
