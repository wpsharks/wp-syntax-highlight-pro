<?php
/**
 * Template.
 *
 * @author @jaswsinc
 * @copyright WP Sharks™
 */
declare (strict_types = 1);
namespace WebSharks\WpSharks\WpSyntaxHighlight\Pro;

use WebSharks\WpSharks\WpSyntaxHighlight\Pro\Classes;
use WebSharks\WpSharks\WpSyntaxHighlight\Pro\Interfaces;
use WebSharks\WpSharks\WpSyntaxHighlight\Pro\Traits;
#
use WebSharks\WpSharks\WpSyntaxHighlight\Pro\Classes\AppFacades as a;
use WebSharks\WpSharks\WpSyntaxHighlight\Pro\Classes\SCoreFacades as s;
use WebSharks\WpSharks\WpSyntaxHighlight\Pro\Classes\CoreFacades as c;
#
use WebSharks\WpSharks\Core\Classes as SCoreClasses;
use WebSharks\WpSharks\Core\Interfaces as SCoreInterfaces;
use WebSharks\WpSharks\Core\Traits as SCoreTraits;
#
use WebSharks\Core\WpSharksCore\Classes as CoreClasses;
use WebSharks\Core\WpSharksCore\Classes\Core\Base\Exception;
use WebSharks\Core\WpSharksCore\Interfaces as CoreInterfaces;
use WebSharks\Core\WpSharksCore\Traits as CoreTraits;
#
use function assert as debug;
use function get_defined_vars as vars;

$Form = $this->s::menuPageForm('§save-options');
?>
<?= $Form->openTag(); ?>

    <?= $Form->openTable(
        __('General Options', 'wp-syntax-highlight'),
        sprintf(__('You can browse our <a href="%1$s" target="_blank">knowledge base</a> to learn more about these options. Default values are fine for most sites.', 'wp-syntax-highlight'), esc_url(s::brandUrl('/kb')))
    ); ?>

        <?= $Form->inputRow([
            'type'  => 'text',
            'label' => __('Highlight.js Style', 'wp-syntax-highlight'),
            'tip'   => __('Powered by Highlight.js.<hr />This option controls the Highlight.js colors used in syntax highlighting.<hr />Review CDN resources and enter a <code>[style]</code>.min.css file basename w/o extension.<hr />e.g., <code>github</code>, <code>dark</code>, <code>ir-black</code>, <code>monokai</code>', 'wp-syntax-highlight'),
            'note'  => sprintf(__('Review the list of <a href="%1$s" target="_blank">CDN resources</a> and choose a <code>[style]</code>.min.css. See also: <a href="%2$s" target="_blank">style demos</a>', 'wp-syntax-highlight'), esc_url($this->App->Config->hljs['cdn_files_list_url']), esc_url($this->App->Config->hljs['style_demos_url'])),

            'name'  => 'hljs_style',
            'value' => s::getOption('hljs_style'),
        ]); ?>

        <?= $Form->inputRow([
            'type'        => 'text',
            'placeholder' => __('e.g., #f8f8f8'),
            'label'       => __('BG Color Override', 'wp-syntax-highlight'),
            'tip'         => __('Hex color code; e.g., <code>#f8f8f8</code>, <code>#000</code>, <code>#ccc</code><hr />If empty, the background color is defined by the style you selected above.', 'wp-syntax-highlight'),
            'note'        => __('If empty, the background color is defined by the style you selected above.', 'wp-syntax-highlight'),

            'name'  => 'hljs_bg_color',
            'value' => s::getOption('hljs_bg_color'),
        ]); ?>

        <?= $Form->inputRow([
            'type'  => 'text',
            'label' => __('Font Family', 'wp-syntax-highlight'),
            'tip'   => __('Controls the containing element font family.', 'wp-syntax-highlight'),
            'note'  => __('Comma-delimited monospace fonts used in CSS declaration.', 'wp-syntax-highlight'),

            'name'  => 'hljs_font_family',
            'value' => s::getOption('hljs_font_family'),
        ]); ?>

        <?= $Form->inputRow([
            'type'  => 'text',
            'label' => __('jQuery Selectors', 'wp-syntax-highlight'),
            'tip'   => __('jQuery selectors matching elements to highlight.', 'wp-syntax-highlight'),
            'note'  => __('A comma-delimited list of CSS selectors compatible with jQuery; e.g., <code>$([selectors])</code>', 'wp-syntax-highlight').'<br />'.
                       __('<em>Selecting <code>pre &gt; code</code> makes this compatible with fenced code blocks in Markdown; e.g., Jetpack.</em>', 'wp-syntax-highlight'),

            'name'  => 'hljs_selectors',
            'value' => s::getOption('hljs_selectors'),
        ]); ?>

        <?= $Form->inputRow([
            'type'  => 'text',
            'label' => __('jQuery Exclusions', 'wp-syntax-highlight'),
            'tip'   => __('Controls the <code>:not()</code> filter in jQuery, which allows for special exclusion classes.', 'wp-syntax-highlight'),
            'note'  => __('Comma-delimited; e.g., <code>$([selectors]).not([exclusions])</code>', 'wp-syntax-highlight'),

            'name'  => 'hljs_exclusions',
            'value' => s::getOption('hljs_exclusions'),
        ]); ?>

    <?= $Form->closeTable(); ?>

    <?= $Form->submitButton(); ?>
<?= $Form->closeTag(); ?>
