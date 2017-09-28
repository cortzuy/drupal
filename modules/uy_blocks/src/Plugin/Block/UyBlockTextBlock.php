<?php
namespace Drupal\uy_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Example: configurable text string' block.
 *
 * Drupal\Core\Block\BlockBase gives us a very useful set of basic functionality
 * for this configurable block. We can just fill in a few of the blanks with
 * defaultConfiguration(), blockForm(), blockSubmit(), and build().
 *
 * @Block(
 *   id = "uy_configurable_text",
 *   admin_label = @Translation("Uy: configurable text")
 * )
 */
class UyBlockTextBlock extends BlockBase {

    /**
     * {@inheritdoc}
     *
     * This method sets the block default configuration. This configuration
     * determines the block's behavior when a block is initially placed in a
     * region. Default values for the block configuration form should be added to
     * the configuration array. System default configurations are assembled in
     * BlockBase::__construct() e.g. cache setting and block title visibility.
     *
     * @see \Drupal\block\BlockBase::__construct()
     */
    public function defaultConfiguration() {
        return [
            'uy_block_example_string' => $this->t('A default value. This block was created at %time', ['%time' => date('c')]),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * This method defines form elements for custom block configuration. Standard
     * block configuration fields are added by BlockBase::buildConfigurationForm()
     * (block title and title visibility) and BlockFormController::form() (block
     * visibility settings).
     *
     * @see \Drupal\block\BlockBase::buildConfigurationForm()
     * @see \Drupal\block\BlockFormController::form()
     */
    public function blockForm($form, FormStateInterface $form_state) {
        $form['uy_block_example_string_text'] = [
            '#type' => 'textarea',
            '#title' => $this->t('Uy Block Contents'),
            '#description' => $this->t('This text will appear in the uy block example.'),
            '#default_value' => $this->configuration['uy_block_example_string'],
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     *
     * This method processes the blockForm() form fields when the block
     * configuration form is submitted.
     *
     * The blockValidate() method can be used to validate the form submission.
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
        $this->configuration['uy_block_example_string'] = $form_state->getValue('uy_block_example_string_text');
    }

    /**
     * {@inheritdoc}
     */
    public function build() {
        return [
            '#markup' => $this->configuration['uy_block_example_string'],
        ];
    }


}
