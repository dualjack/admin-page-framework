<?php
/**
 * Admin Page Framework - Demo
 *
 * Demonstrates the usage of Admin Page Framework.
 *
 * http://en.michaeluno.jp/admin-page-framework/
 * Copyright (c) 2013-2016 Michael Uno; Licensed GPLv2
 *
 */

/**
 * Adds a section in a tab.
 *
 * @package     AdminPageFramework
 * @subpackage  Example
 */
class APF_Demo_AdvancedUsage_Section_DisabledRepeatableSection {

    /**
     * The page slug to add the tab and form elements.
     */
    public $sPageSlug   = 'apf_advanced_usage';

    /**
     * The tab slug to add to the page.
     */
    public $sTabSlug    = 'sections';

    /**
     * The section slug to add to the tab.
     */
    public $sSectionID  = 'disabled_repeatable_section';

    /**
     * Sets up a form section.
     */
    public function __construct( $oFactory ) {

        // Section
        $oFactory->addSettingSections(
            $this->sPageSlug, // the target page slug
            array(
                'tab_slug'          => $this->sTabSlug,
                'section_id'        => $this->sSectionID,
                'title'             => __( 'Disabled Repeatable Section', 'admin-page-framework-loader' ),
                'description'       => __( 'While showing the repeatable button, the repeatability can be turned off.', 'admin-page-framework-loader' ),
                'collapsible'       => array(
                    'toggle_all_button' => array( 'top-left', 'bottom-left' ),
                    'container'         => 'section',
                ),
                'repeatable'        => array(
                    'disabled'               => array(
                        'label'         => __( 'The ability to repeat sections is disabled.', 'admin-page-framework-loader' )
                            . ' ' . __( 'You can insert your custom message here such as \"Upgrade the program to enhance this feature!\"', 'admin-page-framework-loader' ),
                        'caption'       => __( 'Your Program Name', 'admin-page-framework-loader' ),
                        'box_width'     => 300,
                        'box_height'    => 100,
                    ),
                ),
            )
        );

        // Fields
        $oFactory->addSettingFields(
            $this->sSectionID, // the target section ID
            array(
                'field_id'          => 'custom_field_content',
                'title'             => __( 'Custom Content', 'admin-page-framework-loader' ),
                'type'              => 'whatever_of_your_choosing_slug',
                'content'           => "<pre>"
                . $oFactory->oWPRMParser->getSyntaxHighlightedPHPCode(
                    <<<EOD
array(
    'repeatable'        => array(
        'disabled'               => true,
        'label_disabled'         => __( 'The ability to repeat sections is disabled.' )
            . ' ' . __( 'You can insert your custom message here....' ),
        'label_disabled_caption' => __( 'Your Program Name' ),
    ),
)
EOD
                )
                . "</pre>",
                'description'       => __( 'By showing the button, it is possible to let the users know an enhanced feature exists and encourage them to upgrade your program.', 'admin-page-framework-loader' ),
            )
        );

    }

}
