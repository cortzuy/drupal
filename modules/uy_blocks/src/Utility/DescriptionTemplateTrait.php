<?php
namespace Drupal\uy_blocks\Utility;

trait DescriptionTemplateTrait {

    /**
     * Generate a render array with our templated content.
     *
     * @return array
     *   A render array.
     */
    public function description(){
        $template_path = $this->getDescriptionTemplatePath();
        $template = file_get_contents($template_path);
        $build = [
          'description' => [
              '#type' => 'inline_template',
              '#template' => $template,
              '#context' => $this->getDescriptionVariable(),
          ],
        ];
        return $build;

    }

    /**
     * Name of our module.
     *
     * @return string
     *   A module name.
     */
    abstract protected function getModuleName();

    /**
     * Variables to act as context to the twig template file.
     *
     * @return array
     *   Associative array that defines context for a template.
     */
    protected function getDescriptionVariable(){
        $variables = [
          'module' => $this->getModuleName(),
        ];
        return $variables;
    }

    /**
     * Get full path to the template.
     *
     * @return string
     *   Path string.
     */
    protected function getDescriptionTemplatePath(){
        return drupal_get_path('module',$this->getModuleName()) . "/templates/description.html.twig";
    }

}