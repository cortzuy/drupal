<?php
namespace Drupal\uy_blocks\Controller;

use Drupal\uy_blocks\Utility\DescriptionTemplateTrait;

/**
 * Controller routines for block example routes.
 */
class UyBlocksController {
    use DescriptionTemplateTrait;

    /**
     * {@inheritdoc}
     */
    protected  function getModuleName(){
        return 'uy_blocks';
    }
}